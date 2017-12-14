<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 14/12/2017
 * Time: 00:41
 */
namespace Itb;


class MainController
{
    private $userController;
    private $sessionManager;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
        $this->userController = new UserController($twig, $sessionManager);
    }

    public function homeAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'homepage.html.twig';
        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }


    public function aboutAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'about.html.twig';
        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function charactersAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'characters.html.twig';
        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }




    public function logoutAction()
    {
        $this->sessionManager->killSession();
        $this->homeAction();
    }

}