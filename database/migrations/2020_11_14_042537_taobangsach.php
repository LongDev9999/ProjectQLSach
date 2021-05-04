<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobangsach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sach', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('ma_sach');
            $table->string('ten_sach');
            $table->integer('namxb')->nullable();//cho phep rong null
            $table->string('ma_nxb')->nullable();
            $table->string('tacgia')->nullable();
            
            //$table->timestamps();//có tạo 2 cột create at và update at
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sach');
    }
}
