<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->gender = 'Nam';
        $user->birthday = '15/11/2000';
        $user->class = 'k62cd';
        $user->save();

        $user1 = new User();
        $user1->name = 'Student';
        $user1->username = 'student';
        $user1->password = Hash::make('student');
        $user1->gender = 'Nu';
        $user1->birthday = '15/11/2000';
        $user1->class = 'k62cd';
        $user1->save();

        $user2 = new User();
        $user2->name = 'Nguyễn Việt Hoàng';
        $user2->username = '17020770';
        $user2->password = Hash::make('student');
        $user2->gender = 'Nam';
        $user2->birthday = '15/11/2000';
        $user2->class = 'k62cd';
        $user2->save();

        $user3 = new User();
        $user3->name = 'Nguyễn Hữu Thông';
        $user3->username = '17020771';
        $user3->password = Hash::make('student');
        $user3->gender = 'Nu';
        $user3->birthday = '15/11/2000';
        $user3->class = 'k62cd';
        $user3->save();

        $user4 = new User();
        $user4->name = 'Hoàng Văn Tú';
        $user4->username = '17020773';
        $user4->password = Hash::make('student');
        $user4->gender = 'Nu';
        $user4->birthday = '15/11/2000';
        $user4->class = 'k62cd';
        $user4->save();

        $user5 = new User();
        $user5->name = 'Đại Văn Thanh';
        $user5->username = '17020774';
        $user5->password = Hash::make('student');
        $user5->gender = 'Nu';
        $user5->birthday = '15/11/2000';
        $user5->class = 'k62cd';
        $user5->save();

        $role = new Role();
        $role->name = "admin";
        $role->save();

        $role1 = new Role();
        $role1->name = "student";
        $role1->save();

        $user->roles()->attach([1, 2]);
        $user1->roles()->attach(2);
        $user2->roles()->attach(2);
        $user3->roles()->attach(2);
        $user4->roles()->attach(2);
        $user5->roles()->attach(2);

        $user1->subjects()->attach([6, 5, 3, 2]);
        $user2->subjects()->attach([1, 3, 2]);
        $user3->subjects()->attach([1, 5, 2]);
        $user4->subjects()->attach([1, 4, 2]);
        $user5->subjects()->attach([1, 2, 3, 4, 5, 6]);
    }


}
