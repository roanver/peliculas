<x-app-layout>


<br>
<br>



    <form method="POST">
         {{ csrf_field() }}
        <input type="text" id="buscador" name="buscador" value="Buscador"><br>
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
        <form method="POST">
        {{ csrf_field() }}
          <input type="hidden" name="idPeli" value="{!! $lista ->id!!}">
          <x-primary-button>Comentar</x-primary-button>
        </form>
    </td>
  </tr>
@endforeach





  
</table>


</x-app-layout>