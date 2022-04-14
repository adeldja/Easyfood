<?php
namespace App\Repository;
use App\Entity\Plat;
use Doctrine\ORM\EntityRepository;

class PlatRepository extends EntityRepository{
    public function searchPlat($nomP) {
        return $this-> createQueryBuilder('Plat')
            ->andWhere('Plat.nomP LIKE :nom_p')
            ->setParameter('nom_p', '%'.$nomP.'%')
            ->getQuery()
            ->execute();
    }
}
