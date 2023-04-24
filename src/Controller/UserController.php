<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        $credentials = array_map('trim', $_POST);

        //@todo make some controls on email and password fields and if errors, send them to the view :

        //@todo add controls for email and password fields
        $errors = [];
        if (empty($credentials['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        if (empty($credentials['password'])) {
            $errors[] = 'Password is required';
        }

        if (!empty($errors)) {
            return $this->twig->render('User/login.html.twig', ['errors' => $errors]);
        }

        //@todo check if the user exists in the database
        $userManager = new UserManager();
        $user = $userManager->selectOneByEmail($credentials['email']);
        if ($user && password_verify($credentials['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /');
            exit();
        }

        $errors[] = 'Incorrect email or password';
        return $this->twig->render('User/login.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        //session_start(); // on démarre la session - déjà on
        unset($_SESSION['user_id']); // on détruit la variable de session "user_id"
        session_destroy(); // on détruit la session

        // on redirige l'utilisateur vers la page d'accueil
        header('Location: /');
        exit;
    }

    public function register()
    {
        $errors = [];
        // @todo make some controls and if errors send them to the view :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $credentials = $_POST;

            // Validate the form data
            if (empty($credentials['email'])) {
                $errors[] = 'Email is required';
            }
            if (empty($credentials['password'])) {
                $errors[] = 'Password is required';
            }
            if (empty($credentials['pseudo'])) {
                $errors[] = 'Pseudo is required';
            }
            if (empty($credentials['firstname'])) {
                $errors[] = 'Firstname is required';
            }
            if (empty($credentials['lastname'])) {
                $errors[] = 'Lastname is required';
            }

            // If there are no errors, insert the user
            if (empty($errors)) {
                $userManager = new UserManager();
                if ($userManager->insert($credentials)) {
                    return $this->login();
                }
            }
        }

        return $this->twig->render('User/register.html.twig', [
            'errors' => $errors
        ]);
    }
}
