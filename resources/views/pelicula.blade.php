<x-app-layout>
@push('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@endpush


<br>
<br>





    <form action="{{route('pelicula')}}" method="GET">
         {{ csrf_field() }}
        <input type="text" id="buscador" value="{{$busqueda}}"name="buscador">{{old
          ('buscador')}}<br>
        <x-primary-button type="submit" value="Buscar">Buscar</x-primary-buttonbutton>
      
    </form>


    


    <br>
    <br>
    <br>

  
    @foreach ($listas as $lista)

      <div class="cards">
        <div class="img">
          <img src="https://th.bing.com/th/id/R.2cf292c20c7d2121c2853cdff87cef07?rik=JHHY72L351KNGg&pid=ImgRaw&r=0" class="card-img-top" alt="...">
        </div>  
        <div class="card-body">
          <h5>{!! $lista->nombre !!}</h5>
          <p>Director: {!! $lista->director !!}</p>
          <p>Año: {!! $lista->año !!}</p>
        </div>
        <div class="boton">
          <a class="btn btn-dark" href="{{route('peliculas.show', $lista->id)}}">Comentar</a>
        </div>
      </div>

  
    @endforeach



</x-app-layout>