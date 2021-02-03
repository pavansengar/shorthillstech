<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use THelpers;
use Constant;
use Alert;

class EventController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     * @author Pavan Sengar
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event = Event::orderBy('id','desc')->get();
        $list['data'] = $event;
        return view('welcome',["result"=>$list]);
    }
    /**
     * Store a newly created resource in storage.
     * @author Pavan Sengar
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator=validator::make($request->all(),[
                'title'=>'required',
                'description'=>'required'
            ], [
                'title.required' => 'Title is required',
                'description.required' => 'Description is required'
            ]);

            if($validator->fails()){
                Alert::error('Error!',$validator->messages()->first());
                return redirect()->back();
            }else{
                $title = Crypt::encryptString($request->title);
                $description = Crypt::encryptString($request->description);
                Event::create($request->all());
                Alert::success('Success','Created successfully');
                return redirect()->back();
            }
        }catch (Exception $e){
            Alert::error('Error!');
            return redirect()->back();
        }
    }
}
