@isset($test)
    {{ $test }}
@else
    @{{ test }}
@endif
@isset($title)
    <h4><b>Scoped</b></h4>
@endIsset
