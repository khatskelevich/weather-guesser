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
class Game extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

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
     * @return \Illuminate\Support\Collection
     */
    public function show()
    {
        return DB::table('games')
            ->where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
