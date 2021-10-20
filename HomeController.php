<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */


    public function index(AdRepository $adRepository,EntityManagerInterface $entityManager): Response
    {
        $ads = $adRepository->findAll();
        $ad = new Ad();
        $ad ->setTitle("Appartement 2")
            ->setContent("ceci doit etre un long texte")
            ->setCoverImage("https://www.icehotel.com/sites/cb_icehotel/files/Kaamos-Johan-Broberg.jpg")
            ->setPrice(120)
            ->setRooms(10)
            ->setIntroduction("Un très Bel appartement")
        ;


        //$entityManager->persist($ad);
        //$entityManager->flush();

        return $this->render('home/home.html.twig');
    }





}
