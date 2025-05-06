<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'prenom',
        'nom',
        'statut',
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
    public function appuis()
    {
        return $this->hasMany(Appuis::class, 'users_id');
    }

    public function groupements()
    {
        return $this->hasMany(Groupement::class, 'users_id');
    }

    public function structures()
    {
        return $this->hasMany(Structure::class, 'users_id');
    }

    public function isAdmin()
    {
        // Vérifie si le rôle de l'utilisateur est 'admin'
        return strtolower($this->role) === 'admin';
    }
}
