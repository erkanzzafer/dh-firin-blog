@extends('back.layout.admin-layout')
@section('content')
<h3>Alt Kategori Düzenle</h3>
<div class="card-body w-50">
    <form action="{{route('admin.updateSubcategoryStore')}}" method="post"  id="editSubCatForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="subcategory_id" value="{{ $datas->id }}">
            <label for="exampleInputEmail1">Alt Kategori Adı</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alt Kategori girin" name="subcat_name" value="{{ $datas->subcat_name }}">
            <span class="text-danger error-text subcat_name_error"></span>
          </div>
          <div class="col-sm-6">
            <!-- select -->
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name='parent_category'>

                @foreach (\App\Models\Category::all() as $category )
                <option value="{{$category->id}}"  {{$category->id==$datas->parent_cat ? 'selected' : ''}}  >{{$category->cat_name}}</option>
                @endforeach
              </select>
              <span class="text-danger error-text parent_category_error"></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kaydet </button>
        </form>
 </div>
@endsection
@push('scripts')
<script>
    $(function(){
      $('form#editSubCatForm').on('submit',function(e){
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
