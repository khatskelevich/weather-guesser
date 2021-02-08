<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cities extends Model
{
    use HasFactory;

    /**
     * Returning pair of random cities
     *
     * @return array
     */
    public static function getCities()
    {
        return DB::select('select t.city_id as id, t.name as city, t.state, t.country from app.cities t order by random() limit 2;');
    }

    public static function getTemperature()
    {
        $cities = json_decode(json_encode(self::getCities()), true);
        foreach ($cities as &$city) {
            $url = 'http://api.openweathermap.org/data/2.5/weather?id=' . $city['id'] . '&lang=en&appid=' . env('OPENWEATHERMAP_API_KEY');
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            if (!empty($data))
                $city['temperature'] = $data['main']['temp'];
        }
        return $cities;
    }
}
