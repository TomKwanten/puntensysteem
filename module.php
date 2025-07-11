<?php
//module.php
class Module 
{
    private ?int $moduleId;
    private ?int $persoonId;
    private ?int $punt;

    public function __construct(?int $moduleId, ?int $persoonId, ?int $punt)
    {
        $this->moduleId = $moduleId;
        $this->persoonId = $persoonId;
        $this->punt = $punt;
    }

    public static function create(?int $moduleId, ?int $persoonId, ?int $punt): Module
    {
        return new Module($moduleId, $persoonId, $punt);
    }

    public function getModuleId(): ?int 
    {
        return $this->moduleId;
    }

    public function getPersoonId(): ?int 
    {
        return $this->persoonId;
    }

    public function getPunt(): ?int 
    {
        return $this->punt;
    }
}