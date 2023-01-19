@extends('plantilla.uno')

@section('titulo')
    Listado de Libros
@endsection


@section('cabecera')
    Listado de Libros
@endsection



@section('contenido')
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <a href="{{route('libros.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-create">Crear Libro </i>
        </a>
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Titulo
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Autor
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Resumen
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  PvP
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Stock
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Acciones
                </th>
              
              </tr>
            </thead>
            <tbody>

                @foreach ($libros as $item )
                <tr class="border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item->id}}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$item->titulo}}
                      </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{$item->user->name}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{$item->resumen}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{$item->pvp}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$item->stock}}
                    </td>

                      
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">


                       <form action="{{route('libros.destroy' , $item)}}" method="post">
                        
                        @csrf
                        @method("DELETE")

                        <a href="{{route('libros.edit' , $item)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-edit">Editar </i>
                        </a>

                        <button type="submit" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-trash">Borrar </i>
                        </button>
                    
                    
                        </form>


                    </td>


                     


                  </tr>

                @endforeach

              
             
            </tbody>
          </table>
          <div class="mt-2">
            {{$libros->links()}}
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection



@section('js')

@if (session('mensaje'))
<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('mensaje')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>

@endif
    
@endsection