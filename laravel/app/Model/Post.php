<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Model
 * @property  string $title
 * @property string $desc
 * @property boolean $is_moderate
 * @property integer $user_id
 */
class Post extends Model
{
    protected $guarded = [];

    public function scopeModerate($query)
    {
        return $query->where('is_moderate',true);
    }
    public function scopeBottom($query,$take=false)
    {
        $query->where('is_moderate',true)->where('is_top',false)->where('is_header',false)->inRandomOrder();
        if($take){
            $query->take($take);
        }
        return $query;
    }

    public function scopeTop($query)
    {
        return $query->where('is_top',true)->where('is_moderate',true)->inRandomOrder()->take(3);
    }

    public function scopeHeader($query)
    {
        return $query->where('is_header',true)->where('is_moderate',true)->inRandomOrder()->take(2);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['is_moderate']=false;
    }
}
