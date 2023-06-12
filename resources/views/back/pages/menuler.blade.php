@extends('back.layout.admin-layout')
@section('content')
<h3>Menüler Sayfası</h3>
<div class="card-body w-50">
@livewire('menuler')
</div>
@endsection
@push('scripts')

<script>
    $('table tbody#sortable_menu').sortable({
        update:function(event,ui){
            $(this).children().each(function(index){
                if($(this).attr("data-ordering") != (index+1)){
                    $(this).attr("data-ordering",(index+1)).addClass("updated");
                }
            });
            var positions=[];
            $(".updated").each(function(){
                positions.push([$(this).attr("data-index"),$(this).attr("data-ordering")]);
                $(this).removeClass("updated");
            });
           // alert(positions);
          window.livewire.emit("updateMenuOrdering",positions);
        }
    });

</script>

@endpush

