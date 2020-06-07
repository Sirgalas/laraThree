<?php

namespace App\Models;

use App\Http\Requests\UserCreateRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Name
 *
 * @package App\Model
 * @property string $first_name
 * @property string $second_name
 * @property string $family
 * @property int $user_id
 * @property string $created_at
 * @property string $fullName
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $full_name
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Name whereUserId($value)
 * @mixin \Eloquent
 */
class  Name extends Model
{

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->second_name.' '.$this->family;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function create(UserCreateRequest $request,int $userId):self
    {
        $name=new static();
        $name->first_name=$request->name;
        $name->second_name=$request->second_name;
        $name->family=$request->family;
        $name->user_id=$userId;
        $name->created_at=Carbon::now();
        return $name;
    }


}
