<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>PasswordGenerator</title>
</head>

<body>
    <script src="/js/scripts.js"></script>

        <nav class="navbar text-white text-center bg-dark p-3">
            <a href="/" class="navbar-brand title m-auto m-md-0 mb-2">Password Generator</a>
            @if (!Auth::check())
            <a class="btn btn-primary btn-login m-auto  m-md-0 border-0" href="/login" role="button">Zaloguj się</a>
            @else
            <a class="btn btn-primary btn-login m-auto  m-md-0 border-0" href="/logout" role="button">Wyloguj się</a>
            @endif
        </nav>

            <div class="row main m-0">
                <div class="col-sm-3 col-md-3 col-lg-2 list pl-0 pr-0" id="list">
                    <ul class="list-group">
                        <li class="list-group-item p-3 {{ Route::currentRouteUses('App\Http\Controllers\HomeController@index') ? 'selected' : '' }}"
                            onclick="location.href='/'">Strona główna</li>
                        <li class="list-group-item p-3 {{ Route::currentRouteUses('App\Http\Controllers\HomeController@get') ? 'selected' : '' }}"
                            onclick="location.href='/get'">Wygeneruj hasło</li>
                        <li class="list-group-item p-3 {{ Route::currentRouteUses('App\Http\Controllers\PasswordController@show') ? 'selected' : '' }}"
                            onclick="location.href='/passwords'">Twoje hasła</li>
                        <li class="list-group-item p-3 {{ Route::currentRouteUses('App\Http\Controllers\HomeController@advices') ? 'selected' : '' }}"
                            onclick="location.href='/advices'">Porady dotyczące tworzenia haseł</li>
                        <li class="text-center pt-5"><a href="#main" class="">
                            <img src="/img/down-arrow.png" class="d-sm-none d-md-none d-lg-none d-xl-none m-auto menu-arrow" alt="Przejdź niżej"></a></li>
                    </ul>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-10 p-0" id="main">
                    @yield('content')
                </div>
            </div>
</body>

</html>
