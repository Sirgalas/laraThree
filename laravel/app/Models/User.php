<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\HasOne;
/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $email
 * @property int $email_verified_at
 * @property Name $name
 *
 * @property string $fullName
 * @property Role $roles
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function name():HasOne
    {
        return $this->hasOne(Name::class);
    }

    /**
     * @return HasMany
     */
    public function posts():HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return BelongsToMany
     */
    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class,'user_roles','user_id', 'role_id');
    }


    public function getFullNameAttribute($value):string
    {

        if(is_object($this->name)){
            return $this->name->fullName;
        }
        return $this->email;
    }

    public static function tableName()
    {
        return 'users';
    }
}
