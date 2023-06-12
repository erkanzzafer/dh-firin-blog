@extends('back.layout.admin-layout')
@section('content')
<h3>Alt Kategori Düzenle</h3>

<form action="{{route('admin.addSlider')}}" method="post"  id="addSliderForm" enctype="multipart/form-data">
    @csrf
    <div class="form-group w-50">
        <label for="exampleInputEmail1">Slider Başlık</label>
        <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="photo_name" value="{{ $datas->name }}">
        <span class="text-danger error-text photo_name_error"></span>
      </div>

      <div class="form-group w-50">
        <input type="file" class="form-control" id="image"  name="photo"  />
        <img id="showImage" src="{{ empty($datas->photo) ? '/back/images/slider_images/no_image.jpg' : '/back/images/slider_images/'.$datas->photo }}" alt="Admin" width="100" height="100">
        <span class="text-danger error-text photo_error"></span>
      </div>
      <button type="submit" class="btn btn-primary">Kaydet </button>
    </form>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
            $('#image').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
    });
    </script>
<script>
      $('form#addSliderForm').on('submit',function(e){
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
            toastr.remove();
            $.each(response?.responseJSON?.errors,function(prefix,val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
            });
        }
       });
     });
  </script>
@endpush
