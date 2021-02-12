<?php


namespace App\Models;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameModel
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        try {
            $request->validate([
                'game_stat' => 'array',
                'guessed' => 'boolean',
            ]);

            DB::table('games')->insert(
                [
                    'user_id' => Auth::id(),
                    'game_stat' => json_encode($request->game_stat),
                    'guessed' => $request->guessed
                ]
            );
            return response('Saved successful!');
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function show()
    {
        $data = DB::table('games')
            ->where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')->limit(10)
            ->get();
        foreach ($data as &$item) {
            $item->game_stat = json_decode($item->game_stat, 1);
        }

        return $data;
    }
}