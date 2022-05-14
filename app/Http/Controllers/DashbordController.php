<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        $user=User::all()->count();
        $student=Student::all()->count();
        return json([
            'massage'=>"successes api ",
           "date"=>[
               "user"=>$user,
               "student"=>$student
           ] ,
            "status"=>true,
        ],200);
    }
}
