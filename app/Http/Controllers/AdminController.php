<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
 
class AdminController extends Controller
{
    /**
     * Show lost items.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function show()
    {
        $lostItems = DB::table('lostItems')->count();

        return view('admin/dashboard', [ 'lostItemsCount' => $lostItems]);
    }

}