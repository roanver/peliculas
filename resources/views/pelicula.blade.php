<x-app-layout>


<br>
<br>





    <form method="POST">
         {{ csrf_field() }}
        <input type="text" id="buscador" name="buscador"><br>
        <x-primary-button type="submit" value="Buscar">Buscar</x-primary-buttonbutton>
      
    </form>

    <br>
    <br>
    <br>

    <table>
  <tr>
    <th>Nombre</th>
    <th>Director</th>
    <th>Año</th>
  </tr>
  <tr>
  

  @foreach ($listas as $lista)

  <tr>
    <td>{!! $lista->nombre !!}</td>
    <td>{!! $lista->director !!}</td>
    <td>{!! $lista->año !!}</td>
    <td>
      <a class="btn btn-dark" href="{{route('peliculas.show', $lista->id)}}">Comentar</a>
    </td>
  </tr>
@endforeach





  
</table>


</x-app-layout>