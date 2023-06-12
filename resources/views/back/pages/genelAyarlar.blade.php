@extends('back.layout.admin-layout')
@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> </h5>
   {{Session::get('success')}}
  </div>
@endif
<div class="col-12 col-sm-6">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Site</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Sosyal Medya</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Logo</a>
          </li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            @livewire('genel-ayarlar')
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
           @livewire('sosyal-medya-ayarlari')
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">


                        <form action="{{route('admin.change-blog-logo')}}" method="post" id="changeBlogLogoForm" enctype="multipart/form-data">
                            @csrf
                            <br>
                        <input type="file" class="" name="blog_logo" id="exampleInputFile">
                        <img src="" alt="" class="img-thumbnail" id="logo-image-preview" data-ijabo-default-img="{{\App\Models\Setting::find(1)->logo}}"><br><br>
                      <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                    </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('input[name="blog_logo"]').ijaboViewer({
        preview:'#logo-image-preview',
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


  </script>

@endpush
