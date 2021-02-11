<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Returns user data
     *
     * @return array
     */
    public function index()
    {
        $data = [];
        $user = User::find(Auth::id());
        $data['username'] = $user->name;
        $data['units'] = $user->units;
        return $data;
    }

    /**
     * Save user's settings
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $user->units = $request->units;
            $user->save();
            return response('Settings saved');
        } catch (\Exception $e) {
            report($e);
            return response($e->getMessage(), 500);
        }
    }
}