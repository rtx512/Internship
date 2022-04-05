<?php

namespace App\Dto;

class GridScheduleDto
{
    public int $id;

    public string $date;

    public int $day;

    public CabinetDto $cabinetID;

    public GroupDto $groupID;

    public SubjectDto $subjectID;

    public TeacherDto $teacherID;

    public TimeDto $timeID;
}