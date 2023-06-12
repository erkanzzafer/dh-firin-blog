@extends('back.layout.admin-layout')
@section('content')
<h3>Anasayfa İçerik</h3>

<div class="col-12 col-sm-6">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="pt-2 px-3"><h3 class="card-title">İçerik</h3></li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="true">2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">4</a>
          </li>
        </ul>
      </div>



      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
            <form action="{{route('admin.HomeContent1')}}" method="post"  id="addContent1Form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="c1_id" value="{{ $datas[0]->id }}">
                <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Başlık</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="c1_title" value=" {{ $datas[0]->title }} ">
                    <span class="text-danger error-text c_1title_error"></span>
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Görsel</label>
                    <input type="file" class="form-control" id="image"  name="c1_photo"  />
                    <img id="showImage" src="{{ empty($data->photo) ? '/back/images/slider_images/no_image.jpg' : '/back/images/slider_images/'.$data[1]->photo }}" alt="Admin" width="100" height="100">
                    <span class="text-danger error-text c1_photo_error"></span>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">İçerik Açıklama</label>
                    <textarea  class="ckeditor form-control" id="c1_content" placeholder="Yazı İçerik" name="c1_content">{{ $datas[0]->c_name }}</textarea>
                    <span class="text-danger error-text c1_content_error"></span>
                  </div>

                  <button type="submit" class="btn btn-primary">Kaydet </button>
                </form>
          </div>


          <div class="tab-pane fade active show" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
            <form action="{{route('admin.HomeContent2')}}" method="post"  id="addContent2Form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="c2_id" value="{{ $datas[1]->id }}">
                <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Başlık</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="c2_title" value=" {{ $datas[1]->title }} ">
                    <span class="text-danger error-text c_2title_error"></span>
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Görsel</label>
                    <input type="file" class="form-control" id="image2"  name="c2_photo"   />
                    <img id="showImage2" src="{{ empty($datas[1]->photo) ? '/back/images/slider_images/no_image.jpg' : '/back/images/slider_images/'.$datas[1]->photo }}" alt="Admin" width="100" height="100">
                    <span class="text-danger error-text c2_photo_error"></span>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">İçerik Açıklama</label>
                    <textarea  class="ckeditor form-control" id="c2_content" placeholder="Yazı İçerik" name="c2_content">{{ $datas[1]->c_name }}</textarea>
                    <span class="text-danger error-text c2_content_error"></span>
                  </div>
                  <button type="submit" class="btn btn-primary">Kaydet </button>
                </form>
          </div><!-- 2-->





          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
            <form action="{{route('admin.HomeContent3')}}" method="post"  id="addContent3Form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="c3_id" value="{{ $datas[2]->id }}">
                <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Başlık</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="c3_title" value=" {{ $datas[2]->title }} ">
                    <span class="text-danger error-text c3_title_error"></span>
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Görsel</label>
                    <input type="file" class="form-control" id="image3"  name="c3_photo"   />
                    <img id="showImage3" src="{{ empty($datas[2]->photo) ? '/back/images/slider_images/no_image.jpg' : '/back/images/slider_images/'.$datas[2]->photo }}" alt="Admin" width="100" height="100">
                    <span class="text-danger error-text c3_photo_error"></span>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">İçerik Açıklama</label>
                    <textarea  class="ckeditor form-control" id="c3_content" placeholder="Yazı İçerik" name="c3_content">{{ $datas[2]->c_name }}</textarea>
                    <span class="text-danger error-text c3_content_error"></span>
                  </div>
                  <button type="submit" class="btn btn-primary">Kaydet </button>
                </form>
          </div><!--3-->






          <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
            <form action="{{route('admin.HomeContent4')}}" method="post"  id="addContent4Form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="c4_id" value="{{ $datas[3]->id }}">
                <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Başlık</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="c4_title" value=" {{ $datas[3]->title }} ">
                    <span class="text-danger error-text c4_title_error"></span>
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputEmail1">İçerik Görsel</label>
                    <input type="file" class="form-control" id="image4"  name="c4_photo"   />
                    <img id="showImage4" src="{{ empty($datas[3]->photo) ? '/back/images/slider_images/no_image.jpg' : '/back/images/slider_images/'.$datas[3]->photo }}" alt="Admin" width="100" height="100">
                    <span class="text-danger error-text c4_photo_error"></span>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">İçerik Açıklama</label>
                    <textarea  class="ckeditor form-control" id="c4_content" placeholder="Yazı İçerik" name="c4_content">{{ $datas[3]->c_name }}</textarea>
                    <span class="text-danger error-text c4_content_error"></span>
                  </div>
                  <button type="submit" class="btn btn-primary">Kaydet </button>
                </form>
          </div>
          <!--4-->
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
@push('scripts')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
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
     $('form#addContent1Form').on('submit',function(e){
    e.preventDefault();
    toastr.remove();
    var c1_content = CKEDITOR.instances.c1_content.getData();
    var form=this;
    //var post_content = document.getElementById('sayfa_icerik').value;
    var fromdata=new FormData(form);
        fromdata.append('c1_content',c1_content);
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

  </script>


<script type="text/javascript">
    $(document).ready(function(){
            $('#image2').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showImage2').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
    });
    </script>
<script>
    $('form#addContent2Form').on('submit',function(e){
   e.preventDefault();
   toastr.remove();
   var c2_content = CKEDITOR.instances.c2_content.getData();
   var form=this;
   //var post_content = document.getElementById('sayfa_icerik').value;
   var fromdata=new FormData(form);
       fromdata.append('c2_content',c2_content);
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

 </script>



<script type="text/javascript">
    $(document).ready(function(){
            $('#image3').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showImage3').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
    });
    </script>
<script>
    $('form#addContent3Form').on('submit',function(e){
   e.preventDefault();
   toastr.remove();
   var c3_content = CKEDITOR.instances.c3_content.getData();
   var form=this;
   //var post_content = document.getElementById('sayfa_icerik').value;
   var fromdata=new FormData(form);
       fromdata.append('c3_content',c3_content);
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

 </script>

<script type="text/javascript">
    $(document).ready(function(){
            $('#image4').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showImage4').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
    });
    </script>
<script>
    $('form#addContent4Form').on('submit',function(e){
   e.preventDefault();
   toastr.remove();
   var c4_content = CKEDITOR.instances.c4_content.getData();
   var form=this;
   //var post_content = document.getElementById('sayfa_icerik').value;
   var fromdata=new FormData(form);
       fromdata.append('c4_content',c4_content);
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

               $('div.image_holder').find('img').attr('src','');

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

 </script>
@endpush
