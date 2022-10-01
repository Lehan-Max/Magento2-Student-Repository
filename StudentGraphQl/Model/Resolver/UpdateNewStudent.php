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
 * Class UpdateNewStudent
 * Adobe\StudentGraphql\Model\Resolver
 */
class UpdateNewStudent implements ResolverInterface
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
     * UpdateNewStudent Resolver
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
        if (!isset($args['email'])) {
            throw new GraphQlInputException(__('Email field Cannot be Empty.'));
        }
        if (!filter_var($args['email'], FILTER_VALIDATE_EMAIL)) {
            throw new GraphQlInputException(__('Email format in invalid. provide valid email. Ex: johndoe@test.com'));
        }
        if (!isset($args['phone'])) {
            throw new GraphQlInputException(__('Phone field Cannot be Empty.'));
        }
        if (!isset($args['student_marks'])) {
            throw new GraphQlInputException(__('Student Marks field Cannot be Empty.'));
        }
        if (!isset($args['student_city'])) {
            throw new GraphQlInputException(__('Student City field Cannot be Empty.'));
        }
        if (!isset($args['student_address'])) {
            throw new GraphQlInputException(__('Student Address field Cannot be Empty.'));
        }

        $student = $this->studentRepository->load($args['student_id']);
        if ($student['student_id'] == $args['student_id']) {
            $student->setName($args['name']);
            $student->setEmail($args['email']);
            $student->setPhone($args['phone']);
            $student->setStudentMarks($args['student_marks']);
            $student->setStudentCity($args['student_city']);
            $student->getExtensionAttributes()->setStudentAddress($args['student_address']);
            try {
                $this->studentRepository->update($student);
            } catch (NoSuchEntityException $exception) {
                throw new NoSuchEntityException(__($exception->getMessage()));
            }
        } else {
            throw new GraphQlInputException(__('Student doesnt exist.'));
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
