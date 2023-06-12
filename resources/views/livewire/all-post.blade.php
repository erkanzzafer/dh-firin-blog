<div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="" class="form-label">Arama..</label>
        <input type="text" class="form-control" placeholder="arama..." wire:model="search">
    </div>
</div>

    <div class="row">
        @forelse ($datas as $data )
        <div class="col-md-3">
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('/back/images/post_images/'.$data->sayfa_gorsel)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$data->title}}</h5>
              <p class="card-text">{!!$data->content!!}</p>
              <a class="btn btn-info btn-sm" href="{{route('admin.editPost',['post_id'=>$data->id])}}">
                <i class="fas fa-pencil-alt">
                </i>
                Düzenle
            </a>
            <a class="btn btn-danger btn-sm" wire:click.prevent='deletePost({{$data->id}})'>
                <i class="fas fa-trash">
                </i>
                Sil
            </a>
            </div>
          </div>
        </div>
        @empty
        <div class="text-danger">Yazı Bulunamadı</div>

        @endforelse
     </div>
     <div class="d-block mt-2">
        {{$datas->links('livewire::bootstrap')}}
    </div>
    </div>

</div>
