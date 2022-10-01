<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\Student\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Student
 *
 * Adobe\Student\Model\ResourceModel
 */
class Student extends AbstractDb
{
    /**
     * Student ResourceModel constructor.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('student_details', 'student_id');
    }
}
