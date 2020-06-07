<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginShow()
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/resetPassword")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resetPassword()
    {
        return $this->render('resetPassword.html.twig');
    }

    /**
     * @Route("/register")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerShow()
    {
        return $this->render('register.html.twig');
    }
}