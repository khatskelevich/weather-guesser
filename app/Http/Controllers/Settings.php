<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Settings extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $user->units = $request->units;
            $user->save();
            return response('Settings saved');
        }
        catch (\Exception $e)
        {
          return response($e->getMessage(), 500);
        }
    }
}