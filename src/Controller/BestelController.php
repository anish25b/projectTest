<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BestelController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('bestel/index.html.twig', [
            'controller_name' => 'BestelController',
        ]);
    }
    #[Route('/bestel', name: 'app_bestel')]
    public function new(Request $request): Response
    {        $task = new Order();
            $form = $this->createForm(OrderType::class, $task);
            return $this->renderForm('bestel/index.html.twig', [
                'form' => $form,]);
    }
}
