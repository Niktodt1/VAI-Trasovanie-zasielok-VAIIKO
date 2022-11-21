<?php

namespace App\Models;

class Courier extends \App\Core\Model
{
    protected $id;
    protected $Name;
    protected $Surname;
    protected $DeliveryCompanyId;
    protected $Phone;
    protected $Email;
    protected $PicturePath;

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
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->Surname;
    }

    /**
     * @param mixed $Surname
     */
    public function setSurname($Surname): void
    {
        $this->Surname = $Surname;
    }

    /**
     * @return mixed
     */
    public function getDeliverCompanyId()
    {
        return $this->DeliveryCompanyId;
    }

    /**
     * @param mixed $DeliverCompanyId
     */
    public function setDeliverCompanyId($DeliverCompanyId): void
    {
        $this->DeliveryCompanyId = $DeliverCompanyId;
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
    public function getPicturePath()
    {
        return $this->PicturePath;
    }

    /**
     * @param mixed $PicturePath
     */
    public function setPicturePath($PicturePath): void
    {
        $this->PicturePath = $PicturePath;
    }


}