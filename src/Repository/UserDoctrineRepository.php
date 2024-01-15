<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistance\ManagerRegistry;

class UserDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllSuperAdmins()
    {
        return $this->findAllByRoles([Roles::ROLES_SUPER_ADMIN]);
    }
}