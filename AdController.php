<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Image;
use App\Form\AdType;
use App\Repository\AdRepository;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ad", name="ad")
     */
    public function index(AdRepository $adRepository): Response
    {

        $ads =$adRepository->findAll();
        return $this->render('ad/index.html.twig', [
            'Ad' => $ads,
        ]);
    }
    /**
     * permet de creer une annonce
     *
     * @Route("/ad/new", name="Creation")
     *
     */
    public function create(): Response
    {
        $ad = new Ad;

        $form = $this->createForm(AdType::class,$ad);
        return $this->render("ad/oneAd.html.twig",
            ["Form" => $form->createView()]
        );

    }
    /**
    * @Route("/ad/{slug}", name="annonce")
    */
        public function Annonce(AdRepository $adRepository,$slug): Response
        {
            $ads =$adRepository->findOneBySlug($slug);
            return $this->render('ad/annonce.html.twig', [
                'Ad' => $ads,
            ]);
        }
}
