<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public $table = 'fakultas';
    protected $primaryKey = 'id_fak';
    protected $fillable = ['nama_fak'];
}
