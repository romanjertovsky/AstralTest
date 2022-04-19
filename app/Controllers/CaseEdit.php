<?php


namespace App\Controllers;


class CaseEdit extends BaseController
{


    private $sCaseId = null;


    public function __construct()
    {

        $this->sCaseId =
            \Config\Services::request()
            ->getPost(
                'case_id',
                FILTER_SANITIZE_STRING);

    }


    public function delete()
    {

        if(is_null($this->sCaseId)) {

            session()->setFlashdata('message', "Ошибка удаления. Идентификатор не задан.");

        } else {

            model('Cases')->delete($this->sCaseId);
            session()->setFlashdata('message', "Случай $this->sCaseId удалён.");

        }

        return redirect()->to(site_url('cases'));

    }


    public function close()
    {

        if(is_null($this->sCaseId)) {

            session()->setFlashdata('message', "Ошибка закрытия. Идентификатор не задан.");

        } else {


            // Проверки корректности введённых данных
            $aRules = [
                'close_date' => 'required',
                'case_id' => 'required',
                'diagnosis_uid' => 'required',
            ];

            if($this->validate($aRules)) {
            // Данные корректны

                model('Cases')
                    ->update($this->sCaseId,
                    [
                        'diagnosis_uid' =>
                            $this
                                ->request
                                ->getPost('diagnosis_uid', FILTER_SANITIZE_STRING),
                        'close_date' =>
                            $this
                                ->request
                                ->getPost('close_date', FILTER_SANITIZE_STRING),
                    ]);

            } else {
            // Данные некорректны

                session()->setFlashdata(
                    'warnings',
                    implode('<br />', $this->validator->getErrors())
                );

                return redirect()->to(site_url("cases/close/$this->sCaseId"));

            }

            session()->setFlashdata('message', "Случай $this->sCaseId закрыт.");

        }


        return redirect()->to(site_url('cases'));

    }


}