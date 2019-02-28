<?php

namespace RanBats\Models;

use Cartalyst\Sentinel\Reminders\EloquentReminder;

class Reminder extends EloquentReminder {

	protected $connection = "mysql";
    protected $table = "reminders";
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isExpired(){
        $expiry = config("cartalyst.sentinel.reminders.expires");

        if(date("Y-m-d H:i:s") >= date("Y-m-d H:i:s", strtotime($this->created_at. " + ".$expiry." seconds"))){
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