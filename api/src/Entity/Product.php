<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="gtin", type="bigint", nullable=false)
     */
    private $gtin;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=500, nullable=false)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_desc", type="text", length=65535, nullable=false)
     */
    private $productDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=10, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=30, nullable=false)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=30, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", length=65535, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="image_additional", type="string", length=255, nullable=false)
     */
    private $imageAdditional;

    /**
     * @var string
     *
     * @ORM\Column(name="additional", type="text", length=65535, nullable=false)
     */
    private $additional;

    /**
     * @var string
     *
     * @ORM\Column(name="source_video", type="string", length=255, nullable=false)
     */
    private $sourceVideo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGtin(): ?string
    {
        return $this->gtin;
    }

    public function setGtin(string $gtin): self
    {
        $this->gtin = $gtin;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductDesc(): ?string
    {
        return $this->productDesc;
    }

    public function setProductDesc(string $productDesc): self
    {
        $this->productDesc = $productDesc;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageAdditional(): ?string
    {
        return $this->imageAdditional;
    }

    public function setImageAdditional(string $imageAdditional): self
    {
        $this->imageAdditional = $imageAdditional;

        return $this;
    }

    public function getAdditional(): ?string
    {
        return $this->additional;
    }

    public function setAdditional(string $additional): self
    {
        $this->additional = $additional;

        return $this;
    }

    public function getSourceVideo(): ?string
    {
        return $this->sourceVideo;
    }

    public function setSourceVideo(string $sourceVideo): self
    {
        $this->sourceVideo = $sourceVideo;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'gtin' => $this->getGtin(),
            'product_name' => $this->getProductName(),
            'product_desc' => $this->getProductDesc(),
            'price' => $this->getPrice(),
            'currency' => $this->getCurrency(),
            'category' => $this->getCategory(),
            'gender' => $this->getGender(),
            'quantity' => $this->getQuantity(),
            'size' => $this->getSize(),
            'style' => $this->getStyle(),
            'color' => $this->getColor(),
            'url' => $this->getUrl(),
            'image' => $this->getImage(),
            'image_additional' => $this->getImageAdditional(),
            'additional' => $this->getAdditional(),
            'source_video' => $this->getSourceVideo(),
        ];
    }

}
