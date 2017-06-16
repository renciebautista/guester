<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Guest;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->id;
        if (is_null($search))
        {
           return view('guest.index');
        }
        else
        {
            $guests = Guest::where('first_name','LIKE',"%{$search}%")
                ->orWhere('last_name','LIKE',"%{$search}%")
                ->orWhere('company','LIKE',"%{$search}%")
                ->orWhere('email','LIKE',"%{$search}%")
                ->get();
            return view('guest.indexajax', compact('guests'));
        }
    }

    public function store(Request $request)
    {
        if($request->ajax()){
          $guest = Guest::find($request->id);
          $guest->arrived = true;
          $guest->update();
          return response()->json($guest);
        }

    }
}
