<?php

namespace App\Http\Controllers;

use App\House;
use App\Address;
use App\Image;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $new_houses = House::with('address','image')->take(3)->latest()->get();
        $houses = House::with('address','image')->latest()->paginate(6);

       return view('index',compact('new_houses','houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function fetchCep(Request $request)
    { 
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */

    public function show(House $casa)
    {   
        $house = House::with('address','image')->find($casa)->first();
        return view('house',compact('house'));
    }
    public function search(Request $request)
    {    
        
        $search_args =array(
           'rooms' => ['>=','(int)$request->rooms'],
           'bathrooms' => ['>=','(int)$request->bathrooms'],
           'price' => ['<=','(double)str_replace(",", ".", str_replace(["R$","."], "", $request->price))'],
           'garage' => ['=','(int)$request->garage'],
           'recreation' => ['=','(int)$request->recreation'],

        );

        $query_args = [];
         
        foreach ($search_args as $key => $value) {
            if($request->has($key) && $request->$key!=""){
                array_push($query_args,[$key,$value[0],eval('return '.$value[1].';')]);
            }
        }
    

        $houses = House::with('image','address')->whereHas('address', function ($query) {
            return $query->where('bairro', 'LIKE', '%'.request()->bairro.'%');
        })->where($query_args)->latest()->paginate(6);
        
        if($houses->isEmpty()){

            return view('index',compact('houses'))->with('error','Nenhum resultado encontrado')->render();

        }

        return view('index',compact('houses'))->render();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        //
    }
}
