<div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Alt Kategori Adı</th>
            <th>Yazı Sayısı</th>
            <th>İşlem</th>

          </tr>
        </thead>
        <tbody>

           @forelse ($datas as $data )
           <tr>
           <td>{{$data->id}}</td>
           <td>{{$data->subcat_name}}</td>
           <td> {{$data->posts->count()}}</td>
           <td>
              <div class="btn-group">
                      <a class="btn btn-info btn-sm" href="{{route('admin.updateSubcategory',['subcat_id'=>$data->id])}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Düzenle
                      </a>
                      <a class="btn btn-danger btn-sm" wire:click.prevent='deleteSubCategory({{$data->id}})'>
                          <i class="fas fa-trash">
                          </i>
                          Sil
                      </a>

              </div>
           </td>
          </tr>
           @empty
              <div class="text-danger">Ürün Bulunamadı</div>
           @endforelse

        </tbody>
      </table>
</div>
