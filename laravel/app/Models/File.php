<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class File
 *
 * @package App\Models
 * @property integer $id
 * @property string $path
 * @property string $extension
 * @property string $name
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property string $url
 * @property-read \App\Models\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    protected $guarded = [];

    const PATH='post';
    const UPLOAD_DIR='public';


    public static function added(UploadedFile $file):self
    {
        return static::create([
            'path'=>self::PATH,
            'extension'=>$file->getClientOriginalExtension(),
            'name'=>$file->hashName(),
            'slug'=>$file->getClientOriginalName()
        ]);

    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function path()
    {
        return storage_path(self::UPLOAD_DIR).DIRECTORY_SEPARATOR.self::PATH;
    }

    public function getUrlAttribute($value):string
    {
        if(empty($this->extension)){
            return $this->path;
        }
        return Storage::disk('public')->url(self::PATH.DIRECTORY_SEPARATOR.$this->name);
    }
}
