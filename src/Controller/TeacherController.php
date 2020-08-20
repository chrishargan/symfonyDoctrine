<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    private $teacherRepository;


    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * @Route("/teachers/", name="add_teacher", methods={"POST"})            // The Create
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $address = new Address($data['address']['street'], $data['address']['streetNumber'], $data['address']['city'], $data['address']['zipcode']);


        if (empty($firstName) || empty($lastName) || empty($email) || empty($address)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->teacherRepository->saveTeacher($firstName, $lastName, $email, $address);

        return new JsonResponse(['status' => 'Teacher created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/teachers/{id}", name="get_one_teacher", methods={"GET"})   // The route is the way to "get" and display the rest api entry (no function required)
     * @param Teacher $teacher                                                                     // The Read (singular)
     * @return JsonResponse
     */
    public function getOne(Teacher $teacher): JsonResponse    // teacher object had been injected
    {
        return new JsonResponse($teacher->toArray(), Response::HTTP_OK);
    }

    /**                                                                  //  again same for "get all", The route is the way to "get" and display the rest api entry (no function required)
     * @Route("/teachers/", name="get_all_teachers", methods={"GET"})                                // The Read (all)
     */
    public function getAll(): JsonResponse
    {
        $teachers = $this->teacherRepository->findAll();
        $data = [];

        foreach ($teachers as $teacher) {
            $data[] = [
                $teacher->toArray()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/teachers/{id}", name="update_teacher", methods={"PUT"})             // The Update
     * @param Teacher $teacher
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Teacher $teacher, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);


        empty($data['firstName']) ? true : $teacher->setFirstName($data['firstName']);
        empty($data['lastName']) ? true : $teacher->setLastName($data['lastName']);
        empty($data['email']) ? true : $teacher->setEmail($data['email']);

        $address = $teacher->getAddress();                                                                             //if any of he fields are empty then set the new info in that field
        empty($data['address']['street']) ? true : $address->setStreet($data['address']['street']);
        empty($data['address']['streetNumber']) ? true : $address->setStreet($data['address']['streetNumber']);
        empty($data['address']['city']) ? true : $address->setStreet($data['address']['city']);
        empty($data['address']['zipcode']) ? true : $address->setStreet($data['address']['zipcode']);


        $updatedTeacher = $this->teacherRepository->updateTeacher($teacher);

        return new JsonResponse($updatedTeacher->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/teachers/{id}", name="delete_teacher", methods={"DELETE"})         // The Delete
     */
    public function delete(Teacher $teacher): JsonResponse
    {
        $this->teacherRepository->removeTeacher($teacher);

        return new JsonResponse(['status' => 'Teacher has been removed'], Response::HTTP_NO_CONTENT);
    }
}
