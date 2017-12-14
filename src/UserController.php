<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 14/12/2017
 * Time: 00:41
 */
namespace Itb;


class UserController
{
    private $sessionManager;
    private $adminController;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
        $this->adminController = new AdminController($twig, $sessionManager);
    }

    public function loginFormAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        $backgroundColor = $this->sessionManager->getColorFromSession();

        $template = '_template.html.twig';
        $args = [
            'isloggedIn' => $isLoggedIn,
            'username' => $username,
            'backgroundColor' => $backgroundColor
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function processLoginAction($username, $password)
    {
        if($this->validCredentials($username, $password)){
            $_SESSION['username'] = $username;
            $this->adminController->adminHomepageAction();
        } else {
            $this->loginErrorAction();
        }
    }


    public function loginErrorAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        $backgroundColor = $this->sessionManager->getColorFromSession();

        $template = 'loginError.html.twig';
        $args = [
            'isloggedIn' => $isLoggedIn,
            'username' => $username,
            'backgroundColor' => $backgroundColor
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }

    private function validCredentials($u, $p)
    {
        if('admin' == $u && 'admin' == $p){
            return true;
        } else {
            return false;
        }
    }


}