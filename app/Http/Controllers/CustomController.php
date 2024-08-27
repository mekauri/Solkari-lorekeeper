<?php


namespace App\Http\Controllers;


use Auth;
use db;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SitePage;


class CustomController extends Controller
{
    public function getLore()
    {
    return view('custom.lore');
    }

    public function getWelcome()
    {
    return view('custom.Welcome');
    }

    public function getmyo()
    {
    return view('custom.myo');
    }

    public function getfaq()
    {
    return view('custom.faq');
    }


    /*Additional Custom pages ABOVE here*/

}

