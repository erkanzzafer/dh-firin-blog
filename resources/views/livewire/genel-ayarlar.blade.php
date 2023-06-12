<div>
    <form action="" method="post" wire:submit.prevent="BlogOn()">
        <div class="form-group">
        <label for="exampleInputEmail1">Site İsmi</label>
        <input type="text" class="form-control"  placeholder="Site ismi" wire:model="site_isim">
        @error('site_isim')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Site Email</label>
        <input type="text" class="form-control"  placeholder="Site Email" wire:model="site_email">
        @error('site_email')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Site Açıklama</label>
        <input type="text" class="form-control"  placeholder="Site Açıklama" wire:model="site_aciklama">
        @error('site_aciklama')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
