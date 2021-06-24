<?php


class Country
{
    public string $name;
    public int $goldMedals;
    public int $silverMedals;
    public int $bronzeMedals;
    public int $totalMedals;

    /**
     * Country constructor.
     * @param string $name
     * @param int $goldMedals
     * @param int $silverMedals
     * @param int $bronzeMedals
     */
    public function __construct(string $name, int $goldMedals, int $silverMedals, int $bronzeMedals)
    {
        $this->name = $name;
        $this->goldMedals = $goldMedals;
        $this->silverMedals = $silverMedals;
        $this->bronzeMedals = $bronzeMedals;
        $this->totalMedals = $this->goldMedals + $this->silverMedals + $this->bronzeMedals;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getGoldMedals(): int
    {
        return $this->goldMedals;
    }

    public function setGoldMedals(int $goldMedals): void
    {
        $this->goldMedals = $goldMedals;
    }

    public function getSilverMedals(): int
    {
        return $this->silverMedals;
    }

    public function setSilverMedals(int $silverMedals): void
    {
        $this->silverMedals = $silverMedals;
    }

    public function getBronzeMedals(): int
    {
        return $this->bronzeMedals;
    }

    public function setBronzeMedals(int $bronzeMedals): void
    {
        $this->bronzeMedals = $bronzeMedals;
    }

    public function getTotalMedals(): int
    {
        return $this->totalMedals;
    }





}