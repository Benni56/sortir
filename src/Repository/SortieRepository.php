<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    public function search($keywords="")
    {
        //création requête QB
        $queryBuilder = $this->createQueryBuilder('s');
        if($keywords)
        {
            $keywordsArray = explode(" ", $keywords);

            for ($i = 0; $i<count($keywordsArray); $i++) {
                $queryBuilder
                    ->orWhere("s.nom LIKE :kw$i OR s.descriptionInfos LIKE :kw$i")
                    ->setParameter(":kw$i", "%". $keywordsArray[$i] ."%");
//                    ->where('s.nom LIKE :key')
//                    ->orWhere('s.descriptionInfos LIKE :key')
//                    ->setParameter('key', '%'.$keywordsArray[$i] .'%');

            }
        }

        //récupère l'objet querry
        $querry = $queryBuilder->getQuery();
        //retourne le résultat
        $sortizes = $querry->getResult();

        return $sortizes;


    }


    // /**
    //  * @return Sortie[] Returns an array of Sortie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
