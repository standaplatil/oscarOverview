<?php

namespace classes;

class Oscar
{
    public string $year;
    public string $name;
    public string $age;
    public string $movie;

    public function __construct($year, $name, $age, $movie) {
        $this->year = $year;
        $this->name = $name;
        $this->age = $age;
        $this->movie = $movie;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age): void
    {
        $this->age = $age;
    }

    public function getMovie(): string
    {
        return $this->movie;
    }

    public function setMovie(string $movie): void
    {
        $this->movie = $movie;
    }
}