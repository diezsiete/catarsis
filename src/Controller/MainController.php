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
    public function home($emailToSend)
    {
        dump($emailToSend);
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
     * @Route("/soy-lo-que-mas-me-gusta", name="slqmmg")
     */
    public function slqmmg()
    {
        return $this->render('main/slqmmg.html.twig');
    }

    /**
     * @Route("/hablemos-de-tu-proyecto", name="hablemos_de_tu_proyecto")
     */
    public function hablemosDeTuProyecto()
    {
        return $this->render('main/hablemos-de-tu-proyecto.html.twig');
    }

    /**
     * @Route("/contacto-post", name="contacto_post")
     */
    public function contactoPost(Swift_Mailer $mailer, Request $request)
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');

        $message = (new Swift_Message("Mensaje de $name [$email]"))
            ->setFrom('paginaweb@catarsis.com.co')
            //contactanos@catarsis.com.co
            ->setTo('guerrerojosedario@gmail.com.co')
            ->setBody($message, 'text/html');
        $mailer->send($message);

        return $this->json(["Mensaje enviado exitosamente"]);
    }

    /**
     * @Route("/hablemos-de-tu-proyecto-post", name="hablemos_de_tu_proyecto_post")
     */
    public function hablemosDeTuProyectoPost(Swift_Mailer $mailer, Request $request)
    {
        $message = (new Swift_Message("Brief pagina web"))
            ->setFrom('paginaweb@catarsis.com.co')
            ->setTo('guerrerojosedario@gmail.com')
            ->setBody($this->renderView('emails/brief.html.twig', [
                'video' => $request->request->get('video'),
                'fotografia' => $request->request->get('fotografia'),
                'estrategia' => $request->request->get('request'),
                'grafica' => $request->request->get('grafica'),
                'aspectos' => $request->request->get('aspectos'),
                'objetivoComunicar' => $request->request->get('objetivo_comunicar'),
                'objetivo' => $request->request->get('objetivo'),
                'personajes' => $request->request->get('personajes'),
                'locaciones' => $request->request->get('locaciones'),
                'fecha' => $request->request->get('fecha'),
                'dondePublicar' => $request->request->get('donde_publicar'),
                'nombre' => $request->request->get('nombre'),
                'email' => $request->request->get('email'),
            ]), 'text/html');

        $mailer->send($message);

        return $this->json(["Mensaje enviado exitosamente"]);
    }
}