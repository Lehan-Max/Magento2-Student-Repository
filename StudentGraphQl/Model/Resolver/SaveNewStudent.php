<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\StudentGraphql\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Adobe\Student\Api\StudentRepositoryInterface;

/**
 * Class SaveNewStudent
 *
 * Adobe\StudentGraphql\Model\Resolver
 */
class SaveNewStudent implements ResolverInterface
{
    /**
     * @var StudentRepositoryInterface
     */
    private StudentRepositoryInterface $studentRepository;

    /**
     * SaveNewStudent constructor.
     *
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * SaveNewStudent Resolver
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|Value|mixed
     * @throws GraphQlInputException
     * @throws NoSuchEntityException
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (empty($args['email'])) {
            throw new GraphQlInputException(__('Email field Cannot be Empty.'));
        }
        if (!filter_var($args['email'], FILTER_VALIDATE_EMAIL)) {
            throw new GraphQlInputException(__('Email format in invalid. provide valid email. Ex: johndoe@test.com'));
        }
        if (empty($args['student_marks'])) {
            throw new GraphQlInputException(__('Student Marks field Cannot be Empty.'));
        }
        if (empty($args['student_city'])) {
            throw new GraphQlInputException(__('Student City field Cannot be Empty.'));
        }
        if (empty($args['student_address'])) {
            throw new GraphQlInputException(__('Student Address field Cannot be Empty.'));
        }

        try {
            $student = $this->studentRepository->create();
            $student->setName($args['name']);
            $student->setEmail($args['email']);
            $student->setPhone($args['phone']);
            $student->setStudentMarks($args['student_marks']);
            $student->setStudentCity($args['student_city']);
            $student->getExtensionAttributes()->setStudentAddress($args['student_address']);
            $this->studentRepository->update($student);
        } catch (NoSuchEntityException $exception) {
            throw new NoSuchEntityException(__($exception->getMessage()));
        }

        $studentData[] = [
            'name' => $args['name'],
            'email' => $args['email'],
            'phone' => $args['phone'],
            'student_marks' => $args['student_marks'],
            'student_city' => $args['student_city'],
            'student_address' => $args['student_address']
        ];
        return $studentData;
    }
}
