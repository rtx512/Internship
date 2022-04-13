<?php

namespace App\Dto;

class CellDto
{
    public int $id;

    public string $date;

    public IdNameDto $cabinet;

    public IdNameDto $group;

    public IdNameDto $subject;

    public IdNameDto $teacher;
}