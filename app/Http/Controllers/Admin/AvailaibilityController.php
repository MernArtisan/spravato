<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AvailaibilityController extends Controller
{
    public function index(){
        return view('admin.availability.index');
    }

    
    
}
