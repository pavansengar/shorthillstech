<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Event extends Model
{
    protected $fillable = [
        'title', 'description'
    ];
    public function setTitleAttribute($value){
        $this->attributes['title']=Crypt::encryptString($value);
    }
    public function setDescriptionAttribute($value){
        $this->attributes['description']=Crypt::encryptString($value);
    }
    public function getTitleAttribute($value){
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
        
    }
    public function getDescriptionAttribute($value){
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        } 
    }
}
