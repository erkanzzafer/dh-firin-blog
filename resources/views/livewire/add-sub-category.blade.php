<div>
    <form action="" method="post" wire:submit.prevent="AddSubCategory()">
        <div class="form-group">
            <label for="exampleInputEmail1">Alt Kategori Ekle</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alt Kategori girin" wire:model="subcat_name">
            @error('subcat_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="col-sm-6">
            <!-- select -->
            <div class="form-group">
              <label>Custom Select</label>
              <select class="custom-select" wire:model='parent_category'>
                <option>--Kategori Seçiniz--</option>
                @foreach (\App\Models\Category::all() as $category )
                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endforeach
              </select>
              @error('parent_category')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kaydet </button>
        </form>
</div>
