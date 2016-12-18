<?php

namespace Gifter\Http\Controllers;

use Illuminate\Http\Request;
use Gifter\Retailer;
use Session;

class RetailerController extends Controller
{
    /**
     * GET
     */
    public function create()
    {
        return view('retailer.create');
    }

    /**
     * POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'retailer_name' => 'required|unique:retailers,name',
        ]);

        $retailer = new Retailer();
        $retailer->name = $request->retailer_name;
        $retailer->user_id = $request->user()->id;
        $retailer->save();

        Session::flash('flash_message', $request->retailer_name.' has been added as a retailer.');

        return redirect('/gifts/index');
    }
}
