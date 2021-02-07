<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Game extends Controller
{

    private $user_id;

    public function __construct(Request $request)
    {
        $this->user_id = Auth::id();//$request->user;
    }

    public function saveStatistic(Request $request)
    {

    }


    public function getHistory()
    {
        return DB::table('games')
            ->where('user_id', '=',  $this->user_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
