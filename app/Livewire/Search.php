<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Blog\Entities\Post;

class Search extends Component
{
    public $title = '';
    public $content = '';
    public $search = '';
    public function delete($id)
    {
        Post::where('id', $id)->delete();
    }
    public function render()
    {
        return view('livewire.search', [
            'blogs' => Post::latest()->where('title', 'like', '%'.$this->search.'%')->get()
        ]);
    }
}
