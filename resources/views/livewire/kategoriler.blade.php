<div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Kategori Adı</th>
            <th>Alt Kategori Sayısı</th>
            <th>İşlem</th>

          </tr>
        </thead>
        <tbody>

           @forelse ($datas as $data )
           <tr>
           <td>{{$data->id}}</td>
           <td>{{$data->cat_name}}</td>
           <td> {{$data->subcategory->count()}}</td>
           <td>
              <div class="btn-group">
                      <a class="btn btn-info btn-sm" href="{{route('admin.updateCategory',['cat_id'=>$data->id])}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Düzenle
                      </a>
                      <a class="btn btn-danger btn-sm" wire:click.prevent='deleteCategory({{$data->id}})'>
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
