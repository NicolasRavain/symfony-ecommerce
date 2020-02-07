<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
  /**
   * @Route("/", name="home")
   */
  public function home(ProductRepository $productRepository)
  {
    $products = $productRepository->findPublishedOrderedByNewest();
    $favoriteProduct = $productRepository-> findOneByFavorite();
    
    return $this->render('index/home.html.twig', [
      'products' => $products,
      'favorite_product' =>$favoriteProduct,
    ]);
  }

  /**
   * @Route("/contact", name="contact")
   */

  public function contact()
  {
    return $this->render('contact/contact.html.twig', [
      'controller_name' => 'IndexController',
    ]);
  }
}
