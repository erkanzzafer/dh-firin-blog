<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Content extends Model
{
    use HasFactory;

    protected $table = 'home_contents';
    protected $fillable=['c_name','photo','title'];
}
