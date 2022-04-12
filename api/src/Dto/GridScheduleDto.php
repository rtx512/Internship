<?php

namespace App\Dto;

class GridScheduleDto
{
    public int $id;

    public string $date;

    public int $day;

    public IdNameDto $cabinet;

    public IdNameDto $group;

    public IdNameDto $subject;

    public IdNameDto $teacher;

    public IdNameDto $time;
}