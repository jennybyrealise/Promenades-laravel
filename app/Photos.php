<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $upload = '/images';
    protected $filable = ['file'];
    public function getFileAttribute ($photo){
        return $this->upload .$photo;
    }
}
