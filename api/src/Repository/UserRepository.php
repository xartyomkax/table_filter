<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    public function isExist(string $name, string $password)
    {
        $user = new User();
        $user->setName($name)
            ->setPassword($password);

        return $this->count(['name' => $user->getName(), 'password' => $user->getPassword()]) === 1;
    }
}
