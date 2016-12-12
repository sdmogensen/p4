<?php

namespace Gifter\Http\Controllers;

use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * GET
     */
    public function guestIndex()
    {
        return view('gift.guestIndex');
    }

    /**
     * POST
     */
    public function purchased()
    {
        return view('gift.guestIndex');
    }

    /**
     * GET
     */
    public function index()
    {
        return view('gift.index');
    }

    /**
     * GET
     */
    public function create()
    {
        return view('gift.create');
    }

    /**
     * POST
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * GET
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * GET
     */
    public function edit($gift)
    {
        return view('gift.edit')->with('gift', $gift);
    }

    /**
     * POST
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        //
    }

}
