@extends('back.layout.admin-layout')
@section('content')
<h3>Kategori Düzenle</h3>
<div class="card-body w-50">
    <form action="{{route('admin.updateCategoryStore')}}" method="post"  id="updateCategoryForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="category_id" value="{{ $datas->id }}">

            <label for="exampleInputEmail1">Kategori Adını Giriniz</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter email" value="{{
            $datas->cat_name }}">
            <span class="text-danger error-text category_name_error"></span>
          </div>
          <button type="submit" class="btn btn-primary">Kaydet </button>
        </form>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
      $('form#updateCategoryForm').on('submit',function(e){
    e.preventDefault();
    toastr.remove();
    var form=this;
    //var post_content = document.getElementById('sayfa_icerik').value;
    var fromdata=new FormData(form);

    $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data:fromdata,
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(form).find('span.error-text').text('');
        },

        success:function(response){
            if(response.code==1){

                toastr.success(response.msg);
            }else{
                toastr.error(response.msg)
            }

        },

        error:function(response){
            console.log(response);
            toastr.remove();
            $.each(response?.responseJSON?.errors,function(prefix,val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
            });
        }
       });
     });


      });
  </script>
@endpush
