<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\StudentGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Adobe\Student\Api\StudentRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class GetStudentInformation
 *
 * Adobe\StudentGraphQl\Model\Resolver
 */
class GetStudentInformation implements ResolverInterface
{
    /**
     * @var StudentRepositoryInterface
     */
    private StudentRepositoryInterface $studentRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * GetStudentInformation constructor.
     *
     * @param StudentRepositoryInterface $studentRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        StudentRepositoryInterface $studentRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->studentRepository = $studentRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * GetStudentInformation Resolver
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value|mixed|void
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
        try {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $students = $this->studentRepository->getList($searchCriteria)->getItems();
            if (isset($args['student_id'])) {
                $searchCriteria = $this->searchCriteriaBuilder->addFilter('student_id', $args['student_id'])->create();
                $students = $this->studentRepository->getList($searchCriteria)->getItems();
            }
            $studentRecords = [];

            /* foreach loop to get individual Student from list of Students */
            foreach ($students as $student) {
                $studentRecords[] =
                    [
                        'student_id' => $student->getStudentId(),
                        'name' => $student->getName(),
                        'email' => $student->getEmail(),
                        'phone' => $student->getPhone(),
                        'student_address' => $student->getExtensionAttributes()->getStudentAddress(),
                        'student_marks' => $student->getStudentMarks(),
                        'student_city' => $student->getStudentCity()
                    ];
            }
        } catch (NoSuchEntityException $exception) {
            throw new NoSuchEntityException(__($exception->getMessage()));
        }
        return $studentRecords;
    }
}
