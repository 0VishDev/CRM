<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['data_sources'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }
    
    public function setpaymenttermAttribute($value)
    {
        $this->attributes['paymentterm'] = json_encode($value);
    }

    public function getpaymenttermAttribute($value)
    {
        return $this->attributes['paymentterm'] = json_decode($value);
    }
    
    public function setbuyAttribute($value)
    {
        $this->attributes['buy'] = json_encode($value);
    }

    public function getbuyAttribute($value)
    {
        return $this->attributes['buy'] = json_decode($value);
    }
    
     public function setsaleAttribute($value)
    {
        $this->attributes['sale'] = json_encode($value);
    }

    public function getsaleAttribute($value)
    {
        return $this->attributes['sale'] = json_decode($value);
    }
}
