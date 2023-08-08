<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{ 
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcement;

    protected $rules = [
        'title'=>'required|min:5',
        'description'=>'required',
        'price'=>'required|numeric|max:999999,99',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
       // regex:/^\d{1,6}(.\d{1,2})?$/
        // |regex:/^\d+(\.\d{2})$/
    ];

    protected $messages = [
        'required'=>'il campo :attribute è richiesto', 
        'numeric'=>'il campo :attribute deve essere un numero',
        'title.min'=>'il titolo è troppo corto',
        'title.max'=>'il titolo è troppo lungo',
        'price.max'=>'hai superato il limite, numero massimo accettato: 999999.99',
        'images.max'=>"l'immagine deve essere massimo di 1 mb",
        'images.image'=>"l'immagine deve essere un'immagine",
        'temporary_images.*.max'=>"l'immagine deve essere massimo di 1 mb",
        'temporary_images.*.image'=>"il file deve essere un'immagine",
    ];

    public function updatedTemporaryImages(){
        if($this->validate(['temporary_images.*'=>'image|max:1024',])){
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
            $this->dispatchBrowserEvent('onContentChanged');
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
        $this->dispatchBrowserEvent('onContentChanged');
    }

    public function store(){
        $this->validate();
        
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)){
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 600, 600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);


            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();

        // $category = Category::find($this->category);
        // $announcement = $category->announcements()->create([
        //     'title'=>$this->title,
        //     'description'=>$this->description,
        //     'price' => $this->price,
        // ]);
        // Auth::user()->announcements()->save($announcement);
        
        session()->flash('message','Annuncio inserito con successo, sarà pubblicato dopo la revisione!');
        $this->cleanForm();
    }
    public function cleanForm(){
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '' ;
        $this->temporary_images = [];
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }

}
