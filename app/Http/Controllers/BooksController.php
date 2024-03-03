<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class BooksController extends Controller
{
    public function GetBooks()
    {
        $booksFromDb = Book::all();

        return response()->json($booksFromDb);
    }

    public function AddBook(Request $request)
    {
        $newBook = $request->getContent();

        $newBook_obj = json_decode($newBook);

        Book::create([
            "name" => $newBook_obj->name,
            "description" => $newBook_obj->description,
            "author_id" => $newBook_obj->author_id,
            "user_id" => Auth::user()['id'],
            "article_id" => $newBook_obj->article_id,
            "publicationYear" => $newBook_obj->publication_year,
            "cover" => "test_cover",
            "added" => Carbon::now()
        ]);

        return response()->json("{'succes':true, 'error':null}");
    }

    public function GetAuthors()
    {
        $authorsFromDb = Author::all();

        return response() -> json($authorsFromDb);
    }

    public function GetArticles()
    {
        $articlesFromDb = Article::all();

        return response() -> json($articlesFromDb);
    }

    public function UpdateBook(Request $request)
    {
        $updatedBook_json = $request->getContent();

        $updatedBook_obj = json_decode($updatedBook_json);
        
         Book::where("id", '=',$updatedBook_obj->id)->update([
            "name" =>  $updatedBook_obj->name,
            "description" =>  $updatedBook_obj->description
        ]);

         return response() -> json($updatedBook_obj);
    }
}
