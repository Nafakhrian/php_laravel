<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $table = 'Jurusan';
    protected $primaryKey = 'id_jur';
    protected $fillable = ['nama_jur', 'id_fak'];
}
