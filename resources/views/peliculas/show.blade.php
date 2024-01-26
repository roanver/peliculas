<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container mt-4">
        <div class="card">
            <!--<img src="imagen_de_la_pelicula.jpg" class="card-img-top" alt="Imagen de la Película">-->
            <div class="card-body">
                <h5 class="card-title">{{$pelicula ->nombre}}</h5>
                <p class="card-text">Director: {{$pelicula -> director}}</p>
                <p class="card-text">Año: {{$pelicula ->año}}</p>
                <p class="card-text">Género: Acción, Aventura</p>
            </div>
        </div>
        <br>

        <form id="puntuacionForm" action="{{ route('comentarios.puntaje', $pelicula->id )}}" method="post">
            {{ csrf_field() }}
        <fieldset class="rating">
            <button type="submit"  name="rating" value="1" class="bi bi-star-fill {{ $punto >= 1 ? 'stars' : 'star' }}"></button>
            <button type="submit"  name="rating" value="2"  class="bi bi-star-fill {{ $punto >= 2 ? 'stars' : 'star' }}"></button>
            <button type="submit"  name="rating" value="3"  class="bi bi-star-fill {{ $punto >= 3 ? 'stars' : 'star' }}"></button>
            <button type="submit"  name="rating" value="4" class="bi bi-star-fill {{ $punto >= 4 ? 'stars' : 'star' }}"></button>
            <button type="submit"  name="rating" value="5" class="bi bi-star-fill {{ $punto >= 5 ? 'stars' : 'star' }}"></button> 
        </fieldset>
 
        </form>
        <p>Promedio: {{$pelicula->puntaje}}</p>
        
        
        <!-- <button type="submit" id="star5" name="rating" value="1" class="bi bi-star-fill star"></button>
        <button type="submit" id="star4" name="rating" value="2"  class="bi bi-star-fill star"></button>
        <button type="submit" id="star3" name="rating" value="3"  class="bi bi-star-fill star"></button>
        <button type="submit" id="star2" name="rating" value="4" class="bi bi-star-fill star"></button>
        <button type="submit" id="star1" name="rating" value="5" class="bi bi-star-fill star"></button> -->
    

    <!-- <div class="puntos">
        <i class="bi bi-star-fill star"></i>
        <i class="bi bi-star-fill star"></i>
        <i class="bi bi-star-fill star"></i>
        <i class="bi bi-star-fill star"></i>
        <i class="bi bi-star-fill star"></i>
    </div> -->

    <script src="/js/app.js"></script>
    <div class="mx-auto" style="width: 400px;">

        <form action="{{route('comentarios.create')}} "method="post">
            {{ csrf_field()}}

            <div class="form-floating">
                <input type="hidden" name="idPelicula" value="{{$pelicula->id}}">
                <textarea name="comentario" class="form-control" style="width: 500px" >{{old('comentario') }}</textarea>
            </div>
            @error('comentario')
                <p style="color: red">{{$message}}</p>
            @enderror

            <x-primary-button type="submit" class="mt-3">Comentar</x-primary-button>  
        </form>
    </div>

    <div class="container">
    <h1>Comentarios</h1>

        <ul class="list-group">
            @foreach ($pelicula->comentario as $comentario)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $comentario->user->name }}</span>
                        <span>{{ $comentario->comentario }}</span>
                    </div>
                    <p>{{ $comentario->contenido }}</p>
                </li>
            @endforeach
        </ul>
   
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
