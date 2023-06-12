@extends('back.layout.admin-layout')
@section('content')
<h3>Tüm Kategoriler</h3>
<div class="card-body w-50">
    <div class="card-body">
      @livewire('alt-kategoriler')
      </div>
 </div>
@endsection
@push('scripts')
<script>
    window.addEventListener('deleteCategory',function(event){
        swal.fire({
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:"İptal",
            confirmButtonText:"Sil",
            cancelButtonColor:"#d33",
            confirmButtonColor:"#3085d6",
            width:300,

            allowOutsideClick:true,
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteSubCategoryAction',event.detail.id);
            }
        });
    });
</script>
@endpush
