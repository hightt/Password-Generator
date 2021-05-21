@extends('layout')
@section('content')
<div class="mb-5"></div>
<div class="get-form col-md-12 col-lg-6 m-auto p-3 w-md-100" id="get-form">
    <h2 class="text-center mb-4">Wygeneruj hasło</h2>
    <form action="/generate" method="POST">
        @csrf
        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Długość nowego hasła: </label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="pswdLength" value="{{ old('pswdLength') }}"
                    placeholder="Od 3 do 255 znaków" min="3" max="255">
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-5 text-checkbox">Uwzględnij cyfry</div>
            <div class="col-sm-7">
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" name="incNumbers" @if(null
                        !==old('incNumbers')) checked @endif>
                    <label class="form-check-label ml-2" for="gridCheck1">
                        (1 2 3 4 ...)
                    </label>
                </div>
            </div>

            <div class="col-sm-5 pt-2">Uwzględnij wielkie litery</div>
            <div class="col-sm-7">
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" name="incBigLetters" @if(null
                        !==old('incBigLetters')) checked @endif>
                    <label class="form-check-label ml-2" for="gridCheck1">
                        (A B C D E ...)
                    </label>
                </div>
            </div>

            <div class="col-sm-5 pt-2">Uwzględnij symbole</div>
            <div class="col-sm-7">
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" name="incSymbols" @if(null
                        !==old('incSymbols')) checked @endif>
                    <label class="form-check-label ml-2" for="gridCheck1">
                        (! @ # $ & * [ ] { } = <> - ...)
                    </label>
                </div>
            </div>

        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary get-button">Wygeneruj</button>
            </div>
        </div>
    </form>


    <textarea @if((session()->has('passwords'))) class="form-control result-pswd "  onclick="copy()" @else class="form-control result-pswd cursor" @endif id="textarea"rows=4 readonly=readonly >{{ Session::get('passwords') }}
                    </textarea>


    {{-- Zapisz do pliku --}}
    <form action="/saveToFile" method="post" class="">
        @csrf
        <input type="hidden" name="password"
            value="@if(session()->has('passwords')){{ Session::get('passwords') }}@endif">
        <input type="submit" class="btn btn-primary float-right ml-4 mt-3 btn-save d-block border-0" value="Zapisz do pliku"
            @if(session()->missing('passwords')) disabled @endif>
    </form>

    {{-- Zapisz na stronie --}}
    <form action="/" method="post">
        @csrf
        <input type="hidden" name="password"
            value="@if(session()->has('passwords')){{ Session::get('passwords') }}@endif">
        <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}}@endif">
        <input type="submit" class="btn btn-primary float-right ml-4 mt-3 mb-3 btn-save d-block border-0" value="Zapisz na stronie" @if((session()->missing('passwords'))) disabled
        @endif>
    </form>
    <div class="mt-5"><br></div>




</div>
@endsection
