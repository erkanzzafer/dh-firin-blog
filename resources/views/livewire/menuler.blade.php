<div>
    <div class="card-body w-100">
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Kategori Adı</th>
                  <th>Sıralama</th>
                  <th>İşlem</th>

                </tr>
              </thead>
              <tbody id="sortable_menu">

                 @forelse (\App\Models\Menu::all() as $data )
                 <tr data-index="{{$data->id}}" data-ordering="{{$data->ordering}}">
                 <td>{{$data->id}}</td>
                 <td>{{$data->menu_name}}</td>
                 <td> {{$data->ordering}}</td>
                 <td>
                    <div class="btn-group">
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Düzenle
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
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
     </div>
</div>
