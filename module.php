<?php
//module.php

//blauwdruk module

class Module {
    private ?int $id;
    private ?string $naam;
    private ?int $prijs;

    public function __construct( ?int $id, ?string $naam, ?int $prijs) {
        $this->id = $id;
        $this->naam = $naam;
        $this->prijs = $prijs;
    }

    public function getIdModule(): ?int
    {
        return $this->id;
        //waarde wordt teruggestuurd
    }

    public function getNaam(): ?string
    {
        return $this->naam;
        //waarde wordt teruggestuurd
    }
}
?>