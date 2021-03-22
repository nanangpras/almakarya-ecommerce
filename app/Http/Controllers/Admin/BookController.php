<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Book::with(['imagebook'])->get();

        return view('backend.pages.books.data',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = Author::pluck('name', 'id');
        $publisher = Publisher::pluck('name', 'id');
        $category = Category::pluck('name', 'id');
        return view('backend.pages.books.add',[
            'author'=>$author,
            'publisher'=>$publisher,
            'category'=>$category,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // dump($request->all());
        // dd($request->all());
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        Book::create($data);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Book::findOrFail($id);
        // dd($transaction);exit;
        return view('backend.pages.books.delete',
        [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Book::findOrFail($id);
        $publisher = Publisher::orderBy('name', 'DESC')->get();
        $author = Author::orderBy('name', 'DESC')->get();
        $category = Category::orderBy('name', 'DESC')->get();
        return view('backend.pages.books.edit',[
            'item' => $item,
            'publisher' => $publisher,
            'category' => $category,
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Book::findOrFail($id);
        $item->update($data);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Book::findorFail($id);
        $item->delete();

        BookImage::where('book_id', $id)->delete();

        return redirect()->route('book.index');
    }

    public function image(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $items = BookImage::with('book')
            ->where('book_id', $id)
            ->get();

        return view('backend.pages.books.image')->with(
            [
                'book' => $book,
                'items'   => $items
            ]
        );
    }
}
