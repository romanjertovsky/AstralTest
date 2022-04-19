<?php


namespace App\Controllers;


class Cases extends BaseController
{


    public function casesAll()
    {


        $oModel = model('ViewCases');

        $aData = [
            'cases'  => $oModel
                ->paginate(
                    env('RowsPerPage')
                ),
            'pager'     => $oModel->pager,
        ];

        // Сокращение И.О. и помещение в массив по индексу full_name
        foreach ($aData['cases'] as $key => $val) {

            $aData['cases'][$key]['full_name'] =
                $aData['cases'][$key]['surname'] . ' ' .
                (isset($aData['cases'][$key]['first_name']) ?
                    substr($aData['cases'][$key]['first_name'], 0, 1) . '.' : ''
                ) .
                (isset($aData['cases'][$key]['patronymic']) ?
                    substr($aData['cases'][$key]['patronymic'], 0, 1) . '.' : ''
                );

        }

        return view('pages/CasesAll', $aData);


    }


    public function caseClose(string $sCaseId)
    {

        $aData = model('ViewCases')
            ->where(['case_uid' => $sCaseId])
            ->first();

        if(empty($aData)) {
            session()->setFlashdata('message', "Случая с идентификатором $sCaseId не существует.");
            return redirect()->to('/cases');
        }

        $aOptions = model('Diagnoses')
            ->select('uid, diagnosis')
            ->orderBy('uid')
            ->findAll();

        // options для select
        $aData['options'][''] = ' '; // Пустой вариант
        foreach ($aOptions as $val)
            $aData['options'][$val['uid']] = "${val['uid']} ${val['diagnosis']}";

        $aData['warnings'] = session()->getFlashdata('warnings');

        helper('form');
        return view('pages/CaseClose', $aData);

    }


    public function caseEdit(string $sCaseId = null) // TODO
    {

        $aData = [];

        if(is_null($sCaseId)){
        // $sCaseId - пустой, пустая форма для добавления случая



        } else {
        // $sCaseId - задан, форма редактирования заданного случая

            $oModel = model('ViewCases');

            $aData = $oModel
                ->where(['case_uid' => $sCaseId])
                ->first();

            if(empty($aData)) {
                session()->setFlashdata('message', "Случая с идентификатором $sCaseId не существует.");
                return redirect()->to('/cases');
            }


        }

        return view('pages/CaseForm', $aData);

    }


}