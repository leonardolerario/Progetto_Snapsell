<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $ultimo = Announcement::where('is_accepted', '<>', null)->get()->last();
        return view('revisor/index', compact('announcement_to_check', 'ultimo'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('messageRevisor', "Complimenti hai accettato l'annuncio");
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('messageRevisor', "Complimenti hai rifiutato l'annuncio");
    }

    public function nullAnnouncement(Announcement $announcement){
        $announcement->setAccepted(null);
        return redirect()->back();
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','Complimenti! Hai richiesto di diventare revisore correttamente.');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message','Complimenti! l\'utente é diventato revisore');
    }
}
