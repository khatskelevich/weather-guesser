<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cities extends Model
{
    use HasFactory;

    /**
     * @return array
     */
    public static function index()
    {
        return self::getTemperature();
    }

    /**
     * Return pair of random cities
     *
     * @return array
     */
    public static function getCities()
    {
        return DB::select('select t.city_id as id, t.name as city, t.state, t.country from app.cities t order by random() limit 2;');
    }

    /**
     * Return game data
     *
     * @return mixed
     */
    public static function getTemperature()
    {
        $cities = json_decode(json_encode(self::getCities()), true);
        foreach ($cities as &$city) {
            $url = 'http://api.openweathermap.org/data/2.5/weather?id=' . $city['id'] . '&lang=en&appid=3a487065d1678bc87315aabf3780f045';
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            if (!empty($data))
                $city['temperature'] = $data['main']['temp'];
        }
        return $cities;
    }
}
