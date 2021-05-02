<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'path',
    ];

    protected $hidden = ['pivot'];

    public function getPath()
    {
        if ($exists = Storage::disk('public')->has($this->path)) {
            return Storage::url($this->path);
        } else {
            return Storage::url('images/image_not_found.jpg');
        }
    }

    public function deleteFromDisk()
    {
        Storage::disk('public')->delete($this->path);
    }

    public static function saveOnDisk($image)
    {
        $path = Storage::disk('public')->putFile('images/games', $image);
        return $path;
    }
}
