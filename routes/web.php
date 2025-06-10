<?php

use App\Livewire\BlogsPage;
use App\Livewire\ContactPage;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view( 'home');
});
Route::get('/blogs', BlogsPage::class)->name('blog.index');
Route::get('/contact', ContactPage::class);