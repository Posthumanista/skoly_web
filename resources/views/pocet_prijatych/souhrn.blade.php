@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Škola</th>
        <th scope="col">Pocet prijatych</th>
        <th scope="col">Obor</th>
        <th scope="col">Rok</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pocet_prijatych as $p)
            <tr>
                <td>{{$p->skolaNazev['nazev']}}</td>
                <td>{{$p->pocet}}</td>
                <td>{{$p->oborNazev['nazev']}}</td>
                <td>{{$p->rok}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
  
{{ $pocet_prijatych->links() }}
        
@endsection