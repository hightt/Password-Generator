<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function store(Request $request)
    {
        Password::create([
            'user_id' => $request->user_id,
            'password' => $request->password,
            'comments' => ' '
        ]);
        return redirect('/passwords');
    }

    public function show(Password $password, User $user)
    {
        $passwords = Password::where('user_id', Auth::id())->get();
        return view('passwords', compact('passwords'));
    }

    public function update(Password $password, Request $request)
    {
        return $request;
    }


    public function destroy(Password $password)
    {
        Password::destroy(request('password')->id);
        return redirect('/passwords#main');
    }
    public function generate(Request $request)
    {
        $tabChar = array();
        $genPassword = "";

        for ($i = 33; $i <= 126; $i++) {
            if (($i >= 97 && $i <= 122) ||
                ($request->incNumbers && $i >= 48 && $i <= 57)  ||
                ($request->incBigLetters && $i >= 65 && $i <= 90) ||
                ($request->incSymbols && (($i >= 33 && $i <= 47) ||
                    ($i >= 58 && $i <= 64) || ($i >= 91 && $i <= 94) || ($i >= 123 && $i <= 126)))
                )
                array_push($tabChar, mb_convert_encoding(chr($i), 'UTF-8', 'ISO-8859-1'));
        }

        for ($i = 1; $i <= $request->pswdLength; $i++) {
            $genPassword .= $tabChar[mt_rand(0, count($tabChar) - 1)];
        }

        session()->flashInput($request->input());
        return redirect('/get#main')->with('passwords', $genPassword);
    }
    public function saveToFile(Request $request)
    {
        Storage::put('password.txt', "Twoje hasło: \n\n" . $request->password . "\n\nWygenerowano przez : http://" . request()->getHttpHost());
        return Storage::download('password.txt');
    }


    protected function validateForm()
    {
        return request()->validate([
            'user_id' => 'required',
            'password' => 'required|min:3|max:255'
        ]);
    }
}
