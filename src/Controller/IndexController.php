<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
  /**
   * @Route("/", name="home")
   */
  public function home()
  {
    return $this->render('index/home.html.twig', [
      'controller_name' => 'IndexController',
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
