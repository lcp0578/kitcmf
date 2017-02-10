<?php

namespace KitNewsBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getParentCategory()
    {
        return $this->createQueryBuilder('c')
                    ->select('c')
                    ->where('c.parentId = 1')
                    ->andWhere('c.status = 1')
                    ->orderBy('c.id', 'ASC');
    }
    
    public function getList()
    {
        return $this->createQueryBuilder('c')
                    ->select('c')
                    ->orderBy('c.id', 'DESC');
    }
}
