<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $libros = Libro::with('user')->orderBy('id' , 'desc')->paginate(10);
        return view('libro.index' , compact('libros'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autores = User::OrderBy('name')->pluck('name' , 'id'); //Lo que hago es guardarme en una variable todos los nombres de los autores ordenados por nombre
        // dd($autores);
        return view('libro.create' , compact('autores')); //Cargo autores en la vista
    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $request->validate([
            'titulo' => ['required' ,'string'],
            'resumen'=> ['required' ,'string'],
            'pvp'=> ['required' , 'numeric' , 'min:1' , 'max:9999.99'],
            'user_id'=> ['required'  , 'exists:users,id'],
            'stock' => ['required', 'numeric' , 'min:0'],

        ]);


        Libro::create($request->all());



        return redirect()->route('libros.index')->with("mensaje" , 'Libro Creado');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //

        $autores = User::OrderBy('name')->pluck('name'); //Lo que hago es guardarme en una variable todos los nombres de los autores ordenados por nombre
        return view('libro.edit' , compact('libro' , 'autores'));



      



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //


        $request->validate([
            'titulo' => ['required' ,'string'],
            'resumen'=> ['required' ,'string'],
            'pvp'=> ['required' , 'numeric' , 'min:1' , 'max:9999.99'],
            'user_id'=> ['required'  , 'exists:users,id'],
            'stock' => ['required', 'numeric' , 'min:0'],

        ]);


        //Las validaciones han ido bien

        $libro->update($request->all());


        



        return redirect()->route('libros.index')->with("mensaje" , 'Libro Actualizado');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //

        $libro->delete();

        return redirect()->route('libros.index')->with('mensaje' , "Libro Borrado");



    }
}
