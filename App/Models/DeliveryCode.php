<?php

namespace App\Models;

use App\Core\Model;

class DeliveryCode extends \App\Core\Model
{
    protected int $id;
    protected string $DeliveryText;

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
    public function getDeliveryText(): string
    {
        return $this->DeliveryText;
    }

    /**
     * @param string $DeliveryText
     */
    public function setDeliveryText(string $DeliveryText): void
    {
        $this->DeliveryText = $DeliveryText;
    }




}