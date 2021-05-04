<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobangnxb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nxb', function (Blueprint $table) {
            $table->increments('id_nxb');
           
            $table->string('ma_nxb');
            $table->string('ten_nxb');
           // $table->timestamps();//có tạo 2 cột create at và update at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_nxb');
    }
}
