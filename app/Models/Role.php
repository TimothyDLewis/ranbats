<?php

namespace RanBats\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole {
   
   	protected $connection = "mysql";
    protected $table = "roles";
    protected $primaryKey = "id";

    protected $guarded = [];
    protected $fillable = [
        "slug",
        "name",
    ];

    protected $hidden = [
        "pivot",
        "permissions",
        "created_at",
        "updated_at",
    ];

    protected $dates = [
        "created_at",
        "updated_at",
    ];
   
    public $timestamps = true;

    public function users(){
        return $this->belongsToMany(User::class, "role_users");
    }
}