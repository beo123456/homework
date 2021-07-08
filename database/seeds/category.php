<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete(); // xoa dl roi upload lai dl tranh loi
        DB::table('category')->insert([
            ['id'=>1,'name'=>'Nam','slug'=>'Nam','parent'=>0],
            ['id'=>2,'name'=>'Áo Nam','slug'=>'ao-nam','parent'=>1],
            ['id'=>3,'name'=>'Quần Nam','slug'=>'quan-nam','parent'=>1],
            ['id'=>5,'name'=>'Nữ','slug'=>'Nu','parent'=>0],
            ['id'=>6,'name'=>'Áo Nữ','slug'=>'ao-nu','parent'=>5],
            ['id'=>7,'name'=>'Quần Nữ','slug'=>'quan-nu','parent'=>5]
        ]);
    }
}
