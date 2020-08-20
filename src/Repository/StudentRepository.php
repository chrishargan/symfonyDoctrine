<?php

namespace App\Repository;

use App\Entity\Student;
use App\Entity\Teacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct
    (
        ManagerRegistry $registry,
        EntityManagerInterface $manager
    )
    {
        parent::__construct($registry, Student::class);
        $this->manager = $manager;
    }
                                                                         // the Create method
    public function saveStudent($firstName, $lastName, $email, $address, $teacherId)
    {
        $newStudent = new Student();


        $newStudent
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setAddress($address)
            ->setTeacher($teacherId);

        $this->manager->persist($newStudent);
        $this->manager->flush();
    }


                                                                          // The Update method
    public function updateStudent(Student $student): Student
    {
        $this->manager->persist($student);
        $this->manager->flush();

        return $student;
    }

    public function removeStudent( Student $student){                     // The Delete
        $this->manager->remove($student);
        $this->manager->flush();
    }






    // /**
    //  * @return Student[] Returns an array of Student objects
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
    public function findOneBySomeField($value): ?Student
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
