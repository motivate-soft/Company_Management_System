<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'name', 'parent', 'type'
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class, 'folder_id', 'id');
    }
}
