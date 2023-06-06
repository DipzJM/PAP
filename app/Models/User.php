<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the user's details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userDetails(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }
    
    /**
     * Get the user's vehicles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userVehicles(): HasMany
    {
        return $this->hasMany(UserVehicles::class, 'id_utilizador');
    }

    /**
     * Check if the user has completed 2FA authentication.
     *
     * @return bool
     */
    public function isTwoFactorAuthenticated()
    {
        // Implement the logic to check if the user has completed 2FA authentication.
        // For example, you can add a boolean field 'two_factor_authenticated'
        // to the users table and check the value of this field here.
        // Return true if 2FA authenticated, or false otherwise.

        return $this->two_factor_authenticated;
    }
}
