<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; ++$i) {
            $order = new Order();
            $order->setTitle('order title_'.$i);
            $order->setShort('order short_'.$i);
            $order->setDescription('description_'.$i);
            $order->setPromoted(($i%2)?true:false);
            $this->addReference('order_'.$i, $order);
            $manager->persist($order);
        }

        $manager->flush();
    }
}
