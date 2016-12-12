<?php

namespace Gifter\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class PageController extends Controller
{
    public function welcome(Request $request) {
        if ($request->user()) {
            return redirect('/gifts/index');
        }
        else {
            return view('welcome');
        }
    }
}
