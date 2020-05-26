<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 * @package App\Models
 *
 * @property integer $id
 * @property string $key
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */

class Role extends Model
{
    /**
     * @return BelongsToMany
     */
    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class,'role_id');
    }
}
