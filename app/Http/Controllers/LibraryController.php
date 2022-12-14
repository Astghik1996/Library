<?php

namespace App\Http\Controllers;

use App\Contracts\LibraryContract;
use App\Http\Resources\LibraryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    protected LibraryContract $libraryRepo;
    public function __construct()
    {
        $this->libraryRepo = app()->make(LibraryContract::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response|LibraryResource
     */
    public function index(): Response|LibraryResource
    {
        $libraries = $this->libraryRepo->getAll();
        return   new LibraryResource([
            'libraries'=>$libraries,
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|LibraryResource
     */
    public function show($id): Response|LibraryResource
    {
        $library= $this->libraryRepo->show($id,['books','books.likes']);
        return   new LibraryResource([
            'libraries'=>$library,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
