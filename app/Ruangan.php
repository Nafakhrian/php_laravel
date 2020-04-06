<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fakultas;

class Ruangan extends Model
{
    public $table = 'ruangan';
    protected $primaryKey = 'id_rua';
    protected $fillable = ['nama_rua', 'id_jur'];

    public function jurusan(){
    	return $this->belongsTo('App\Jurusan', 'id_jur');
    }
}
