<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

class HomeController extends Controller
{
    
    public function index()
    {
        $notes = Note::all();
        return view('home',[
            'notes'=> $notes,
        ]);
    }



}
