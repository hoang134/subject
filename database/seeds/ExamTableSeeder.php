<?php

use App\Exam;
use App\User;
use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam = new Exam();
        $exam->subject_id = '1';
        $exam->time = '8h-10h-22-12';
        $exam->room = '101G2';
        $exam->quantity = '80';

        $exam1 = new Exam();
        $exam1->subject_id = '2';
        $exam1->time = '13h-15h-25-12';
        $exam1->room = '101G2';
        $exam1->quantity = '80';
        $exam1->save();

        $exam2 = new Exam();
        $exam2->subject_id = '3';
        $exam2->time = '11h-13h-22-12';
        $exam2->room = '101G3';
        $exam2->quantity = '50';
        $exam2->save();

        $exam3 = new Exam();
        $exam3->subject_id = '1';
        $exam3->time = '8h-10h-20-12';
        $exam3->room = '101G4';
        $exam3->quantity = '40';
        $exam3->save();

        $exam4 = new Exam();
        $exam4->subject_id = '2';
        $exam4->time = '8h-10h-19-12';
        $exam4->room = '101G5';
        $exam4->quantity = '30';
        $exam4->save();

        $exam5 = new Exam();
        $exam5->subject_id = '3';
        $exam5->time = '8h-10h-26-12';
        $exam5->room = '101G6';
        $exam5->quantity = '22';
        $exam5->save();

        $exam6 = new Exam();
        $exam6->subject_id = '1';
        $exam6->time = '8h-10h-28-12';
        $exam6->room = '101G7';
        $exam6->quantity = '44';
        $exam6->save();
    }
}
