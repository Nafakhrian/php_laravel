<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barang';
    protected $primaryKey = 'id_bar';
    protected $fillable = ['id_rua', 'nama_bar', 'total_bar', 'rusak_bar', 'foto', 'created_by', 'updated_by'];

    public function ruangan(){
    	return $this->belongsTo('App\Ruangan', 'id_rua');
    }
    public function user_c(){
    	return $this->belongsTo('App\User', 'created_by', 'id');
    }
    public function user_u(){
    	return $this->belongsTo('App\User', 'updated_by', 'id');
    }
}
