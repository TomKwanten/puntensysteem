<?php
//Persoon.php

//blauwdruk persoon

class Persoon
{
    private ?int $id;
    private ?string $familienaam;
    private ?string $voornaam;
    private ?DateTime $geboortedatum;
    private ?string $geslacht;

    public function __construct(?int $id, ?string $familienaam, ?string $voornaam, 
    ?DateTime $geboortedatum, ?string $geslacht) {
        $this->id = $id;
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->geboortedatum = $geboortedatum;
        $this->geslacht = $geslacht;
    }

    public function getIdPersoon(): ?int
    {
        return $this->id;
        //waarde wordt teruggestuurd
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
        //waarde wordt teruggestuurd
    }

    public function getFamilienaam(): ?string
    {
        return $this->familienaam;
        //waarde wordt teruggestuurd
    }
}