<?php

namespace App\Http\Controllers;

use App\Contracts\LikeContract;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    protected LikeContract $likeRepo;
    public function __construct()
    {
        $this->likeRepo = app()->make(LikeContract::class);
    }

    public function store(Request $request)
    {
        dd($request);
    }


}
