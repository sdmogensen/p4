<?php

namespace Gifter\Http\Controllers;

use Illuminate\Http\Request;
use Gifter\Retailer;
use Gifter\Gift;
use Gifter\User;

class GiftController extends Controller
{
    /**
     * GET
     */
    public function guestIndex($username)
    {
        $user = User::where('username', '=', $username)->first();

        if($user) {
            $gifts = $user->gifts()->get();
        }
        else {
            abort(404);
        }

        return view('gift.guestIndex')->with('gifts', $gifts)
                                      ->with('username', $username);
    }

    /**
     * POST
     */
    public function purchased(Request $request, $username)
    {
        $gift = Gift::find($request->input('gift_id'));
        $gift->purchased = true;
        $gift->save();

        return redirect('/wishlists/'.$username);
    }

    /**
     * GET
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('gift.index')->with('gifts', $user->gifts()->get())
                                 ->with('username', $user->username);
    }

    /**
     * GET
     */
    public function create()
    {
        return view('gift.create')->with('retailers_for_dropdown', Retailer::getForDropdown());
    }

    /**
     * POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'retailer' => 'required',
            'gift_name' => 'required',
            'price' => 'required|numeric|min:0.01',
            'purchase_link' => 'required|url',
            'image_url' => 'url',
        ]);

        $gift = new Gift();
        $gift->retailer_id = $request->retailer;
        $gift->name = $request->gift_name;
        $gift->price = $request->price;
        $gift->url = $request->purchase_link;
        $gift->image = $request->image_url;
        $gift->purchased = false;
        $gift->user_id = $request->user()->id;

        $gift->save();

        // Session::flash('flash_message', $gift->name.' has been added to your gift list.');

        return redirect('/gifts/index');
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
    public function edit($gift_id)
    {
        return view('gift.edit')->with('gift', Gift::find($gift_id))
                                ->with('retailers_for_dropdown', Retailer::getForDropdown());
    }

    /**
     * POST
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'retailer' => 'required',
            'gift_name' => 'required',
            'price' => 'required|numeric|min:0.01',
            'purchase_link' => 'required|url',
            'image_url' => 'url',
        ]);

        $gift = Gift::find($id);
        $gift->retailer_id = $request->retailer;
        $gift->name = $request->gift_name;
        $gift->price = $request->price;
        $gift->url = $request->purchase_link;
        $gift->image = $request->image_url;

        $gift->save();

        // Session::flash('flash_message', $gift->name.' has been added to your gift list.');

        return redirect('/gifts/index');
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $gift = Gift::find($id);
        $gift->delete();

        // Session::flash('flash_message', $book->title.' was deleted.');

        return redirect('/gifts/index');
    }

}
