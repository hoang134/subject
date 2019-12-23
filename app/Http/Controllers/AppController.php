<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function export()
    {
        $exams = User::find(Auth::user()->id)->exams()->with('subject')->get();
        return view('student.export', compact('exams'));
    }

}
