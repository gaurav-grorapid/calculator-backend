<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use Uuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public const FIRST_NAME = "first_name";
    public const LAST_NAME = "last_name";
    public const EMAIL = "email";
    public const PASSWORD = "password";
    public const IS_ACTIVE = "is_active";
    protected $fillable = [
       self::FIRST_NAME,
       self::LAST_NAME,
       self::EMAIL,
       self::PASSWORD,
       self::IS_ACTIVE,
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
    ];

    public static function findByEmail($email)
    {
       return User::where('email',$email)->first();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}