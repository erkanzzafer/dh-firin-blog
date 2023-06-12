<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Models\Slider;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','back.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home',[AdminController::class,'index'])->name('index');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/sifreDegistir',[AdminController::class,'changePassword'])->name('changePassword');
        Route::view('/genelAyarlar','back.pages.genelAyarlar')->name('genelAyarlar');
        Route::post('/blog-logo',[AdminController::class,'changeBlogLogo'])->name('change-blog-logo');

        //category
        Route::view('/kategori-ekle','back.pages.kategoriEkle')->name('addCategory');
        Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
        Route::get('/kategori-duzenle',[CategoryController::class,'updateCategory'])->name('updateCategory');
        Route::post('/kategori-guncelle',[CategoryController::class,'updateCategoryStore'])->name('updateCategoryStore');



        //subcategory
        Route::view('/altkategori-ekle','back.pages.altkategoriEkle')->name('addSubcategory');
        Route::get('/altkategoriler',[SubcategoryController::class,'index'])->name('subcategories');
        Route::get('/altkategori-duzenle',[SubcategoryController::class,'updateSubcategory'])->name('updateSubcategory');
        Route::post('/altkategori-guncelle',[SubcategoryController::class,'updateSubcategoryStore'])->name('updateSubcategoryStore');


        //posts
        Route::view('/yazi-ekle','back.pages.yaziEkle')->name('addPost');
        Route::post('/yazi-olustur',[PostController::class,'createPost'])->name('createPost');
        Route::get('/tum-yazilar',[PostController::class,'allPost'])->name('allPost');
        Route::get('/yazi-duzenle',[PostController::class,'editPost'])->name('editPost');
        Route::post('/yazi-guncelle',[PostController::class,'updatePost'])->name('updatePost');


        //menu addMenu
        Route::view('/menu-ekle','back.pages.menuEkle')->name('addMenu');
        Route::view('/menuler','back.pages.menuler')->name('allMenu');


        //Anasayfa Ayarları
        //Route::view('/anasayfa-slider','back.pages.anasayfa.slider')->name('slider');
        Route::get('anasayfa-slider',[SliderController::class,'index'])->name('slider');
        Route::post('/anasayfa-slider-add',[SliderController::class,'addSlider'])->name('addSlider');
        Route::get('anasayfa-icerik',[SliderController::class,'HomeContent'])->name('HomeContent');
        Route::post('anasayfa-icerik-ekle',[SliderController::class,'HomeContent1'])->name('HomeContent1');
        Route::post('anasayfa-icerik-ekle2',[SliderController::class,'HomeContent2'])->name('HomeContent2');
        Route::post('anasayfa-icerik-ekle3',[SliderController::class,'HomeContent3'])->name('HomeContent3');
        Route::post('anasayfa-icerik-ekle4',[SliderController::class,'HomeContent4'])->name('HomeContent4');


        //İletişim Ayarları
        Route::view('/iletisim','back.pages.iletisim')->name('iletisim');
    });
});
