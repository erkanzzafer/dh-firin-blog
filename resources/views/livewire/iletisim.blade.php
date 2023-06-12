<div>
    <form action="" method="post" wire:submit.prevent="addIletisim()">
        <div class="form-group">
            <label for="exampleInputEmail1">Başlık</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Örneğin: Adres" wire:model="adres_baslik">
            @error('adres_baslik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">İçerik</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Cumhuriyet mah..." wire:model="adres_icerik">
            @error('adres_icerik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <hr>

          <div class="form-group">
            <label for="exampleInputEmail1">Başlık</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Örneğin: Telefon" wire:model="telefon_baslik" >
            @error('telefon_baslik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">İçerik</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="(0212) 236 63 69" wire:model="telefon_icerik">
            @error('telefon_icerik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <hr>

          <div class="form-group">
            <label for="exampleInputEmail1">Başlık</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Örneğin: Email" wire:model="mail_baslik">
            @error('mail_baslik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">İçerik</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="deneme@gmail.com" wire:model="mail_icerik">
            @error('mail_icerik')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <hr>

          <button type="submit" class="btn btn-primary">Kaydet </button>
        </form>
</div>
