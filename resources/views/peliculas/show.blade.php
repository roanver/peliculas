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
</div>

   

    <br>
    <br>


    <div class="mx-auto" style="width: 400px;">

        <form action="{{route('comentarios.index')}} "method="POST">
            {{ csrf_field()}}

            <div class="form-floating">
            <input type="hidden" name="idPelicula" value="{{$pelicula->id}}">

                <textarea name="comentario" class="form-control" style="width: 500px" placeholder="Leave a comment here"></textarea>
            </div>

            @error('comentario')
                <p style="color: red">{{$message}}</p>
            @enderror
            <label>Puntaje</label>
        
            <input class="form"type="number" name="puntaje" min="1" max="5" style="height: 10px;"><br>
            @error('puntaje')
                <p style="color: red">{{$message}}</p>
            @enderror

            <x-primary-button type="submit" class="mt-3">Comentar</x-primary-button>  
        </form>
    </div>

    <div class="container">
    <h1>Comentarios</h1>

        <ul class="list-group">
            @foreach ($pelicula->rankings as $comentario)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $comentario->user->name }}</span>
                        <span>{{ $comentario->comentario }}</span>
                        <span>{{ $comentario->puntaje }}</span>
                    </div>
                    <p>{{ $comentario->contenido }}</p>
                </li>
            @endforeach
        </ul>
   
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
