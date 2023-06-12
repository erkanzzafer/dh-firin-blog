@extends('back.layout.admin-layout')
@section('content')
<h3>Yazı Ekle</h3>

<div class="">
    <form action="{{route('admin.createPost')}}" method="post"  id="addPostForm" enctype="multipart/form-data">
        @csrf
        <div class="container" style="max-width: 100% !important">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Yazı Başlık</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Yazı Başlık" name="post_title">
                        <span class="text-danger error-text post_title_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="post_content">Yazı İçerik</label>
                        <textarea  class="ckeditor form-control" id="post_content" placeholder="Yazı İçerik" name="post_content"></textarea>
                        <span class="text-danger error-text post_content_error"></span>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label>Kategori Seçimi</label>
                        <select class="custom-select" name='parent_category'>
                          <option>--Kategori Seçiniz--</option>
                          @foreach (\App\Models\Subcategory::all() as $subcategory )
                          <option value="{{$subcategory->id}}">{{$subcategory->subcat_name}}</option>
                          @endforeach
                          <span class="text-danger error-text parent_category_error"></span>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">SEO Etiket</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Yazı Başlık" name="seo_etiket">
                        <span class="text-danger error-text seo_etiket_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SEO Başlık</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Yazı Başlık" name="seo_baslik">
                        <span class="text-danger error-text seo_baslik_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SEO İçerik</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Yazı Başlık" name="seo_icerik">
                        <span class="text-danger error-text seo_icerik_error"></span>
                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px" >
                        <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img=''>
                    </div>

                    <div class="form-group">
                          <label for="exampleInputFile">Görsel</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="sayfa_gorsel" class="custom-file-input" id="sayfa_gorsel">
                              <label class="custom-file-label" for="exampleInputFile">Görsel Seç</label>

                            </div>
                          </div>
                          <span class="text-danger error-text sayfa_gorsel_error"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet </button>
                </div>
            </div>
        </div>
    </form>
 </div>
@endsection
@push('scripts')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    $(function(){
          $('input[type="file"][name="sayfa_gorsel"]').ijaboViewer({
          preview:'#image-previewer',
          imageShape:'rectangular',
          allowedExtensions:['jpg','jpeg','png'],
          onErrorShape:function(message,element){
              alert(message);
          },
          onInvalidType: function(message,element){
              alert(message);
          },
          onSuccess:function(message,element){

          }
      });
      $('form#addPostForm').on('submit',function(e){
    e.preventDefault();
    toastr.remove();
    var post_content = CKEDITOR.instances.post_content.getData();
    var form=this;
    //var post_content = document.getElementById('sayfa_icerik').value;
    var fromdata=new FormData(form);
        fromdata.append('post_content',post_content);
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
                $(form)[0].reset();
                $('div.image_holder').find('img').attr('src','');
                CKEDITOR.instances.post_content.setData('');
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
