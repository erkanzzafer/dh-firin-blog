<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=[
            'subcat_name',
            'parent_cat'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_cat', 'id');
    }


    public function posts(){
            return $this->hasMany(Post::class,'category','id');
        }
}
