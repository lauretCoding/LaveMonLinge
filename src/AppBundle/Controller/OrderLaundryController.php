<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class OrderLaundryController extends Controller
{
    /**
     * @Route("/saveBasket", name="app_saveBasket")
     */
    public function saveAction(){

        $basket = $this->getManager('app.basket_manager')->getBasket();
        $user = $this->getUser();
        $idOrderLaundry = $this->getManager('app.order_manager')->save($basket, $user);
        $session = $this->get('session');
        $session->set('idOrderLaundry', $idOrderLaundry);
        return $this->redirectToRoute('app_showBasket');
    }

    private function getManager($manager){
        return $this->get($manager);
    }
}
