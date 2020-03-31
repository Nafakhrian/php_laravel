<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barang';
    protected $primaryKey = 'id_bar';
    protected $fillable = ['nama_bar'];
}
