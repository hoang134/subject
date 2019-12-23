<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new Subject();
        $subject->name = 'Kiểm thử và đảm bảo chất lượng phần mềm';
        $subject->code = 'INT3117';
        $subject->save();

        $subject1 = new Subject();
        $subject1->name = 'Lập trình nâng cao';
        $subject1->code = 'INT2202';
        $subject1->save();

        $subject2 = new Subject();
        $subject2->name = 'Thiết kế giao diện người dùng';
        $subject2->code = 'INT3115';
        $subject2->save();

        $subject3 = new Subject();
        $subject3->name = 'Kiến trúc máy tính';
        $subject3->code = 'INT2205';
        $subject3->save();

        $subject4 = new Subject();
        $subject4->name = 'Hệ quản trị cơ sở dữ liệu';
        $subject4->code = 'INT3202';
        $subject4->save();

        $subject5 = new Subject();
        $subject5->name = 'Phát triển ứng dụng web';
        $subject5->code = 'INT3306';
        $subject5->save();
    }


}
