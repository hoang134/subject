<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function exportListExam()
    {
        $exams = Exam::all();
        return view('admin.export.list', compact('exams'));
    }
    public function exportExam($id)
    {
        $exams = Exam::find($id);
        return view('admin.export.exportList', compact('exams'));
    }
}
