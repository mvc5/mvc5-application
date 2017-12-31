<div class="alert alert-{{ $msg['type'] }}" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{{ $msg['message'] }}</strong>
    @isset($title)
        <pre>Scoped</pre>
    @endIsset

    @if($this instanceof About\More\Messages\ViewModel)
        {{ $this->more() }}
    @endif

</div>
