<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    #[Template('index/index.html.twig')]
    public function index(Request $request, ManagerRegistry $registry): array
    {
        //$clientId = $request->get('id');
        $clientId = 1;
        
        $client = $registry->getRepository(Client::class)->findOneBy(['id' => $clientId]); //busqueda a la base de datos

        //Regresa informacion
        return [
            'client' => $client,
        ];
    }
}

