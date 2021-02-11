<?php


namespace App\Http\Controllers;


use App\Models\GameModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class Game
 * @package App\Http\Controllers
 */
class GameController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return GameModel::store($request);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        return GameModel::show();
    }

}
