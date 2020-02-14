<?php

namespace App\Controller;

use App\Entity\Advert;
use App\Form\AdvertType;
use App\Repository\AdvertRepository;
use App\Utils\EstimationPrix;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends AbstractController
{
    /**
     * @Route("/advert", name="advert")
     */
    public function index(AdvertRepository $advertRepository)
    {
        $adverts = $advertRepository->findAll();

        return $this->render('advert/index.html.twig', [
            'adverts' => $adverts,
        ]);
    }

    /**
     * @Route("/newAdvert", name="newAdvert")
     */
    public function newAdvert(EntityManagerInterface $entityManagerInterface, Request $request, EstimationPrix $estimationPrix)
    {
        $advert = new Advert();
        $form = $this->createForm(AdvertType::class, $advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $advert->setPrice($estimationPrix->Price($advert->getCarYear(), $advert->getNbKm(), $advert->getNbKm()));
            $entityManagerInterface->persist($advert);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('advert');
        }

        return $this->render('advert/newAdvert.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
