<?php


namespace App\Entity;


use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type("\DateTimeInterface")
     * @Assert\GreaterThanOrEqual("today UTC",
     *     message="La date doit être supérieure à la date du jour")
     * @var datetime
     */
public $dateMin;


    /**
     * @Assert\Type("\DateTimeInterface")
     * @Assert\Expression(
     *     "this.getDateMin() < this.getDateMax()",
     *     message="La date de fin ne doit pas être antérieure à la date du début"
     * )
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