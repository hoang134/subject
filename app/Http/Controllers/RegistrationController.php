<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $subjects = User::find($userId)->subjects()->with('exams')->get();
        return view('student.resign', compact('subjects'));
    }

    public function subjectRegister()
    {
        $exams = User::find(Auth::user()->id)->exams()->with('subject')->get();
        return response($exams);
    }

    public function searchResign(Request $request)
    {
        $searchExam = $request->get('searchExam');
        $subjects = User::find(3)->subjects()->where('name', 'like', '%'.$searchExam.'%')->with('exams')->get();
        return view('student.resign', compact('subjects'));
    }

    public function registration(Request $request)
    {
        $userId = Auth::user()->id;
        $examId = $request->get('examId');

        $u = User::find($userId);
        $u->exams()->attach($examId);

        return response('Ok', 200);
    }

    public function registrationDelete(Request $request)
    {
        $userId = Auth::user()->id;
        $examId = $request->get('examId');

        $u = User::find($userId);
        $u->exams()->detach($examId);

        return response('Ok', 200);
    }

    public function checkQuantity($examId)
    {
        $quantity = Exam::find($examId)->users()->count();
        return $quantity;
    }

}
