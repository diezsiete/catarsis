<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/nuestro-metodo", name="nuestro_metodo")
     */
    public function nuestroMetodo()
    {
        return $this->render('main/nuestro-metodo.html.twig');
    }

    /**
     * @Route("/lo-que-hacemos", name="lo_que_hacemos")
     */
    public function loQueHacemos()
    {
        return $this->render('main/lo-que-hacemos.html.twig');
    }

    /**
     * @Route("/test-video")
     */
    public function testVideo()
    {
        return $this->render('main/test-video.html.twig');
    }
}