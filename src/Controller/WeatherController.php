<?php

namespace App\Controller;

use App\Model\WeatherManager;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class WeatherController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(string $city = null): string
    {
        $data = null;
        $error = null;

        try {
            $weatherManager = new WeatherManager();
            $data = $city ? $weatherManager->getWeather($city) : null;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        return $this->twig->render('Weather/show.html.twig', ['weatherData' => $data, 'error' => $error]);
    }
}


// class WeatherController extends AbstractController
// {
//     //Show informations for a specific city

//     public function show(string $city = NULL): string
//     {
//         $weatherManager = new WeatherManager();
//         $weatherData = $weatherManager->getWeather($city);

//         return $this->twig->render('Weather/show.html.twig', ['weatherData' => $weatherData]);
//     }

    // public function index(): string
    // {
    //     return $this->twig->render('Home/index.html.twig');
    // }
