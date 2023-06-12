<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class AllPost extends Component
{
    use WithPagination;
    public $perPage=8;
    public $search=null;

    protected $listeners=[
        'deletePostAction'
    ];

    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.all-post',[
            'datas'=>Post::search(trim($this->search))
             ->paginate($this->perPage)

        ]);
    }

    public function deletePost ($id){
        $this->dispatchBrowserEvent('deletePost',[
            'title' => 'Yazı silinecek',
            'html'  => 'Silmek istediğinize emin misiniz?',
            'id'    => $id
        ]);
    }

    public function deletePostAction($id){
        $post=Post::find($id);
        $path="back/images/post_images/";
        $sayfa_gorsel=$post->sayfa_gorsel;
        if($sayfa_gorsel!=null && (File::exists($path.$sayfa_gorsel))){
            File::delete($path.$sayfa_gorsel);

            }
            $delete_post=$post->delete();
            if($delete_post){
            $this->showToastr('Ürün başarıyla silindi','success');
            }else{
            $this->showToastr('Hata Oluştu','error');

            }
    }


    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'      => $type,
            'message'   => $message,
        ]);

    }
}
