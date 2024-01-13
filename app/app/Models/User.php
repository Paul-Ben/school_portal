<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN_ROLE = 1;
    const SUPPORT = 2;
    const STAFF_ROLE = 3;
    const STUDENT_ROLE = 4;

    const MALE = 'MALE';
    const FEMALE = 'FEMALE';

    const GENDER = [
        self::MALE => "Male",
        self::FEMALE => 'Female'
    ];

    const ROLES = [
        self::ADMIN_ROLE => 'Admin',
        self::SUPPORT => 'Support',
        self::STAFF_ROLE => 'Staff',
        self::STUDENT_ROLE => 'Student'
    ];


    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'student') {
            return $this->role === self::STUDENT_ROLE;
        } elseif ($panel->getId() === 'staff') {
            return $this->role === self::STAFF_ROLE;
        } elseif ($panel->getId() === 'support') {

            return $this->role === self::SUPPORT;
        }

        return $this->role === self::ADMIN_ROLE;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
