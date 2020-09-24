<div style="text-align: center">
    @foreach ($skoly as $skola)
        {{$skola->nazev}}
        <br>
    @endforeach

    {{ $skoly->links() }}
</div>