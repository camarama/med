<?php

namespace MonsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        return $this->render('MonsiteBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        $name       = @trim(stripslashes($_POST['name']));
        $from       = @trim(stripslashes($_POST['email']));
        $subject    = @trim(stripslashes($_POST['subject']));
        $message    = @trim(stripslashes($_POST['message']));
        $to   		= 'mohamedcra@yahoo.fr';//replace with your email

        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=iso-8859-1";
        $headers[] = "From: {$name} <{$from}>";
        $headers[] = "Reply-To: <{$from}>";
        $headers[] = "Subject: {$subject}";
        $headers[] = "X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, $headers);

        die;
    }
}
