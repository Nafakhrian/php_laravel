<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    public $table = 'Ruangan';
    protected $primaryKey = 'id_rua';
    protected $fillable = ['nama_rua', 'id_fak'];
}
