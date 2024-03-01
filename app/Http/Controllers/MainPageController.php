<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class MainPageController extends Controller
{
        public function Index()
        {
            $books = Book::all();

            return view("main",compact("books"));
        }
}
