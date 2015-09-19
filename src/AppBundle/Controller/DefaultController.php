<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @route ("/test/{fn}/{ln}/{age}")
     */
    public function testAction(Request $request) {
        $age = $request->get('age');
        $fn = $request->get('fn');
        $ln = $request->get('ln');
        $session = $request ->getSession();
        $session -> set("username", "$fn $ln");
        return $this->redirectToRoute("say_hi");
    }
    
    /**
     * @route ("/hi" , name="say_hi")
     */
    public function hiAction(Request $request) {
        $session = $request ->getSession();
        return $this->render('default/test.html.twig', array('name' => $session->get('username')));
    }

}
