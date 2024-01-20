<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>
    <br>


    <div class="mx-auto" style="width: 400px;">
        <form action="{{route('comentarios')}} "method="POST">
        {{ csrf_field()}}

        <div class="form-floating">
            <textarea name="comentario" class="form-control" style="width: 500px" placeholder="Leave a comment here"></textarea>
        </div>
        <label>Puntaje</label>
     
        <input class="form"type="number" name="puntaje" min="1" max="5" style="height: 10px;px;"><br>

        <x-primary-button type="submit" class="mt-3">Comentar</x-primary-button>

       
         
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
