<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = Project::count();
        return view('dashboard', compact('data'));
    }
}
