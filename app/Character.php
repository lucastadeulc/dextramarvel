<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'modified', 'thumbnail',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function getId(){
        return $this->id;
    }

    public function comics()
    {
        return $this->hasMany('App\Comic');
    }

    public function series()
    {
        return $this->hasMany('App\Serie');
    }

    public function stories()
    {
        return $this->hasMany('App\Storie');
    }
    
    public function events()
    {
        return $this->hasMany('App\Event');
    }
    
    public function Url()
    {
        return $this->hasMany('App\url');
    }    

}
