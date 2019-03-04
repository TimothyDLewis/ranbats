<?php

namespace RanBats\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole {
   
   	protected $connection = "mysql";
    protected $table = "roles";
    protected $primaryKey = "id";

    public function users(){
        return $this->belongsToMany(User::class, "role_users");
    }
}