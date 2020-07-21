<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materis extends Model
{
    protected $fillable = ['judul','category_id','content','gambar', 'slug'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
