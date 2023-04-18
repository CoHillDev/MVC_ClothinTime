<?php

namespace App\Controller;

use App\Model\UserManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    protected Environment $twig;
    protected array|false $user;
    /**
     *  Initializes this class.
     */

    public function __construct()
    {
        // Initialisation de l'objet Twig
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => (ENV === 'dev'),
            ]
        );

        $this->twig->addExtension(new DebugExtension());

        // Initialisation de la propriété $user
        $userManager = new UserManager();
        // $this->user = isset($_SESSION['email']) ? $userManager->selectOneByEmail($_SESSION['email']) : false;
        $this->user = isset($_SESSION['user_id']) ? $userManager->selectOneById($_SESSION['user_id']) : false;

        // Ajout de $user aux variables globales de Twig
        $this->twig->addGlobal('user', $this->user);
    }
}
