@extends('plantilla.uno')

@section('titulo')
    Crear Libro
@endsection
@section('cabecera')
    Crear Libro
@endsection
@section('contenido')

<div class="w-3/4 p-4 rounded-lg shadow-lg bg-gray-100 mx-auto">


<x-form action="{{route('libros.store')}}">
    <x-form-input name="titulo" label="Titulo" />
    <x-form-input name="resumen" label="Resumen" />
    <x-form-input type="number" name="pvp" label="PvP" step="0.01" />
    <x-form-select name="user_id" label="Autor" :options="$autores" />
    <x-form-input type="number" name="stock" label="Stock" step="1" />


    <div  class="flex flex-row-reverse mt-2">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="">
            <i class="fas fa-save"></i>Guardar
        </button>
        <a href="{{route('libros.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-backward"></i>Volver
        </a>
    </div>

</x-form>

</div>


@endsection
