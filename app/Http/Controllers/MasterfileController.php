<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Guest;
use Excel;
use DB;
use Session;

class MasterfileController extends Controller
{
    public function index()
    {
        return view('masterfile.index');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('file')){
            $file_path = $request->file('file')->move(storage_path().'/uploads/', $request->file('file')->getClientOriginalName());

            $data = Excel::load($file_path ,function($reader){})->get();

            if(!empty($data) && $data->count())
            {
                Guest::truncate();

                DB::beginTransaction();
          			try {
          			     $data->each(function($row){
            						$guest = new Guest;
            						$guest->first_name = $row->first_name;
            						$guest->last_name = $row->last_name;
            						$guest->company = $row->company;
            						$guest->email = $row->email;
            						$guest->contact_number	 = $row->contact_number;
                        $guest->table_number = $row->table_number;
                        $guest->note = $row->note;
            						$guest->save();

          			});
          			DB::commit();
          		} catch (\Exception $e) {
                //dd($e);
          			DB::rollback();
                Session::flash('flash_message', 'Error on file migration');
          		}
              Session::flash('flash_message', 'File successfully migrated');
            }else{
                  Session::flash('flash_message', 'Error on file migration');
            }
        }else
        {
            Session::flash('flash_message', 'Error on file migration');
        }

      return redirect()->route("masterfile.index");
    }
}
