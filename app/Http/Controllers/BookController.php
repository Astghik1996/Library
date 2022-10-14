<?php

namespace App\Http\Controllers;

use App\Contracts\BookContract;
use App\Contracts\BookLibraryContract;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response|BookResource
     */
    public function index(): Response|BookResource
    {
        $books = $this->bookRepo->getAll();
        return new BookResource([
            'book'=>$books,
            'status'=>200
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return ErrorResource|BookResource
     */
    public function store(BookRequest $request): ErrorResource|BookResource
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

            return new BookResource([
                'book'=>$book,
                'rel'=>$rel,
                'message'=>'book created successfully ',
                'status'=>201
            ]);
        }catch (\Error $e){
            return New ErrorResource([
                'message'=>$e->getMessage(),
                'status'=>422
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|BookResource
     */
    public function show($id): Response|BookResource
    {
       $book = $this->bookRepo->show($id);
       return new BookResource([
           'book'=>$book,
           'status'=>200
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
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
     * @return Response
     */
    public function destroy($id)
    {
        $bool = $this->bookRepo->delete($id);
        return $bool;
    }
}
