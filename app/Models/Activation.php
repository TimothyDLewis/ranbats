<?php

namespace RanBats\Models;

use Cartalyst\Sentinel\Activations\EloquentActivation;

class Activation extends EloquentActivation {

	protected $connection = "mysql";
    protected $table = "activations";
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isExpired(){
        $expires = date("Y-m-d H:i:s", strtotime($this->created_at." + ".config("cartalyst.sentinel.activations.expires")." seconds"));

        if(date("Y-m-d H:i:s") >= $expires){
            return true;
        } else {
            return false;
        }
    }

    public function isCompleted(){
        if($this->completed == 1){
            return true;
        } else {
            return false;
        }
    }
}