<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\Student\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface StudentSearchResultInterface
 *
 * Adobe\Student\Api\Data
 */
interface StudentSearchResultInterface extends SearchResultsInterface
{
    /**
     * Get Items Method
     *
     * @return \Adobe\Student\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * SetItems Method
     *
     * @param \Adobe\Student\Api\Data\StudentInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
