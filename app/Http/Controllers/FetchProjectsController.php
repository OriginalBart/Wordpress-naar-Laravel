<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projecten;  
use Illuminate\Support\Facades\Validator;

class FetchProjectsController extends Controller
{
    public function index()
    {
        // fetch all the images
        $files = Projecten::orderBy('id', 'desc')->take(3)->get();
        return view('index', compact('files'));
    }

    public function fetchAll()
    {
        $projects = Projecten::all();
        return view('projects', compact('projects'));
    }
    public function detail($id){
         $projects = Projecten::find($id);
        return view('detail',  compact('projects'));
    }
}
