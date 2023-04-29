<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderuse;

class order extends Controller
{
    public  function index(){
        $userid = auth()->id();
    $order= orderuse::where('user_id',$userid)->groupby('orderid')->get();
    }
}
