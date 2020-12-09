<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index(Request $request){
        // $items = DB::table('people')->orderBy('age', 'asc')->simplePaginate();
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request){
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request){
        // $item = Person::find($request->input);
        // $param = ['input' => $request->input, 'item' => $item];
        // return view('person.find', $param);
        // $item = Person::NameEqual($request->input)->first();
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }
}
