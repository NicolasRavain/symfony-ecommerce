<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function list()
    {
        return $this->render('product/list.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
