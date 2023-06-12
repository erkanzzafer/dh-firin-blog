@extends('back.layout.admin-layout')
@section('content')
<h3>Tüm Yazılar</h3>
<section class="content">

    <!-- Default box -->
    <div class="container mw-100">


    @livewire('all-post')

      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
        Footer
      </div>

    </div>

  </section>

@endsection
@push('scripts')
<script>
    window.addEventListener('deletePost',function(event){
        swal.fire({
            title:event.detail.title,
            imageWidth:48,
            ImageHeight:48,
            html: event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'İptal',
            confirmButtonText:'Evet, Sil',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            width:300,
            allowOutsideClick:false,
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deletePostAction',event.detail.id)
            }
        });
    });

</script>

@endpush


