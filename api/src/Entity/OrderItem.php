<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;

/**
 *
 * @ApiResource
 * @ORM\Table(name="orders__item")
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository")
 * @ApiFilter(NumericFilter::class, properties={"price"})
 * @ORM\HasLifecycleCallbacks()
 */
class OrderItem
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $content
     * @ORM\Column(name="content", type="string", nullable=true)
     */
    private $content;

    /**
     * @var string $description
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float $price
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 1000000,
     *      minMessage = "This value should be {{ limit }} or more",
     *      maxMessage = "This value should be {{ limit }} or less"
     * )
     * @ORM\Column(name="price", type="decimal", scale=2, nullable=true)
     */
    private $price = 0;

    /**
     * @var order
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Order" , inversedBy="items", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id",  nullable=false)
     * })
     */
    private $order;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
