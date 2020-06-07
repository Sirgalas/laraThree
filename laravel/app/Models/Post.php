<?php

namespace App\Models;

use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use App\Models\Name;


/**
 * Class Post
 *
 * @package App\Model
 * @property string $title
 * @property string $desc
 * @property boolean $is_moderate
 * @property integer $user_id
 * @property integer $file_id
 * @property string $created_at
 * @property string $updated_at
 * @property File $file
 * @property User $user
 * @property int $id
 * @property bool $is_header
 * @property bool $is_top
 * @property-read \App\Models\Name|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsModerate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    protected $guarded = [];

    public static function added(PostRequest $request, int $fileId=null)
    {
        return static::create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'is_moderate'=>false,
            'user_id'=>$request->user_id,
            'file_id'=>$fileId??null,]
        );

    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function file():BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function author()
    {
        return $this->hasOneThrough(Name::class,User::class,'id','user_id');
    }

    public static function tableName()
    {
        return 'posts';
    }
}
