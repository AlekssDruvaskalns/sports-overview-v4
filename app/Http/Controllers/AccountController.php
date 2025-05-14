<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AccountController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $favorites = $user->favoriteEvents()->orderBy('date')->get(); // Retrieve saved events

        return view('account.show', compact('favorites'));
    }

    public function update(Request $request)
    {
    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users,username,' . Auth::id()],
    ]);

    $user = Auth::user();
    $user->username = $request->input('username');
    $user->save();

    return redirect()->route('account.show')->with('success', 'Account updated successfully.');
    }
}
