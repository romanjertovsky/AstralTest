<?php

namespace App\Models;
use CodeIgniter\Model;


class Patients extends Model
{

    protected $table = 'patients';
    protected $primaryKey = 'patient_id';

    protected $allowedFields = [
        'surname',
        'first_name',
        'patronymic',
        'gender',
        'birth_date',
        'death_date',
    ];


}