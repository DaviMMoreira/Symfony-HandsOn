<?php
namespace Merci\CatalogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Merci\CatalogBundle\Entity\Product;

class LoadProductData implements FixtureInterface
{
    private $products = array(
        array(
            'name' => 'Oculos Bem Legal',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis sapien erat, vel vehicula risus hendrerit vel.',
            'price' => 299.9,
            'image_name' => 'fem-oculos',
        ),
        array(
            'name' => 'Tenis Cor de Rosa',
            'description' => 'Pellentesque condimentum convallis consectetur. Aliquam dolor dolor, convallis eu arcu vitae, iaculis sagittis ipsum.',
            'price' => 359.9,
            'image_name' => 'fem-tenis',
        ),
        array(
            'name' => 'Bota Trekking',
            'description' => 'Mauris faucibus magna arcu, id ultrices est consectetur vitae. Nunc id lorem rhoncus, auctor eros id, posuere quam.',
            'price' => 539.9,
            'image_name' => 'mas-bota',
        ),
        array(
            'name' => 'Mochila Acampamento',
            'description' => 'Praesent a enim vestibulum, accumsan mauris id, mattis nibh. Donec euismod enim sit amet tellus blandit, sit amet condimentum tellus commodo.',
            'price' => 222.9,
            'image_name' => 'mas-mochila',
        ),
    );

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->products as $product) {
            $entity = new Product();
            $entity->setName($product['name']);
            $entity->setDescription($product['description']);
            $entity->setPrice($product['price']);
            $entity->setImageName($product['image_name']);

            $manager->persist($entity);
            $manager->flush();
        }
    }
}