<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title', 'description', 'price'];

    // start accorciamento descrizione card
    public function descSubstr(){
        if(strlen($this->description) > 99){
            return substr($this->description, 0, 100) . '...';
        }else{
            return $this->description;
        }
    }
    public function titlSubstr(){
        if(strlen($this->title) > 26){
            return substr($this->title, 0, 23) . '...';
        }else{
            return $this->title;
        }
    }
    // End accorciamento descrizione card
    public function formatPrice(){
        return number_format($this->price, 2, ',', '.');
    }

    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $category,
        ];
        return $array;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
