<?php
namespace KitRbacBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Query Builder is an api to construct queries, 
     * so it's easier if you need to build a query 
     * dynamically like iterating over a set of parameters 
     * or filters.
     * 
     */
    public function getList()
    {
        return $this->createQueryBuilder('u')
            ->select('u.id', 'u.username', 'u.createAt', 'u.updateAt', 'r.rolename')
            ->join('u.role', 'r')
            //->where('u.status = ?0')
            //->setParameter(0, 1) // key, The parameter position or name
            ->where('u.status = :status')
            ->setParameter('status', 1)
            ->getQuery()
            ->getResult();
        
       
    }
    /**
     * DQL is easier to read as it is very similar to SQL. 
     */
    public function getList2()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT u.id, u.username,u.createAt,u.updateAt, r.rolename FROM KitRbacBundle:User u
            JOIN u.role r
            WHERE u.status = :status'
        )->setParameter('status', 1)->getResult();
    }
}
