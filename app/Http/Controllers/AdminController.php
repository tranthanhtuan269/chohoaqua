<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function gioithieu()
    {
    	if(\Auth::id() == 1){
	    	$gioithieu = \DB::table('sites')
	                    ->where('sites.name', '=', 'gioi_thieu')
	                    ->first();
	        return view('sites.gioithieu')->withsite($gioithieu);
        }
        return view('home');
    }

    public function updateGioithieu(Request $request){
    	$gioithieu = Site::find(1);
    	$gioithieu->detail = $request->detail;
    	$gioithieu->save();
    	return redirect('/');
    }

    public function listtintuc()
    {
        return view('home');
    }

    public function phanhoi()
    {
        return view('home');
    }

    public function lienhe()
    {
        return view('home');
    }

    public function category()
    {
        return view('home');
    }

    public function product()
    {
        return view('home');
    }

    public function postImage(\Illuminate\Support\Facades\Request $request){

        $file = $request::file('file');

        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        $picture = date('His').$filename;

        $destinationPath = base_path() . '/public/images';

        $file->move($destinationPath, $picture);

        echo url('/').'/images/'.$picture;

    }
}
