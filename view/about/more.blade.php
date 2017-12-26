@import(arc5)
@extends(['layout', 'template' => '/about/more/layout'])
@assign('title', 'About More')
@shared('request')

@section('main')
    <div class="jumbotron">
        <h1><a href="{{ url('explore/more') }}">More</a></h1>
        <p class="lead">

            {!! '<h4>Demo Application.</h6>' !!}

        </p>
        <pre>{{ __FILE__ }}</pre>
        <p>
            <a style="margin-left:10px;" class="btn btn-primary btn-lg" href="{{ url('explore') }}" role="button">Explore</a>
        </p>
    </div>

    @verbatim
        <div class="alert alert-info">
            Hello, {{ name }}.
        </div>
    @endverbatim

    @for ($i = 0; $i < 3; $i++)
        @isset($request)
            <pre>The current value is {{ $i }}</pre>
        @endisset
    @endfor

    @assign($i, 0)

    @while($i < 3)
        @switch($i)
            @case(1)
            <pre>First case...</pre>
            @break

            @case(2)
            <pre>Second case...</pre>
            @break

            @default
            <pre>Default case...</pre>
        @endswitch
        @assign($i, ++$i)
    @endwhile

    @empty($records)
        <pre>// $records is "empty"...</pre>
    @endempty

    @unless(false)
        <pre>You are not signed in.</pre>
    @endunless

    @forelse ([] as $v)
    {{-- @forelse ([['key' => 'foobar']] as $v) --}}
        <pre>{{ $v['key'] }}</pre>
    @empty
        <pre>No users</pre>
    @endforelse

@endsection

@section('content')
    @parent
    <pre>@json(['a' => 'b', 'c' => 'd'])</pre>

    @component('about/more/alert', ['foo' => 'bar'])
        @slot('title')
            Forbidden
        @endslot

        @{{ You are not allowed to access this resource! }}
    @endcomponent
@endsection

@assign('end', ['Hello', '>>> Hello World'])

@foreach($end as $block)
    @foreach(['!', '!!'] as $n)
        @if($loop->first)
            @continue
        @elseif($loop->parent->last)
            @push('end')
                <pre>{{ $block . $n }}</pre>
            @endpush
        @else($loop->last)
            @push('end')
                <pre>{{ '>>> ' . $block . $n }}</pre>
            @endpush
        @endif
    @endforeach
@endforeach

@push('end')
    <pre>
    @foreach(['foo', 'foobar', 'baz'] as $n)
        @continue($loop->first)

        {{ $n }}

        @break($loop->index == 1)
    @endforeach
    </pre>

    @php

        var_dump([
            'name'   => $request['name'],
            'uri'    => $request['uri'],
            'params' => $request['params'],
        ]);

    @endphp

    <pre>
        @include('about/test')
        @include('about/test', ['test' => 'foobar'])
    </pre>
@endpush
