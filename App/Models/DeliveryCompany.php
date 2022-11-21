<?php

namespace App\Models;

class DeliveryCompany extends \App\Core\Model
{
    protected ?int $id = null;
    protected ?string $DeliveryCompanyCode = "";
    protected ?string $DeliveryCompanyDescription = "";
    protected ?int $AdressId = null;
    protected ?string $Phone = "";
    protected ?string $Email = "";
    protected ?string $Website = "";
    protected ?string $FullCompanyName = "";
    protected ?string $IconPath = "";

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFullCompanyName(): ?string
    {
        return $this->FullCompanyName;
    }

    /**
     * @param string $FullCompanyName
     */
    public function setFullCompanyName(string $FullCompanyName): void
    {
        $this->FullCompanyName = $FullCompanyName;
    }


    /**
     * @return string|null
     */
    public function getDeliveryCompanyCode()
    {
        return $this->DeliveryCompanyCode;
    }

    /**
     * @param string $DeliveryCompanyCode
     */
    public function setDeliveryCompanyCode(string $DeliveryCompanyCode): void
    {
        $this->DeliveryCompanyCode = $DeliveryCompanyCode;
    }

    /**
     * @return string|null
     */
    public function getDeliveryCompanyDescription(): ?string
    {
        return $this->DeliveryCompanyDescription;
    }

    /**
     * @param string $DeliveryCompanyDescription
     */
    public function setDeliveryCompanyDescription(string $DeliveryCompanyDescription): void
    {
        $this->DeliveryCompanyDescription = $DeliveryCompanyDescription;
    }

    /**
     * @return int|null
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
     * @return string|null
     */
    public function getPhone(): ?string
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
     * @return string|null
     */
    public function getEmail(): ?string
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
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->Website;
    }

    /**
     * @param string $Website
     */
    public function setWebsite(string $Website): void
    {
        $this->Website = $Website;
    }

    /**
     * @return Adress|null
     * @throws \Exception
     */
    public function getAdress(): ?Adress
    {
        return Adress::getOne($this->getAdressId());
    }


    /**
     * @return string|null
     */
    public function getIconPath(): ?string
    {
        return $this->IconPath;
    }

    /**
     * @param string $IconPath
     */
    public function setIconPath(string $IconPath): void
    {
        $this->IconPath = $IconPath;
    }


}