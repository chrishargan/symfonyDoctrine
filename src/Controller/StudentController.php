<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    private $studentRepository;


    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @Route("/students/", name="add_student", methods={"POST"})            // The Create
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $address = new Address($data['address']['street'], $data['address']['streetNumber'], $data['address']['city'], $data['address']['zipcode']);
        $teacherId= $this->getDoctrine()->getRepository(Teacher::class)->find($data['teacher_id']);

        if (empty($firstName) || empty($lastName) || empty($email) || empty($address || empty($teacherId))) {
            throw new NotFoundHttpException('Please fill in all data fields');
        }

        $this->studentRepository->saveStudent($firstName, $lastName, $email, $address, $teacherId);

        return new JsonResponse(['status' => 'Student created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/students/{id}", name="get_one_student", methods={"GET"})   // The route is the way to "get" and display the rest api entry (no function required)
     * @param Student $student                                                      // The Read (singular)
     * @return JsonResponse
     */
    public function getOne(Student $student): JsonResponse                // student object had been injected
    {
        return new JsonResponse($student->toArray(), Response::HTTP_OK);
    }

    /**                                                                  //  again same for "get all", The route is the way to "get" and display the rest api entry (no function required)
     * @Route("/students/", name="get_all_students", methods={"GET"})          // The Read (all)
     */
    public function getAll(): JsonResponse
    {
        $students = $this->studentRepository->findAll();
        $data = [];

        foreach ($students as $student) {
            $data[] = [
                $student->toArray()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/students/{id}", name="update_student", methods={"PUT"})             // The Update
     * @param Student $student
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Student $student, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $teacherId= $this->getDoctrine()->getRepository(Teacher::class)->find($data['teacher_id']);

        empty($data['firstName']) ? true : $student->setFirstName($data['firstName']);
        empty($data['lastName']) ? true : $student->setLastName($data['lastName']);
        empty($data['email']) ? true : $student->setEmail($data['email']);

        $address = $student->getAddress();                                                                             //if any of he fields are empty then set the new info in that field
        empty($data['address']['street']) ? true : $address->setStreet($data['address']['street']);
        empty($data['address']['streetNumber']) ? true : $address->setStreet($data['address']['streetNumber']);
        empty($data['address']['city']) ? true : $address->setStreet($data['address']['city']);
        empty($data['address']['zipcode']) ? true : $address->setStreet($data['address']['zipcode']);


        empty($data['teacher_id']) ? true : $student->setTeacher($teacherId);


        $updatedStudent = $this->studentRepository->updateStudent($student);

        return new JsonResponse($updatedStudent->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/students/{id}", name="delete_student", methods={"DELETE"})         // The Delete
     */
    public function delete(Student $student): JsonResponse
    {
        $this->studentRepository->removeStudent($student);

        return new JsonResponse(['status' => 'Student has been removed'], Response::HTTP_NO_CONTENT);
    }
}
