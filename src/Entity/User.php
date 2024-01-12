<?php

namespace App\Entity;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    protected string $eMail;
    protected string $password;
    public function __construct()
    {

    }



    public function getEMail(): string
    {
        return $this->eMail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        // TODO: Implement getRoles() method.
        return [] ;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
        return;
    }

    public function getUserIdentifier(): string
    {
        return $this->eMail ;
    }

}