<?php

namespace App\Models;

class Adress extends \App\Core\Model
{
    protected int $id;
    protected string $City;
    protected string $ZipCode;
    protected string $Street;
    protected int $StreetNumber;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     */
    public function setCity(string $City): void
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->ZipCode;
    }

    /**
     * @param string $ZipCode
     */
    public function setZipCode(string $ZipCode): void
    {
        $this->ZipCode = $ZipCode;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->Street;
    }

    /**
     * @param string $Street
     */
    public function setStreet(string $Street): void
    {
        $this->Street = $Street;
    }

    /**
     * @return int
     */
    public function getStreetNumber(): int
    {
        return $this->StreetNumber;
    }

    /**
     * @param int $StreetNumber
     */
    public function setStreetNumber(int $StreetNumber): void
    {
        $this->StreetNumber = $StreetNumber;
    }


}