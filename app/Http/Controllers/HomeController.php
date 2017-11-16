<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class HomeController extends Controller
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

    public function getFile()
    {
        return view('cloudder');
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('image_file')) {
            Cloudder::upload($request->file('image_file'));
            $result = Cloudder::getResult();
            if ($result){
                return back()->with('success', 'Image uploaded successfully!!')->with('image', $result['url']);
            }
        }
    }
}
