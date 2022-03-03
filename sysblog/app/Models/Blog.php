<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    /* protected $primaryKey = 'id'; */
    /* protected $fillable = ['titulo', 'autor', 'contenido', 'imagen', 'tags', 'created_at', 'updated_at']; */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
