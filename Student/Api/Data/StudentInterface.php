<?php
/**
 * Copyright © Lehan, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\Student\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface StudentInterface
 *
 * Adobe\Student\Api\Data
 */
interface StudentInterface extends ExtensibleDataInterface
{
    const STUDENT_ID = 'student_id';
    const NAME  = 'name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const CITY  = 'student_city';
    const MARKS = 'student_marks';

    /**
     * Get Student By id
     *
     * @return int
     */
    public function getStudentId(): int;

    /**
     * Set Student by id
     *
     * @param int $studentId
     * @return $this
     */
    public function setStudentId(int $studentId): StudentInterface;

    /**
     * Get Name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): StudentInterface;

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): StudentInterface;

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone(): string;

    /**
     * Set Phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone): StudentInterface;

    /**
     * Get Student City
     *
     * @return string
     */
    public function getStudentCity(): string;

    /**
     * Set Student City
     *
     * @param string $phone
     * @return $this
     */
    public function setStudentCity(string $phone): StudentInterface;

    /**
     * Get Student Marks
     *
     * @return string
     */
    public function getStudentMarks(): string;

    /**
     * Set Student Marks
     *
     * @param string $phone
     * @return $this
     */
    public function setStudentMarks(string $phone): StudentInterface;

    /**
     * Get ExtensionAttributes
     *
     * @return \Adobe\Student\Api\Data\StudentExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * Set Extension Attributes
     *
     * @param \Adobe\Student\Api\Data\StudentExtensionInterface $extensionAttribute
     * @return mixed
     */
    public function setExtensionAttributes(\Adobe\Student\Api\Data\StudentExtensionInterface $extensionAttribute);
}
