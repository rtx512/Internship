<?php

namespace App\Service;

use App\Entity\GroupEntity;
use Doctrine\ORM\EntityManagerInterface;

class MainService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getGroups(): array
    {
        $groups = $this->entityManager->getRepository(GroupEntity::class)
            ->findAll();

        $groupDtos = [];
        /** @var GroupEntity $group */
        foreach ($groups as $group) {
            $groupDtos[] = $group->toDto();
        }
        return $groupDtos;
    }
}