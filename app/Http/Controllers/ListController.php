<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    function index(){
    	$items = Item::all();
    	return view('list', compact('items'));
    }

    public function create(Request $request){

    	$item = new Item;
    	$item->item = $request->text;
    	$item->save();

    	return $request->text;
    }

    public function delete(Request $request){
    	Item::where('id', $request->id)->delete();
    	return $request->all();
    }

    public function update(Request $request){
    	$item = Item::find($request->id);
    	$item->item = $request->valor;
    	$item->save();
    	return $request->all();
    }

    public function procurar(Request $request){
    	// $item = Item::find($request->id);
    	// $item->item = $request->valor;
    	// $item->save();
    	$term = $request->term;
    	
    	// return $availableTags = [
			  //     "ActionScript",
			  //     "AppleScript",
			  //     "Asp",
			  //     "BASIC",
			  //     "C",
			  //     "C++",
			  //     "Clojure",
			  //     "COBOL",
			  //     "ColdFusion",
			  //     "Erlang",
			  //     "Fortran",
			  //     "Groovy",
			  //     "Haskell",
			  //     "Java",
			  //     "JavaScript",
			  //     "Lisp",
			  //     "Perl",
			  //     "PHP",
			  //     "Python",
			  //     "Ruby",
			  //     "Scala",
			  //     "Scheme"
			  //   ];
    }






}
