<?php


namespace App\Controller;


use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/contacto-post", name="contacto_post")
     */
    public function contactoPost(Swift_Mailer $mailer, Request $request)
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');

        $message = (new Swift_Message('Hello Email'))
            ->setSubject("Mensaje de $name [$email]")
            ->setFrom('paginaweb@catarsis.com.co')
            ->setTo('contactanos@catarsis.com.co')
            ->setBody($message, 'text/html');
        $mailer->send($message);

        return $this->json(["Mensaje enviado exitosamente"]);

    }

    /**
     * @Route("/test-video")
     */
    public function testVideo()
    {
        return $this->render('main/test-video.html.twig');
    }
}