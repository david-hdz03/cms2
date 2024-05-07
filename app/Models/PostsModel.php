<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    // protected $primaryKey = 'IdCategoria';
    public $timestamps = true; //para que inserte en las columnas create_at y update_at, false para omitir la insercion
}
