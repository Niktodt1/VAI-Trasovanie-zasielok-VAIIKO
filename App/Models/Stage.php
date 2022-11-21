<?php

namespace App\Models;

use App\Core\Model;
use Exception;

class Stage extends Model
{
    protected int $id;
    protected mixed $Datetime;
    protected int $PackageId;
    protected int $StageCurrentId;
    protected string $LastSeen;
    protected string $EstTimeOFDelivery;

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
     * @return mixed
     */
    public function getDatetime(): mixed
    {
        return $this->Datetime;
    }

    /**
     * @param mixed $Datetime
     */
    public function setDatetime(mixed $Datetime): void
    {
        $this->Datetime = $Datetime;
    }

    /**
     * @return int
     */
    public function getPackageId(): int
    {
        return $this->PackageId;
    }

    /**
     * @param int $PackageId
     */
    public function setPackageId(int $PackageId): void
    {
        $this->PackageId = $PackageId;
    }

    /**
     * @return int
     */
    public function getStageCurrentId(): int
    {
        return $this->StageCurrentId;
    }

    /**
     * @param int $StageCurrentId
     */
    public function setStageCurrentId(int $StageCurrentId): void
    {
        $this->StageCurrentId = $StageCurrentId;
    }


    /**
     * @return string
     */
    public function getEstTimeOFDelivery(): string
    {
        return $this->EstTimeOFDelivery;
    }

    /**
     * @param string $EstTimeOFDelivery
     */
    public function setEstTimeOFDelivery(string $EstTimeOFDelivery): void
    {
        $this->EstTimeOFDelivery = $EstTimeOFDelivery;
    }

    /**
     * @return string
     */
    public function getLastSeen(): string
    {
        return $this->LastSeen;
    }

    /**
     * @param string $LastSeen
     */
    public function setLastSeen(string $LastSeen): void
    {
        $this->LastSeen = $LastSeen;
    }

    /**
     * @throws Exception
     */
    public function getDescription(int $stageCurrentid): ?StageCode
    {
        return StageCode::getOne($stageCurrentid);
    }

    /**
     * @param int $stageid
     * @return string
     * @throws Exception
     */
    public function getLastSeenById(int $stageid): string
    {
        return Stage::getOne($stageid)->getLastSeen();
    }


}