<?php

namespace App\Models;

use App\Core\Model;

class StageCode extends Model
{
    protected int $id;
    protected string $StageDescription;

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
    public function getStageDescription(): string
    {
        return $this->StageDescription;
    }

    /**
     * @param string $StageDescription
     */
    public function setStageDescription(string $StageDescription): void
    {
        $this->StageDescription = $StageDescription;
    }

}