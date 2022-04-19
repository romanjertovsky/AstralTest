<?php

namespace App\Models;
use CodeIgniter\Model;


class Cases extends Model
{

    protected $table = 'cases';
    protected $primaryKey = 'uid';

    protected $allowedFields = [
        'patient_id',
        'diagnosis_uid',
        'open_date',
        'close_date',
    ];

}