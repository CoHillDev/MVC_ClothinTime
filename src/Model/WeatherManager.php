<?php

namespace App\Model;

use Exception;

class WeatherManager extends AbstractManager
{
    public function getWeather(string $city)
    {
        //Une clé d'API pour l'API OpenWeatherMap est stockée dans la variable //
        $apiKey = '7255b8bb61913ab62e7881ed9bb07698';

        // URL de l'API OpenWeatherMap avec la ville et la clé d'API
        $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $apiKey;

        $data = null; // Initialisation de $data

        // Effectuer la requête HTTP avec file_get_contents()
        $response = file_get_contents($url);

        if ($response !== false) {
            $data = json_decode($response);
            if ($data && $data->cod === 200) {
                // Récupération des données météorologiques
                $data->main->temp -= 273.15;

                // Récupérer la description de la météo
                $weather_desc = $data->weather[0]->description;

                // Associer chaque description météo à une image correspondante
                $images = array(
                    "clear sky" => "good.gif",
                    "few clouds" => "few-clouds.gif",
                    "scattered clouds" => "scattered-clouds.gif",
                    "broken clouds" => "broken-clouds.gif",
                    "overcast clouds" => "bleu-jeans.gif",
                    "shower rain" => "shower-rain.gif",
                    "rain" => "rain.gif",
                    "moderate rain" => "rain.gif",
                    "light rain" => "rain.gif",
                    "thunderstorm" => "thunderstorm.gif",
                    "snow" => "snow-style.gif",
                    "mist" => "mist.gif"
                );
                // Si la description météo n'est pas incluse dans le tableau $images, utiliser une image par défaut
                if (array_key_exists($weather_desc, $images)) {
                    $data->description = $images[$weather_desc];
                } else {
                    $data->description = "bleu-jeans.gif";
                }
                return $data;
            } else {
                // Gestion des erreurs
                $error_message = '';
                if ($data && isset($data->message)) {
                    $error_message = $data->message;
                } else {
                    $error_message = "Erreur lors de la récupération des données météorologiques";
                }
                throw new Exception($error_message);
            }
        } else {
            // Gestion des erreurs
            throw new Exception("Erreur lors de la requête API");
        }
    }
}

// namespace App\Model;

// use App\Model\Connection;

// class WeatherManager extends AbstractManager
// {
//     // // Clé API OpenWeatherMap
//     // private float $api_key = "api_key";

//     // Clé API OpenWeatherMap
//     private $apiKey = "API_KEY";

//     // city pour laquelle nous souhaitons obtenir les données météorologiques
//     public string $city = '';


//     public function getWeather($city)
//     {
//         // URL de l'API OpenWeatherMap
//         $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $this->api_key;

//         // Récupérer les données météorologiques
//         $data = file_get_contents($url);

//         // Convertir les données JSON en tableau associatif
//         $weatherData = json_decode($data, true);

//         // Récupérer la description de la météo
//         $weather_desc = $weatherData['weather'][0]['description'];

//         // Associer chaque description météo à une image correspondante
//         $images = array(
//             "clear sky" => "sun.webp",
//             "few clouds" => "scattered-clouds.webp",
//             "scattered clouds" => "sunny.jpg",
//             "broken clouds" => "broken-clouds.jpg",
//             "shower rain" => "rainy.jpg",
//             "rain" => "rainy.webp",
//             "thunderstorm" => "thunder.png",
//             "snow" => "very.cold.1.png",
//             "mist" => "mist.jpeg"
//         );

//         // Récupérer le nom de l'image correspondant à la description de la météo
//         $image_name = isset($images[$weather_desc]) ? $images[$weather_desc] : "not-found.png";

//         // Retourner un tableau associatif avec les informations météorologiques
//         return [
//             'city' => $city,
//             'temp' => $weatherData['main']['temp'],
//             'description' => $weather_desc,
//             'icon' => $image_name
//         ];
//     }
// }


// // URL de l'API OpenWeatherMap
// $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $api_key;

// // Récupérer les données météorologiques
// $data = file_get_contents($url);

// // Convertir les données JSON en tableau associatif
// $data = json_decode($data, true);

// // Récupérer la description de la météo
// $weather_desc = $data['weather'][0]['description'];

// // Définir le chemin vers le dossier contenant les images de la météo
// $image_dir = "images/weather/";

// // Associer chaque description météo à une image correspondante
// $images = array(
//     "clear sky" => "01d.png",
//     "few clouds" => "02d.png",
//     "scattered clouds" => "03d.png",
//     "broken clouds" => "04d.png",
//     "shower rain" => "09d.png",
//     "rain" => "10d.png",
//     "thunderstorm" => "11d.png",
//     "snow" => "13d.png",
//     "mist" => "50d.png"
// );

// // Récupérer le nom de l'image correspondant à la description de la météo
// $image_name = isset($images[$weather_desc]) ? $images[$weather_desc] : "not-found.png";

// // Afficher l'image correspondante
// echo '<img src="' . $image_dir . $image_name . '" alt="' . $weather_desc . '">';