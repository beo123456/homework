<?php

use Illuminate\Database\Seeder;

class order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->delete();
        DB::table('order')->insert([
            ['id'=>1,'full'=>'Nguyễn Văn Đạt','address'=>'Bắc Cạn','email'=>'vandat@gmail.com','phone'=>'03658879942','total'=>110000,'state'=>1],
            ['id'=>2,'full'=>'Nguyễn Tùng Lâm','address'=>'Bắc Ninh','email'=>'tunglam@gmail.com','phone'=>'03564478214','total'=>110000,'state'=>1],
            ['id'=>3,'full'=>'Võ Văn Minh','address'=>'Ninh Bình','email'=>'vanminh@gmail.com','phone'=>'03214789547','total'=>110000,'state'=>2],
            ['id'=>4,'full'=>'Nguyễn thế Kiên','address'=>'Lạng Sơn','email'=>'thekien@gmail.com','phone'=>'03525246673','total'=>110000,'state'=>2],
            ['id'=>5,'full'=>'Trần Đại Công','address'=>'Văn Giang','email'=>'daicong@gmail.com','phone'=>'0354879500','total'=>110000,'state'=>2]
        ]);
    }
}
