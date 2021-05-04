<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class bangnhaxb extends Model
{
    //
    protected $table="tbl_nxb";
    protected $primaryKey="id_nxb";
    protected $fillable = ['ma_nxb','ten_nxb'];
    public $timestamps=false;
}
