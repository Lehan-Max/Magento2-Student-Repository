<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\Student\Model;

use Adobe\Student\Api\Data\StudentInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Adobe\Student\Model\ResourceModel\Student as ResourceModel;

/**
 * Class Student
 *
 * Adobe\Student\Model
 */
class Student extends AbstractExtensibleModel implements StudentInterface
{
    /**
     * Student Constructor.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get Student by id Method
     *
     * @inerhitDoc
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->getData(self::STUDENT_ID);
    }

    /**
     * Get Name Method
     *
     * @inerhitDoc
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Student by id Method
     *
     * @param int $studentId
     * @return \Adobe\Student\Api\Data\StudentInterface
     */
    public function setStudentId(int $studentId): StudentInterface
    {
        return $this->setData(self::STUDENT_ID, $studentId);
    }

    /**
     * Set Name Method
     *
     * @param string $name
     * @return \Adobe\Student\Api\Data\StudentInterface
     */
    public function setName(string $name): StudentInterface
    {
        return $this->setData(self::NAME, $name);
    }
    /**
     * Get Email Method
     *
     * @inerhitDoc
     */
    public function getEmail(): string
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email Method
     *
     * @param string $email
     * @return \Adobe\Student\Api\Data\StudentInterface
     */
    public function setEmail(string $email): StudentInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Phone Method
     *
     * @inerhitDoc
     */
    public function getPhone(): string
    {
        return $this->getData(self::PHONE);
    }

    /**
     * Set Phone Method
     *
     * @param string $phone
     * @return \Adobe\Student\Api\Data\StudentInterface
     */
    public function setPhone(string $phone): StudentInterface
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get Student City Method
     *
     * @inerhitDoc
     */
    public function getStudentCity(): string
    {
        return $this->getData(self::CITY);
    }

    /**
     * Set Student City Method
     *
     * @param string $city
     * @return \Adobe\Student\Api\Data\StudentInterface
     */
    public function setStudentCity(string $city): StudentInterface
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get Student Marks Method
     *
     * @inerhitDoc
     */
    public function getStudentMarks(): string
    {
        return $this->getData(self::MARKS);
    }

    /**
     * Set Student Marks Method
     *
     * @param string $marks
     * @return StudentInterface
     */
    public function setStudentMarks(string $marks): StudentInterface
    {
        return $this->setData(self::MARKS, $marks);
    }

    /**
     * Get Extension Attributes Method
     *
     * @return \Adobe\Student\Api\Data\StudentExtensionInterface|\Magento\Framework\Api\ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set Extension Attributes Method
     *
     * @param \Adobe\Student\Api\Data\StudentExtensionInterface $extensionAttributes
     * @return Student|mixed
     */
    public function setExtensionAttributes(\Adobe\Student\Api\Data\StudentExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
