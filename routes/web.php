<?php

use App\Livewire\BlogPage;
use App\Livewire\BlogsPage;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::get('/contact', ContactPage::class);

Route::get('/blogs', BlogsPage::class)->name('blog.index');

Route::get('/blogs/{slug}', BlogPage::class)->name('blog.show');