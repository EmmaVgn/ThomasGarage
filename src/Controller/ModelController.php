<?php

namespace App\Controller;

use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModelController extends AbstractController
{
    
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }
    
    #[Route('/brand/{slug}', name: 'model')]
    public function model($slug, ModelRepository $modelRepository): Response
    {
        $model = $modelRepository->findOneBy([
            'slug' => $slug
        ]);

        if (!$model) {
            throw $this->createNotFoundException("La marque demandée n'existe pas");
        }

        return $this->render('product/model.html.twig', [
            'slug' => $slug,
            'model' => $model,
        ]);
    }

    public function renderMenuList(): Response
    {
        // 1. Aller chercher les marques dans la BDD
        $models = $this->modelRepository->findAll();
        // 2. Renvoyer le rendu HTML sous la forme d'une Response ($this->render)
        return $this->render('model/_menu.html.twig', [
            'models' => $models,
        ]);
    }



}