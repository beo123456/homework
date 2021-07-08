<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id'); //int,auto incremment,unsigned
            $table->string('code',50)->unique(); //không cho phép cột mã sản phẩm trùng
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 18, 0)->default(0); //mặc định là 0 nếu không có giá trị
            $table->tinyInteger('featured')->unsigned(); //kiểu không dấu
            $table->tinyInteger('state')->unsigned(); 
            $table->text('info')->nullable(); //cho phép null
            $table->text('describe')->nullable();
            $table->string('img');

            //Tạo khoá ngoại liên kết đến khoá chính của bảng category
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
           
            //tạo 2 cột created_at,updated_at kiểu timestamp cho phép NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
