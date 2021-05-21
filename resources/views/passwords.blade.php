@extends('layout')
@section('content')
<div class="pswd-main">
    @if(!$passwords->isEmpty())

    <table class="table text-center borderless pswd-table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th colspan="2" class="mr-4">Hasło</th>
                <th>Utworzono</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($passwords as $password )
            <tr>
                <th>{{$loop->iteration}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle border-0" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/delete/{{$password->id}}" role="button">Usuń hasło</a>
                        </div>
                    </div>
                </th>

                <td class="text-right">{{
                    mb_substr(preg_replace('/(?!^).(?!$)/', "*", $password->password),0 ,6)}}
                    <div id="pswd-{{$password->id}}" class="collapse">
                        {{$password->password}}
                    </div>
                </td>

                <td>
                    <a href="#pswd-{{$password->id}}" class="btn btn-primary btn-login float-left"
                        data-toggle="collapse"><img src="/img/down-arrow.png" class="small-arrow-img"></a>
                </td>

                <td>{{date('d-m-Y', strtotime($password->created_at))}}r.</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Brak zapisanych haseł</p>
    <p>Wygeneruj <a href="/get">>tutaj<</a></p>
    @endif
</div>
@endsection
