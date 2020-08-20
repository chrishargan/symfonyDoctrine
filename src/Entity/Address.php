<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()             // change this to Embeddable() and delete all traces of id in this class
 */
class Address
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streetnumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipcode;

    /**
     * Address constructor.
     * @param $street
     * @param $streetnumber
     * @param $city
     * @param $zipcode
     */
    public function __construct($street, $streetnumber, $city, $zipcode)
    {
        $this->street = $street;
        $this->streetnumber = $streetnumber;
        $this->city = $city;
        $this->zipcode = $zipcode;
    }


    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getStreetnumber(): ?string
    {
        return $this->streetnumber;
    }

    public function setStreetnumber(string $streetnumber): self
    {
        $this->streetnumber = $streetnumber;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function toArray()
    {
        return [

            'street' => $this->getStreet(),
            'streetNumber' => $this->getStreetnumber(),
            'city' => $this->getCity(),
            'zipcode' => $this->getZipcode()
        ];
    }
}
