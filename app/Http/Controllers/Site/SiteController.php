<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct(){
    	// $this->middleware('auth');
    }

    public function blog($id){
    	return "Você está na página {$id}";
    }


}
