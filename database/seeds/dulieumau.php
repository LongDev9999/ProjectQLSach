<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class dulieumau extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_sach')->insert([
            'ma_sach' => Str::random(10),
          
            'ten_sach' => Str::random(10),
            'nhaxb' => Str::random(12),
            'tacgia' => Str::random(9),
        ]);
    }
}
