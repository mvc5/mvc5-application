@extends(['layout', 'template' => '/about/more/layout'])
@import(arc5)
@assign('title', 'About More')
@shared('request')

@section('main')
    <div class="jumbotron">
        <h1><a href="{{ url('explore/more') }}">More</a></h1>
        @csrf
        <!--<input type="hidden" name="csrf_token" value="{{ csrf_token() }}">-->
        <p class="lead">

            {!! '<h4>' !!}@call('About\Controller.message', ['.']) {!! '</h4>' !!}

        </p>
        <pre>{{ __FILE__ }}</pre>
        <p>
            <a class="btn btn-primary btn-lg" href="{{ url('explore') }}" role="button">Explore</a>
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

    @assign($records, 'foobar')
    @unset($records)

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

    @component('/about/more/alert', ['foo' => 'bar'])
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
    <pre>@foreach(['foo', 'foobar', 'baz'] as $n)
        @continue($loop->first)

        {{ $n }}

        @break($loop->index == 1)
    @endforeach</pre>

    @plugin($foo, Mvc5\Config::class, ['foo' => 'bar', 'baz' => 'bat'])

    @php

        var_dump([
            'name'   => $request['name'],
            'uri'    => $request['uri'],
            'params' => $request['params'],
        ]);

        var_dump($foo)

    @endphp

    <pre>
        @include('/about/test')
        @render('/about/test', ['test' => 'foobar'])
    </pre>
@endpush
