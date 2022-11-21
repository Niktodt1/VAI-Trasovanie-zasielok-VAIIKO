<?php

namespace App\Models;

class User extends \App\Core\Model
{
    protected int $id;
    protected ?string $Username;
    protected ?string $Password;
    protected string $Name;
    protected string $Surname;
    protected int $AdressId;
    protected string $email;
    protected string $phone;
    protected int $isRegistered;

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
    public function getUsername(): string
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     */
    public function setUsername(string $Username): void
    {
        $this->Username = $Username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->Surname;
    }

    /**
     * @param string $Surname
     */
    public function setSurname(string $Surname): void
    {
        $this->Surname = $Surname;
    }

    /**
     * @return int
     */
    public function getAdressId(): int
    {
        return $this->AdressId;
    }

    /**
     * @param int $AdressId
     */
    public function setAdressId(int $AdressId): void
    {
        $this->AdressId = $AdressId;
    }

    /**
     * @return int
     */
    public function isIsRegistered(): int
    {
        return $this->isRegistered;
    }

    /**
     * @param int $isRegistered
     */
    public function setIsRegistered(int $isRegistered): void
    {
        $this->isRegistered = $isRegistered;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }


}