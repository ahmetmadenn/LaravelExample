<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex(){
        //$book =Book::find(2); //first()
        //$book =Book::where('id',3)->first();
        //$book =Book::whereRaw('id=?', array(1))->first();
        $books =Book::all();
        $bookCount=Book::where('id','>', 0)->count();
        return view('index', array('books'=>$books, 'bookCount'=>$bookCount));
    }


    public function postBook(Request $request){
        $validateData = $request->validate(
            [
                'name'=>'required|string',
                'book_code'=>'required|integer',
                'author'=>'required|string',

            ]
        );
        //kayit işlemleri
        $book = new Book();
        $book->name = $request->name;
        $book->book_code = $request->book_code;
        $book->author = $request->author;
        $book->save();
        return back();
   }

   public function bookDelete(int $id){
          Book::where('id', $id)->delete();
          return redirect()->route('index');
   }

   public function getBookEdit(int $id){
    $books =Book::all();
    $bookCount=Book::where('id','>', 0)->count();
    $book= Book::where('id', $id)->first();
    return view('index', array('books'=>$books, 'bookCount'=>$bookCount,'firstBook'=>$book));
   }

   public function postBookEdit(Request  $request){
    $validateData = $request->validate(
        [
            'name'=>'required|string',
            'book_code'=>'required|integer',
            'author'=>'required|string',
            'book_id'=>'required|integer',

        ]
    );
    //günceleme işlemleri
    $book= Book::find($request->book_id);
    $book->name = $request->name;
    $book->book_code = $request->book_code;
    $book->author = $request->author;
    $book->save();
    return redirect()->route('index');

}
}
