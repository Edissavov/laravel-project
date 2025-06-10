
<div x-data="">
<h1>Blogs Page</h1>



@foreach($categories as $category)
   <button wire:click="filterBlogsByCategoryId({{$category->id}})">{{$category->title}}</button>
@endforeach





@foreach($blogs as $blog)
   
    <div>{{ $blog->title }}</div>
    <h1 class="font-bold text-5xl border-b border-red-500 hover:text-red-500" >{{ $blog->title }}</h1>
    <p >{{ $blog->description }}</p>
    <p >{{ $blog->category->title}}</p>
    @foreach($blog->tags as $tag)
        <p>{{ $tag->title }}</p>
    @endforeach


@endforeach    

</div>
