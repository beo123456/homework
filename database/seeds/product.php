<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','slug'=>'ao-nu-so-mi-cham-bi','price'=>50000,'featured'=>1,'state'=>1,'img'=>'Ao_nu_so_mi_cham_bi.jpg','category_id'=>6],
            ['id'=>2,'code'=>'SP02','name'=>'Áo Nữ Phối Viền','slug'=>'ao-nu-phoi-vien','price'=>60000,'featured'=>1,'state'=>0,'img'=>'ao-nu-phoi-vien.jpg','category_id'=>6],
            ['id'=>3,'code'=>'SP03','name'=>'Áo Sơ Mi Có Cổ Đúc','slug'=>'ao-so-mi-co-co-duc','price'=>70000,'featured'=>0,'state'=>1,'img'=>'ao-nu-so-mi-co-co-duc.jpg','category_id'=>6],
            ['id'=>4,'code'=>'SP04','name'=>'Áo sơ mi caro xám Xanh','slug'=>'ao-so-mi-caro-xam-xanh','price'=>80000,'featured'=>0,'state'=>1,'img'=>'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg','category_id'=>2],
            ['id'=>5,'code'=>'SP05','name'=>'Áo Sơ Mi Hoạ Tiết Đen','slug'=>'ao-so-mi-hoa-tiet-den','price'=>90000,'featured'=>0,'state'=>1,'img'=>'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg','category_id'=>2],
            ['id'=>6,'code'=>'SP06','name'=>'Áo Sơ Mi Trắng Kem','slug'=>'ao-so-mi-trang-kem','price'=>100000,'featured'=>1,'state'=>1,'img'=>'ao-so-mi-trang-kem-asm836-8193.jpg','category_id'=>2],
            ['id'=>7,'code'=>'SP07','name'=>'Quần kaki Đỏ Nam','slug'=>'quan-kaki-do-nam','price'=>110000,'featured'=>1,'state'=>1,'img'=>'quan-kaki-do-man-qk162-8273.jpg','category_id'=>3],
            ['id'=>8,'code'=>'SP08','name'=>'Quần kaki Xám','slug'=>'quan-kaki-xam','price'=>120000,'featured'=>1,'state'=>1,'img'=>'quan-kaki-xam-chuot-dam-qk171-9770.jpg','category_id'=>3],
        ]);
    }
}
