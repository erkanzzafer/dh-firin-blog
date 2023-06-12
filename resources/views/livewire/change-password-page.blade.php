<div>
    <form  method="post" wire:submit.prevent="PasswordHandler()">
    <div class="card-body w-50" >
        <div class="form-group">
          <label for="exampleInputEmail1">Güncel Şifre</label>
          <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter email" wire:model="guncelSifre">
          @error('guncelSifre')
          <div class="text-danger"> {{$message}}</div>
       @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Yeni Şifre</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" wire:model="sifre1">
          @error('sifre1')
          <div class="text-danger"> {{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Yeni Şifre Tekrar</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" wire:model="sifre2">
            @error('sifre2')
            <div class="text-danger"> {{$message}}</div>
           @enderror
        </div>

      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary">Kaydet</button>
      <div>
        <form>
</div>
