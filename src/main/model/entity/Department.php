<?php

class Department
{
    private string $xmlId;

    private ?string $parentXmlId;

    private string $nameDepartment;

    /**
     * @return string
     */
    public function getXmlId(): string
    {
        return $this->xmlId;
    }

    /**
     * @param string $xmlId
     */
    public function setXmlId(string $xmlId): void
    {
        $this->xmlId = $xmlId;
    }

    /**
     * @return ?string
     */
    public function getParentXmlId(): ?string
    {
        return $this->parentXmlId;
    }

    /**
     * @param ?string $parentXmlId
     */
    public function setParentXmlId(?string $parentXmlId): void
    {
        $this->parentXmlId = $parentXmlId;
    }

    /**
     * @return string
     */
    public function getNameDepartment(): string
    {
        return $this->nameDepartment;
    }

    /**
     * @param string $nameDepartment
     */
    public function setNameDepartment(string $nameDepartment): void
    {
        $this->nameDepartment = $nameDepartment;
    }
}