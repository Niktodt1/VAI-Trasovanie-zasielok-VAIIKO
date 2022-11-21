<?php

namespace App\Models;

class Company extends \App\Core\Model
{
    protected $id;
    protected $CompanyCode;
    protected $CompanyName;
    protected $CompanyDescription;
    protected $Phone;
    protected $Email;
    protected $AdressId;
    protected $IconPath;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCompanyCode()
    {
        return $this->CompanyCode;
    }

    /**
     * @param mixed $CompanyCode
     */
    public function setCompanyCode($CompanyCode): void
    {
        $this->CompanyCode = $CompanyCode;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->CompanyName;
    }

    /**
     * @param mixed $CompanyName
     */
    public function setCompanyName($CompanyName): void
    {
        $this->CompanyName = $CompanyName;
    }

    /**
     * @return mixed
     */
    public function getCompanyDescription()
    {
        return $this->CompanyDescription;
    }

    /**
     * @param mixed $CompanyDescription
     */
    public function setCompanyDescription($CompanyDescription): void
    {
        $this->CompanyDescription = $CompanyDescription;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param mixed $Phone
     */
    public function setPhone($Phone): void
    {
        $this->Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getAdressId()
    {
        return $this->AdressId;
    }

    /**
     * @param mixed $AdressId
     */
    public function setAdressId($AdressId): void
    {
        $this->AdressId = $AdressId;
    }

    /**
     * @throws \Exception
     */
    public function getAllCompanies(): array
    {
        return Company::getAll();
    }

    /**
     * @return mixed
     */
    public function getIconPath()
    {
        return $this->IconPath;
    }

    /**
     * @param mixed $IconPath
     */
    public function setIconPath($IconPath): void
    {
        $this->IconPath = $IconPath;
    }


}