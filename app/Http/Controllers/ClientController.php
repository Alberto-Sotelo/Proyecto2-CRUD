<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5); //Muestra y pagina a los clientes obteniendo la información directamente desde la base de datos
        return view('client.index')
                ->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Reglas de validación para el formulario
        $request->validate([
            'name' => 'required|max:30',
            'due' => 'required|gte:1'
        
        ]);

        $client = Client::create($request->only('name','due','comments'));

            Session::flash('mensaje', 'Registro exitoso!'); //Alerta para el registro exitoso
            return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.form')
            ->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //Reglas de validación para el formulario
        $request->validate([
            'name' => 'required|max:30',
            'due' => 'required|gte:1'
        
        ]);

        $client->name = $request['name'];
        $client->due = $request['due'];
        $client->comments = $request['comments'];
        $client->save();

            Session::flash('mensaje', 'Registro editado con exito!'); //Alerta para la edicion del registro
            return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Session::flash('mensaje', 'Registro eliminado con exito!'); //Alerta para la eliminación de un registro
           
        return redirect()->route('client.index');
    }
}
