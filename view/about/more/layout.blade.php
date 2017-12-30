@import(arc5)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{ $title ?? 'Mvc5 Playground' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .navbar-inverse .navbar-toggle {
            border-color: #33669a;
        }
        .navbar.navbar-inverse {
            background-color:#33669a;
            border-color:#33669a;
        }
        .navbar-brand {
            padding-top:0;
        }
        .nav.navbar-nav li a {
            color:#fff;
        }
        body > .container {
            margin-top:15px
        }

        .jumbotron {
            background-color: #f5f5f5;
        }

        .footer {
            border-top:1px solid #e5e5e5;
            margin-top:19px;
            padding-top:19px;
            color:#ccc;
        }
        a {
            color: #33669a;
        }

    </style>
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('home') }}"><img witdh="50" height="50" src="data:image/png;base64,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"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url(['app', 'controller' => 'overview']) }}">Overview</a></li>
                @plugin('user')
                @if($user->authenticated())
                    <li><a href="{{ url(['dashboard', 'user' => $user->username()]) }}">Dashboard</a></li>
                    <li><a href="{{ url('explore') }}">Explore</a></li>
                    <li><a href="{{ url(['app', 'controller' => 'logout']) }}">Logout</a></li>
                @else
                    <li><a href="{{ url(['app', 'controller' => 'login']) }}">Login</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    @renderWhen($msg = $this->{'session\messages'}(), '/about/more/messages', ['msg' => $msg])
    @each('about/more/messages', [['type' => 'danger', 'message' => 'Hello World']], 'msg')
    @each('about/more/messages', [], 'msg', 'raw|<pre>empty</pre>')
    @render('/about/more/messages', ['msg' => ['type' => 'danger', 'message' => 'Hello World....']])
    <div class="row">
        <div class="col-md-12">

            @section('content')
                @includeFirst(['/about/test2', '/about/test'], ['test' => 'foobar'])
                @yield('main')
                @stack('end')
            @show

            <div class="footer">
                <p>&copy; <?= date('Y'); ?></p>
            </div>

        </div><!--/col-12-->
    </div>
</div>


<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
