<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bangsach extends Model
{
    protected $table="tbl_sach";
    protected $primaryKey="id";
    protected $fillable = ['ma_sach','ten_sach','ma_nxb','namxb','tacgia'];
    public $timestamps=false;
}
