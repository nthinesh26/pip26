<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\WebTool;
use Illuminate\Http\Request;

class WishListController extends Controller
{

	public function wishListWindow(){
        dd('WL');
        if(!$message = session('message'))
            $message = '';
            return view('portal.wishlist.window')->with([
               'message' => $message,
                'local_flash' => 0,
                'title' => 'WishList Window',
        ]);
    }
	
    public  function wishListView($listID)
    {
        $wishList = WishList::find(WebTool::dec($listID)) ?? null;

        if($wishList){
            if(!$message = session('message'))
                $message = '';

            return view('portal.wishlist.wishlist-confirmation')->with([
                'message' => $message,
                'title' => 'WishList Window',
                'user' => auth()->user(),
                'company' => $wishList->company(),
                'type' => $wishList->type,
                'wishilist' => $wishList,
            ]);
        }
    }

    public  function postWishList()
    {
        $wishList = WishList::addWishList(auth()->user()->profile()->id, auth()->user()->type);
        session(['wishList' => $wishList]);
        return redirect('/pip/wishilist-create/confirmation');
    }

    public  function createWishListWindow()
    {
        if(!$message = session('message'))
            $message = '';

        if(!$local_flash = session('local_flash'))
            $local_flash = 0;

        return view('portal.wishlist.confirm')->with([
            'message' => $message,
            'local_flash' => $local_flash,
            'user' => auth()->user(),
            'profile' => auth()->user()->profile(),
            'title' => 'Wishlist Window'
        ]);
    }

    public function confirmWL(){
        if(!$message = session('message'))
            $message = '';
        
        return view('portal.wishlist.confirm')->with([
            'message' => $message,
            'local_flash' => 0,
            'title' => 'WishList Confirmation',
            'wishList' => session('wishList')
        ]);
    }
}
