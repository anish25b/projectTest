<?php


namespace App\Controller;
use App\Entity\Pizza;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100);
        return $this->render('bezoeker/lucky.html.twig', ['number' => $number]);
    }

//vervang home met test bij errors
    #[Route('/Home', name: 'home')]
    public function test(EntityManagerInterface $em): Response
    {
        $pizza=$em->getRepository(Pizza::class)->findAll();
        return $this->render('bezoeker/home.html.twig',[
            'pizza'=>$pizza,
            ]);

    }

    #[Route('/Contact', name: 'contact')]
    public function test1(): Response
    {
        return $this->render('bezoeker/contact.html.twig');
    }

}