<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('home', compact('announcements'));
    }

    public function categoryShow(Category $category){
        $announcements = Announcement::where('category_id', $category->id)->where('is_accepted', true)->get()->sortDesc();
        return view('categoryShow', compact('category', 'announcements'));
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        $cercato = $request->searched;
        return view('announcement/searched', compact('announcements', 'cercato'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function chiSiamo(){
        return view('chiSiamo');
    }
}
