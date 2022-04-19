<?php

namespace App\Models;
use CodeIgniter\Model;


class Diagnoses extends Model
{

    protected $table = 'diagnoses';
    protected $primaryKey = 'uid';

    protected $allowedFields = [
        'diagnosis',
        'diag_description',
    ];

}