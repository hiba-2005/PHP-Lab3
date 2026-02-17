<?php
declare(strict_types=1);

namespace App\Entity;

use App\Contract\IdentifiableInterface;

abstract class Personne implements IdentifiableInterface
{
    protected ?int $id;
    protected string $nom;
    protected string $email;

    public function __construct(?int $id, string $nom, string $email)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setEmail($email);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("L'ID fourni n'est pas acceptable (valeur positive attendue).");
        }
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $nom = trim($nom);
        if ($nom === '') {
            throw new \InvalidArgumentException("Le nom est requis pour continuer.");
        }
        $this->nom = $nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $email = trim($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("L'adresse électronique fournie n'est pas valide.");
        }
        $this->email = $email;
    }

   
    abstract public function getRole(): string;

    
    public function getLabel(): string
    {
        return $this->getRole() . " : " . $this->nom . " <" . $this->email . ">";
    }
}