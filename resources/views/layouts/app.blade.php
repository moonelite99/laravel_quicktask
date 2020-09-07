<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('msg.laravel_quicktask') }}</title>
    {{-- Fonts --}}
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/main.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('tasks.index') }}">
                    {{ trans('msg.task_list') }}
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ trans('msg.language') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" onclick="en()">
                                {{ trans('msg.english') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="vi()">
                                {{ trans('msg.vietnamese') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form id="language-form" action="{{ route('switch_lang') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" id="locale" name="locale">
            </form>
        </div>
    </nav>
    @yield('content')
</body>

</html>
