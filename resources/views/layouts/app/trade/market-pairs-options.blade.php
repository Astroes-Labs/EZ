@foreach (array_slice($charts, 0, 16) as $key => $chart)
    <option value='["{{ $chart['pair'] }}", "{{ $key }}"]'>
        {{ $chart['name'] }}
    </option>
@endforeach
