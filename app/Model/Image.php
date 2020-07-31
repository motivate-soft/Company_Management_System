<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'folder_id', 'path', 'size'
    ];
    
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id', 'id');
    }
}
