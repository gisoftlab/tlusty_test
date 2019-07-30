<?php

namespace App\DataFixtures;


use App\Entity\OrderItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OrderItemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t = 1;
        for ($i = 1; $i <= 50; ++$i) {
            $order = new OrderItem();
            $order->setContent('order content_'.$i);
            $order->setDescription('description_'.$i);
            $order->setPrice($i * 5);

            if ($i % 5 === 0){
                $t+=1;
            }

            $order->setOrder($this->getReference('order_'.$t));
            $manager->persist($order);
        }

        $manager->flush();
    }
}
