<?php

namespace App\Http\Controllers;


class CommonController extends Controller
{
    public function __construct()
    {
        $title = "Tea-Time";
        \View::share(['title'=>$title]);
    }
}
