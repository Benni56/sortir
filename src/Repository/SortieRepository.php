<?php

namespace App\Repository;

use App\Entity\Sortie;
use Cassandra\Date;
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

    public function search(?string $keywords=null, ?\DateTime $dateMin, ?\DateTime $dateMax)
    {
        //création requête QB
        $queryBuilder = $this->createQueryBuilder('s');

        //requête si on a bien recçu les mots clés
        if($keywords)
        {
            $keywordsArray = explode(" ", $keywords);

            for ($i = 0; $i<count($keywordsArray); $i++) {
                $queryBuilder
                    ->orWhere("s.nom LIKE :kw$i OR s.descriptionInfos LIKE :kw$i")
                    ->setParameter(":kw$i", "%". $keywordsArray[$i] ."%");
            }
        }

        if ($dateMin < $dateMax)
        {
            $dateMax->add(new \DateInterval('PT23H59M'));
        $queryBuilder
            ->andWhere('s.dateDebut BETWEEN :start AND :end')
            ->setParameter('start', $dateMin)
            ->setParameter('end', $dateMax);
            //->andHaving('s.dateMin', 'ASC');
        }
        //récupère l'objet querry
        $querry = $queryBuilder->getQuery();
        //retourne le résultat
        $sortizes = $querry->getResult();

        return $sortizes;

    }


         }
