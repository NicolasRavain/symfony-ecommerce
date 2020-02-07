<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function list(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/{slug}", name="product_show")
     */

    public function show($slug)
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->findOneBySlug($slug);
        if(!$product) {
            throw $this->createNotFoundException('Le produit n\'existe pas.');
        }

        return $this->render('product/show.html.twig', [
          'product' => $product,  
        ]);
    }

}
