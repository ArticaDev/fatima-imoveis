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
        // $houses = House::with('address','image')->latest()->where('updated_at', '<', $new_houses->last()->updated_at)->paginate(6);
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
    public function store(Request $request)
    {

        $house = new House;
        $house->title = $request->input('title');
        $house->description = $request->input('description');
        $house->bathrooms = (int)$request->input('bathrooms');
        $house->rooms = (int)$request->input('rooms');
        $house->garage = (int)$request->input('garage');
        $house->recreation = (int)$request->input('recreation');
        $house->price = (double)str_replace(',', '.', str_replace(['R$','.'], '', $request->input('price')));
        $house->save();

        $address = new Address;
        $address->cep = $request->input('cep');
        $address->logradouro = $request->input('logradouro');
        $address->bairro =$request->input('bairro');
        $address->localidade = $request->input('localidade');
        $address->uf = $request->input('uf');         
        $house->address()->save($address);

        $new_image = null;
        if($request->hasFile('uploadFile'))
        {
            // $names = [];
            foreach($request->file('uploadFile') as $image)
            {
                $path = $image->store('images');
                $new_image = new Image;
                $new_image->filename = basename($path);
                $house->image()->save($new_image);
                // array_push($names, basename($path));          

            }
        }

        return redirect('/home')->with('success', 'Post Created');

    }
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
