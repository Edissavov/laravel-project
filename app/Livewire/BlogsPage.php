<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Component;



class BlogsPage extends Component
{
    public $blogs;
    public $categories;

    
    public function mount(){
        $this->blogs = Blog::all();
        $this->categories = Category::all();
    }


    public function filterBlogsByCategoryId(Category $category){
        $this->blogs = $category->blogs; 
    }

    public function render()
    {
        return view('livewire.blogs-page');
    }
}
