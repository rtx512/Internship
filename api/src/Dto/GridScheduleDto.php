<?php

namespace App\Dto;

class GridScheduleDto
{
    public int $id;

    public string $date;

    public int $day;

    public CabinetDto $cabinet;

    public GroupDto $group;

    public SubjectDto $subject;

    public TeacherDto $teacher;

    public TimeDto $time;
}