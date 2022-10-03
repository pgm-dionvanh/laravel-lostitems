<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
 
class MainController extends Controller
{
    /**
     * Show lost items.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $lostItems = DB::select('select * from lostItems');

        return view('main', ['lostItems' => $lostItems]);
    }

    /**
     * Show lost items info.
     *
     * @return \Illuminate\View\View
     */
    public function info($id)
    {
        $lostItem = DB::selectOne('select * from lostItems where id = ?', [$id]);

        return view('lostItem', ['lostItem' => $lostItem]);
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