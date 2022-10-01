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

/**
 * Class DeleteStudentById
 *
 * Adobe\StudentGraphQl\Model\Resolver
 */
class DeleteStudentById implements ResolverInterface
{
    /**
     * @var StudentRepositoryInterface
     */
    private StudentRepositoryInterface $studentRepository;

    /**
     * GetStudentInformation constructor.
     *
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(
        StudentRepositoryInterface $studentRepository
    ) {
        $this->studentRepository = $studentRepository;
    }

    /**
     * DeleteStudentById Resolver
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
        if (empty($args['student_id'])) {
            throw new GraphQlInputException(__('Student id must be Specified'));
        }
        try {
            $deleteStatus = $this->studentRepository->deleteById($args['student_id']);
            if ($deleteStatus) {
                $status[] = [
                    'status' => $deleteStatus,
                    'message' => 'Record with StudentId ' . $args['student_id'] . ' deleted successfully!!'
                ];
            } else {
                $status[] = [
                'status' => $deleteStatus,
                'message' => 'Record with StudentId ' . $args['student_id'] . ' doesnt exist'
                ];
            }
        } catch (NoSuchEntityException $exception) {
            throw new NoSuchEntityException(__($exception->getMessage()));
        }
        return $status;
    }
}
