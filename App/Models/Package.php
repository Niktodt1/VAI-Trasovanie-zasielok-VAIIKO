<?php

namespace App\Models;

use DateTime;

class Package extends \App\Core\Model
{
    protected $id;
    protected $ReceiverUserId;
    protected $CompanyId;
    protected $DateOfOrder;
    protected $DeliveryCompanyId;
    protected $Received;
    protected $CourierId;
    protected $TypeOfDelivery;

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
    public function getReceiverUserId()
    {
        return $this->ReceiverUserId;
    }

    /**
     * @param mixed $ReceiverUserId
     */
    public function setReceiverUserId($ReceiverUserId): void
    {
        $this->ReceiverUserId = $ReceiverUserId;
    }

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->CompanyId;
    }

    /**
     * @param mixed $CompanyId
     */
    public function setCompanyId($CompanyId): void
    {
        $this->CompanyId = $CompanyId;
    }

    /**
     * @return mixed
     */
    public function getDateOfOrder()
    {
        return $this->DateOfOrder;
    }

    /**
     * @param mixed $DateOfOrder
     */
    public function setDateOfOrder($DateOfOrder): void
    {
        $this->DateOfOrder = $DateOfOrder;
    }

    /**
     * @return mixed
     */
    public function getDeliveryCompanyId()
    {
        return $this->DeliveryCompanyId;
    }

    /**
     * @param mixed $DeliveryCompanyId
     */
    public function setDeliveryCompanyId($DeliveryCompanyId): void
    {
        $this->DeliveryCompanyId = $DeliveryCompanyId;
    }

    /**
     * @return mixed
     */
    public function getReceived()
    {
        return $this->Received;
    }

    /**
     * @param mixed $Received
     */
    public function setReceived($Received): void
    {
        $this->Received = $Received;
    }

    /**
     * @return mixed
     */
    public function getCourierId()
    {
        return $this->CourierId;
    }

    /**
     * @param mixed $CourierId
     */
    public function setCourierId($CourierId): void
    {
        $this->CourierId = $CourierId;
    }

    /**
     * @return mixed
     */
    public function getTypeOfDelivery()
    {
        return $this->TypeOfDelivery;
    }

    /**
     * @param mixed $TypeOfDelivery
     */
    public function setTypeOfDelivery($TypeOfDelivery): void
    {
        $this->TypeOfDelivery = $TypeOfDelivery;
    }

    /**
     * @throws \Exception
     * @return User
     */
    public function getUser() {
        return User::getOne($this->getReceiverUserId());
    }

    /**
     * @throws \Exception
     * @return Company
     */
    public function getCompany() {
        return Company::getOne($this->getCompanyId());
    }

    /**
     * @throws \Exception
     * @return Adress
     */
    public function getAdress() {
        return Adress::getOne($this->getUser()->getAdressId());
    }

    /**
     * @throws \Exception
     * @return Courier
     */
    public function getCourier() {

        return Courier::getOne($this->getCourierId());
    }

    /**
     * @throws \Exception
     * @return DeliveryCompany
     */
    public function getDeliveryCompany() {

        return DeliveryCompany::getOne($this->getDeliveryCompanyId());
    }

    /**
     * @return Stage[]
     *@throws \Exception
     */
    public function getAllStagesAscending() {

        return Stage::getAll("PackageId = ?",[$this->getId()],"DateTime ASC");
    }


}