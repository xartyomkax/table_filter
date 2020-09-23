<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/login", name="login", methods={"post"})
     */
    public function login(Request $request): JsonResponse
    {
        $isExist = $this->userRepository->isExist($request->get('name'), $request->get('password'));

        return new JsonResponse(['result' => $isExist], Response::HTTP_OK);
    }
}
