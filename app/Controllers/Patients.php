<?php

namespace App\Controllers;

class Patients extends BaseController
{


    public function patientsAll()
    {

        $oModel = model('Patients');

        $aData = [
            'patients'  => $oModel
                ->orderBy('patient_id')
                ->paginate(
                    env('RowsPerPage')
                ),
            'pager'     => $oModel->pager,
        ];

        return view('pages/Patients', $aData);

    }


}
