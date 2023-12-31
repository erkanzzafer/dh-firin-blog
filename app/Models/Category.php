<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['cat_name'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'parent_cat', 'id');
    }
}
