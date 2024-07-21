<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Posts;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_name',
        'surname',
        'email',
        'password',
        'phone',
        'addres',
        'languages',
        'gender',
        'age',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class,'user_id','id');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class,'user_id','id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skills::class,'user_id','id');
    }

    public function information(): HasOne
    {
        return $this->hasOne(Information::class,'user_id','id');
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class,'user_id','id');
    }
}
