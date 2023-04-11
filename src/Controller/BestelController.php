<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
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
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $task = new Order();

        $form = $this->createForm(OrderType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();


            $entityManager->persist($task);


            $entityManager->flush();
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();


            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('home');
        }

            return $this->renderForm('bestel/index.html.twig', [
                'form' => $form,]);
    }
}
