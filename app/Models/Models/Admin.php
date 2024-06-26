<?php

namespace App\Models\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;




class Admin extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
       
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get the department that the admin belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
