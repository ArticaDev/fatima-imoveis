<?php

namespace App\Http\Controllers;

use App\House;
use App\Address;
use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    
        $houses = House::with('address','image')->latest()->paginate(6);
        return view('edit',compact('houses'));
    }

    public function create(){
        return view('home');
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'uploadFile' => 'required'
        ]);

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

        return redirect('/admin')->with('success', 'Casa registrada');

    }


    public function update(Request $request, $casa)
    {

        $house = House::find($casa);
        $house->title = $request->input('title');
        $house->description = $request->input('description');
        $house->bathrooms = (int)$request->input('bathrooms');
        $house->rooms = (int)$request->input('rooms');
        $house->garage = (int)$request->input('garage');
        $house->recreation = (int)$request->input('recreation');
        $house->price = (double)str_replace(',', '.', str_replace(['R$','.'], '', $request->input('price')));
        $house->update();

        $address = Address::find($house->address->first()->id);
        $address->cep = $request->input('cep');
        $address->logradouro = $request->input('logradouro');
        $address->bairro =$request->input('bairro');
        $address->localidade = $request->input('localidade');
        $address->uf = $request->input('uf');         
        $address->update();


        return redirect('/admin')->with('success', 'Casa atualizada com sucesso');

    }

    public function destroy($casa)
    {

        $house = House::find($casa);
        $house->delete();
        return redirect('/admin')->with('success', 'Casa deletada com sucesso');

    }
    public function edit($casa)
    {   
        $house = House::with('address','image')->find($casa);
        return view('home',compact('house'));
    }


}
