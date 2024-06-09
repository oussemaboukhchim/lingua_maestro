<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ContactUs
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/^\+216[2459][0-9]{7}$/",
     *     message="Veuillez entrer un numéro de téléphone valide pour la Tunisie."
     * )
     */
    private $phoneNumber;
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
}
