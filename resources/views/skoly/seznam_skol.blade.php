@extends('layouts.app')

@section('content')
@livewire('search')
  <table class="table uppercase tracking-wide text-sm text-indigo-600 font-bold">
    <thead>
      <tr>
        <th scope="col">Název</th>
        <th scope="col">Město</th>
        <th scope="col">Lokace</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($skoly as $skola)
            <tr>
                <td>{{$skola['nazev']}}</td>
                <td>{{$skola->mestoNazev['nazev']}}</td>
                <td>TODO</td>
            </tr>
        @endforeach
    </tbody>
  </table>
  
{{ $skoly->links() }}
        
@endsection