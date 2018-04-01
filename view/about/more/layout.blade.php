@import(arc5)
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="/favicon.ico"> -->

    <title>{{ $title ?? 'Mvc5 Playground' }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <style type="text/css">

        .jumbotron {
            background-color: #f5f5f5;
        }

        .btn-primary {
            background-color: #33669a;
            border-color: #33669a;
        }

        .btn-primary:hover {
            background-color: #1d4a77;
            border-color: #2b77c4;
        }

        .btn-primary.focus, .btn-primary:focus {
            box-shadow: 0 0 0 .2rem #2b77c4;
        }

        .btn-primary.active, .btn-primary:active {
            box-shadow: 0 0 0 .2rem #2b77c4 !important;
            background-color: #1d4a77 !important;
        }

        .bg-purple {
            background-color: #33669b;
        }

        a {
            color: #33669b;
        }

        a:hover {
            color:#9b6833;
        }

        pre {
            display: block;
            word-break: break-all;
            word-wrap: break-word;
            border: 1px solid #e1e1e1;
            overflow: auto;
            padding:0.6rem;
            background-color: #fafafa;
            border-radius: 4px;
        }

        pre code {
            font-size: 90%;
            line-height: 1.42857143;
            color: #646464;
        }

        div.language-php {
            margin-bottom: 1rem;
        }

        h2 {
            margin-top:2.25rem;
        }

        h2:first-child {
            margin-top:0;
        }

        h3 {
            color:#9b6833;
            margin-top:1.75rem;
        }

        @media (min-width: 576px) {
            #navbar {
                position:sticky;
                top: 0;
                z-index: 9999;
                min-height: 4rem;
            }

            #navbar-overview {
                max-height:480px;
                overflow-y:auto;
                overflow-x:hidden;
            }

            #navbar-overview a:focus {
                color:#fff !important;
                background-color:#33669b;
            }

            h2::before, h3::before {
                display: block;
                height: 6rem;
                margin-top: -6rem;
                visibility: hidden;
                content: "";
            }
        }

        @media (max-width: 575.98px) {
            #page-header h1 {
                font-size: 1.25rem;
            }

            #page-header h1 img {
                width: 60px;
                height: 60px;
            }
        }

        @media (min-width: 576px) {
            #page-header h1 {
                font-size: 2.5rem;
            }

            #page-header h1 img {
                width:80px;
                height:80px;
            }
        }

        @media (max-width: 767.98px) {
            section.container main.row aside {
                display: none;
            }
        }

        @media (min-width: 768px) {
            #page-header h1 {
                font-size:3.5rem;
            }

            #page-header h1 img {
                width:100px;
                height:100px;
            }
        }

    </style>
</head>
<body>
<nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-purple">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}"><img witdh="45" height="45" src="data:image/png;base64,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"> Mvc5 Playground</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @assign($path, $this->shared('request')['path'])
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="btn-group d-block">
                        <a role="button" class="nav-link d-inline-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-book"></span>
                        </a>
                        <a href="{{ url(['app', 'controller' => 'overview']) }}" role="button"
                           class="{{ '/overview' == $path ? ' active' : '' }} pl-0 nav-link d-inline-block">Overview</a>
                        <div id="navbar-overview" class="dropdown-menu">
                            <a class="dropdown-item text-nowrap" href="/overview#summary">Summary</a>
                            <a class="dropdown-item text-nowrap" href="/overview#web-application">Web Application</a>
                            <a class="dropdown-item text-nowrap" href="/overview#console-application">Console Application</a>
                            <a class="dropdown-item text-nowrap" href="/overview#environment-aware">Environment Aware</a>
                            <a class="dropdown-item text-nowrap" href="/overview#models-and-arrayaccess">Models and ArrayAccess</a>
                            <a class="dropdown-item text-nowrap" href="/overview#routes">Routes</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#automatic-routes">Automatic Routes</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#url-generator">Url Generator</a>
                            <a class="dropdown-item text-nowrap" href="/overview#middleware">Middleware</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#http-middleware">HTTP Middleware</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#pipelines">Pipelines</a>
                            <a class="dropdown-item text-nowrap" href="/overview#view-models">View Models</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#rendering-view-models">Rendering View Models</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#view-engine">View Engine</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#template-layouts">Template Layouts</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#view-plugins">View Plugins</a>
                            <a class="dropdown-item text-nowrap" href="/overview#events">Events</a>
                            <a class="dropdown-item text-nowrap pl-5" href="/overview#event-configuration">Event Configuration</a>
                            <a class="dropdown-item text-nowrap" href="/overview#dependency-injection">Dependency Injection</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#service-container">Service Container</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#autowiring">Autowiring</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#plugins">Plugins</a>
                                <a class="dropdown-item text-nowrap pl-5" href="/overview#service-providers">Service Providers</a>
                            <a class="dropdown-item text-nowrap" href="/overview#named-arguments">Named Arguments</a>
                        </div>
                    </div>
                </li>
                @assign($user, $this->plugin('user'))
                @if($user->authenticated())
                    <li class="nav-item{{ '/dashboard' == substr($path, 0, 10) ? ' active' : '' }}"><a class="nav-link" href="{{ $this->url(['dashboard', 'user' => $user->username()]) }}">Dashboard</a></li>
                    <li class="nav-item{{ '/explore' == substr($path, 0, 8) ? ' active' : '' }}"><a class="nav-link" href="{{ $this->url('explore') }}">Explore</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ $this->url(['app', 'controller' => 'logout']) }}">Logout</a></li>
                @else
                    <li class="nav-item{{ '/login' == $path ? ' active' : '' }}"><a class="nav-link" href="{{ $this->url(['app', 'controller' => 'login']) }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<main role="main" class="container mt-2">
    @renderWhen($msg = $this->{'session\messages'}(), '/about/more/messages', ['msg' => $msg])
    @each('/about/more/messages', [['type' => 'danger', 'message' => 'Hello World']], 'msg')
    @each('/about/more/messages', [], 'msg', 'raw|<pre>empty</pre>')
    @render('about/more/messages', ['msg' => ['type' => 'danger', 'message' => 'Hello World....']])
    @section('content')
        @includeFirst(['/about/test2', '/about/test'], ['test' => 'foobar'])
        @yield('main')
        @stack('end')
    @show
</main>
<footer class="container border-top mt-5 py-3 text-muted">
    &copy; {{ date('Y') }}
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
