<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class Post
 * @package App\Model
 * @property  string $title
 * @property string $desc
 * @property boolean $is_moderate
 * @property integer $user_id
 * @property integer $file_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property File $file
 */
class Post extends Model
{
    protected $guarded = [];

    public static function added(Request $request, int $fileId=null)
    {
        return static::create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'is_moderate'=>false,
            'user_id'=>$request->user_id,
            'file_id'=>$fileId??null,]
        );

    }


    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
