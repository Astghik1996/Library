<?php

namespace App\Http\Controllers;

use App\Contracts\BookContract;
use App\Contracts\BookLibraryContract;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{

    protected BookContract $bookRepo;
    protected BookLibraryContract $bookLibraryRepo;

    public function __construct()
    {
        $this->bookRepo = app()->make(BookContract::class);
        $this->bookLibraryRepo = app()->make(BookLibraryContract::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepo->getAll();
        return $books;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        try {
            $data=[
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'author'=>$request->input('author')
            ];
            $book = $this->bookRepo->create($data);
            $rel=$this->bookLibraryRepo->store([
                'book_id'=>$book->id,
                'library_id'=>$request->input('library_id')
            ]);

            return ['book'=>$book,
                'relation'=>$rel];
        }catch (\Error $e){
            return $e;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $book = $this->bookRepo->show($id);
       return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $data = $request->input();
            $bool = $this->bookRepo->update(['id'=>$id],$data);
            return  $bool;

        }catch (\Error $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = $this->bookRepo->delete($id);
        return $bool;
    }
}
