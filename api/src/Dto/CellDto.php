<?php

namespace App\Dto;

class CellDto
{
    public int $id;

    public string $date;

    public CabinetDto $cabinet;

    public GroupDto $group;

    public SubjectDto $subject;

    public TeacherDto $teacher;
}