<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'vietpro','address'=>'Thường tín','phone'=>'0356653301','level'=>1],
            ['id'=>2,'email'=>'dung@gmail.com','password'=>bcrypt('123456'),'full'=>'hoang dung','address'=>'Bắc giang','phone'=>'0356654487','level'=>2],
        ]);
    }
}
