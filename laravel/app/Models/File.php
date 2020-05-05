<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * Class File
 * @package App\Models
 *
 * @property integer $id
 * @property string $path
 * @property string $extension
 * @property string $name
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 *
 * @property string $url
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
            'name'=>md5($file->getClientOriginalExtension().time()),
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
        return $this->path.DIRECTORY_SEPARATOR.$this->name.'.'.$this->extension;
    }
}
