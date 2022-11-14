<?php
 
namespace App\Http\Controllers;

use App\Models\Claimed_items;
use App\Models\Lostitems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class MainController extends Controller
{

    /**
     * Show lost items.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $claimedItems = Claimed_items::all()->where('user_id', Auth::user()->id);
        return view('claimedItems', ['claimedItems' => $claimedItems]);
    }

    /**
     * Show lost items.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $lostItems = Lostitems::all()->where('status', 0);

        return view('main', ['lostItems' => $lostItems]);
    }

    /**
     * Show lost items info.
     *
     * @return \Illuminate\View\View
     */
    public function info($id)
    {
        if (Auth::user()) {   // Check is user logged in
            $lostItem = DB::selectOne('select * from lostItems where id = ?', [$id]);
            return view('lostItem', ['lostItem' => $lostItem]);
        }else{
            return redirect('/login');
        }

    }

    /**
     * Claim item
     *
     */
    public function claim($id)
    {
        $lostItem = Lostitems::find($id);
        $lostItem->status = "1";

        $lostItem->save();

        $claimed_item = new Claimed_items();
        $claimed_item->lostitems_id = $lostItem->id;
        $claimed_item->user_id = Auth::user()->id;
        $claimed_item->save();
        
        return redirect('/');
    }

    /**
     * Show lost items info.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Show lost items info.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('register');
    }
}