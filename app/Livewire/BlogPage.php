<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogPage extends Component
{
    public $blog;

    public function mount($slug): void{
        $this->blog = Blog::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.blog-page');
    }
}
