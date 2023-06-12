<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['baslik','content','sayfa_gorsel','seo_baslik','seo_etiket','seo_icerik'];


    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'category', 'id');
    }


    public function scopeSearch($query,$term){
        $term="%$term%";
        $query->where(function($query) use ($term){
            $query->where('title','like',$term);
        });

}
}
