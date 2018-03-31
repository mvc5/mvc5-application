<div class="alert alert-{{ $msg['type'] }} alert-dismissible" role="alert">
    <strong>{{ $msg['message'] }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @isset($title)
        <pre>Scoped</pre>
    @endIsset

    @if($this instanceof About\More\Messages\ViewModel)
        {{ $this->more() }}
    @endif

</div>
