<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Name
 * @package App\Model
 * @property string $first_name
 * @property string $second_name
 * @property string $family
 *
 * @property string $fullName
 */
class  Name extends Model
{

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->second_name.' '.$this->family;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
