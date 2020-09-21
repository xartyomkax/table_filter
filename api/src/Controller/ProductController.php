<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $customerRepository)
    {
        $this->productRepository = $customerRepository;
    }

    /**
     * @Route("/products", name="get_all_products", methods={"GET"})
     */
    public function getAll(Request $request): JsonResponse
    {
        $products = $this->productRepository->findAllByConditions(
            $request->get('filters', []),
            $request->get('sort'),
            (int)$request->get('limit', 100),
            (int)$request->get('offset', 0)
        );

        $data = array_map(
            function (Product $product) {
                return $product->toArray();
            },
            $products
        );

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
