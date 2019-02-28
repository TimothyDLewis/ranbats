<?php

namespace RanBats\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sentinel;
use Illuminate\Auth\Authenticatable;
use Carbon\Carbon;

class User extends EloquentUser {

    use Notifiable;
    use SoftDeletes;
    use Authenticatable;

   	protected $connection = "mysql";
    protected $table = "users";
    protected $primaryKey = "id";

    protected $appends = [
    	
    ];

    protected $guarded = [];
    protected $fillable = [
        "email",
        "password",
        "first_name",
        "last_name"
    ];

    protected $hidden = [
        "password",
        "permissions",
        "last_login",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    protected $dates = [
        "last_login",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public $timestamps = true;

    // Relationships
    public function roles(){
        return $this->belongsToMany(Role::class, "role_users");
    }

    public function activation(){
    	return $this->hasOne(Activation::class);
    }

    public function reminder(){
        return $this->hasOne(Reminder::class);
    }

    public function isActivated() {
        $activationRecord = $this->activation;

        if (!$activationRecord) {
            return false;
        } else {
            if ($activationRecord->completed == 0) {
                return false;
            } else {
                return true;
            }
        }
    }
}