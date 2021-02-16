<?php


namespace App\Entity;


use DateTime;

class SearchDataSite
{
    /**
     * @var array
     */
public $campusResearch = [];

    /**
     * @var string
     */
public $keyWords;


    /**
     * @var datetime
     */
public $dateMin;


    /**
     * @var datetime
     */
public $dateMax;

    /**
     * @return array
     */
    public function getCampusResearch(): array
    {
        return $this->campusResearch;
    }

    /**
     * @param array $campusResearch
     */
    public function setCampusResearch(array $campusResearch): void
    {
        $this->campusResearch = $campusResearch;
    }

    /**
     * @return string
     */
    public function getKeyWords(): ?string
    {
        return $this->keyWords;
    }

    /**
     * @param string $keyWords
     */
    public function setKeyWords(string $keyWords=''): void
    {
        $this->keyWords = $keyWords;
    }

    /**
     * @return DateTime
     */
    public function getDateMin(): ?DateTime
    {
        return $this->dateMin;
    }

    /**
     * @param DateTime $dateMin
     */
    public function setDateMin(DateTime $dateMin = null): void
    {
        $this->dateMin = $dateMin;
    }

    /**
     * @return DateTime
     */
    public function getDateMax(): ?DateTime
    {
        return $this->dateMax;
    }

    /**
     * @param DateTime $dateMax
     */
    public function setDateMax(DateTime $dateMax= null): void
    {
        $this->dateMax = $dateMax;
    }




}