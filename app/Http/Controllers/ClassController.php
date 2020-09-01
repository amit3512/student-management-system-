<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classlist;

class ClassController extends Controller
{
    public function index($class){
    	$data['classes'] = Student::where('class', $class)->orderBy('name','asc')->get();
    	$data['totalStudent'] = Student::where('class', $class)->count();
    	
    	return view('class',$data);
    }

    public function studentCal(){
    	$data['classes'] = Classlist::where('className', 'nursery')->get();
    	$data['totalStudent'] = Student::where('class', 'nursery')->count();
    	
    	return view('calsStudent',$data);
    }

    
}
