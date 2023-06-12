<div>
    <form action="" method="post" wire:submit.prevent="AddMenu()">
        <div class="form-group">
            <label for="exampleInputEmail1">Kategori Adı</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Menü Girin" wire:model="menu_name">
            @error('menu_name')
            <div class="text-danger">{{$message}}</div>

            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Kaydet </button>
        </form>

</div>
