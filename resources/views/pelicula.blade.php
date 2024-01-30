<x-app-layout>
@push('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@endpush


<br>
<br>




<div class="container-xxl">

      <div class="buscador-c">
        <form action="{{route('pelicula')}}" method="GET">
          {{ csrf_field() }}
          <input type="text" class="bu" id="buscador" value="{{$busqueda}}"name="buscador">
          <button class="btn btn-outline-dark" value="" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg></button>
        </form>
      </div>
  
    @foreach ($listas as $lista)

      <div class="card mb-3" style="max-width: 650px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://th.bing.com/th/id/R.2cf292c20c7d2121c2853cdff87cef07?rik=JHHY72L351KNGg&pid=ImgRaw&r=0" class="img-fluid rounded-start" alt="...">
          </div>
        <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title">{!! $lista->nombre !!}</h5>
          <p class="card-text">Director: {!! $lista->director !!}</p>
          <p class="card-text">Año: {!! $lista->año !!}</small></p>
          <p class="card-text">Puntaje: {!! $lista->puntaje !!}</p>
          <a class="btn btn-dark" href="{{route('peliculas.show', $lista->id)}}">Comentar</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div>
  </div>
  </div>
  



</x-app-layout>