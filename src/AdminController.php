<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 14/12/2017
 * Time: 00:41
 */
namespace Itb;


class AdminController
{
    private $sessionManager;
    private $twig;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
    }

    public function adminHomepageAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'adminHomepage.html.twig';
        }

        $html = $this->twig->render($template, $args);
        print $html;
    }


    public function adminDeleteAllAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $args = [
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
        ];

        // default - not authorised
        $template = 'errorNotLoggedIn.html.twig';

        // if is logged in - allow access to admin home page
        if($isLoggedIn){
            $template = 'adminDeleteAll.html.twig';
        }

        $html = $this->twig->render($template, $args);
        print $html;
    }


}