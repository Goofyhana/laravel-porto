<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Skill;



class HomeController extends Controller
{
    public function index()
{
    $skill = Skill::all();
    $contacts = Contacts::all();
    $projects = Project::all();
    $certificates = Certificate::all();



    return view('home', compact('contacts', 'skill', 'projects', 'certificates'));
}

    
}
 