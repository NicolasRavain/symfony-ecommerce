<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    /**
     * @var SluggerInterface
     */
    private $slugger;



    public function __construct(
        SluggerInterface $slugger
        )
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $color = ['Bleu', 'Rouge', 'Vert'];
        for ($i = 0; $i < 100; ++$i) {
            $product = new Product();
            $product->setName('Produit '.$i);
            $product->setSlug('produit-'.$i);
            $product->setDescription($faker->text);
            $product->setPrice($faker->numberBetween(9900, 99990));
            $product->setDate($faker->dateTimeBetween('-50 days'));
            $product->setFavorite($faker->boolean);
            $product->setColor($faker->randomElements($color, rand(0, count($color))));
            $manager->persist($product);
        }
    
        $manager->flush();
        
    }
 
}
