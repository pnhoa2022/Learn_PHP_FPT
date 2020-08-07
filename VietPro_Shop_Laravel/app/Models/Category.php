<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $guarded = [];

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }
}
