<?php print view('_header'); ?>
<?php print view('_nav'); ?>
<?php
/**
 * @var string $warnings
 * @var string $case_uid
 * @var string $surname
 * @var string $first_name
 * @var string $patronymic
 * @var string $open_date
 * @var string $options
 * @var string $diagnosis_uid
 */

?>

<div class="container">
    <div class="row">
        <a class="btn btn-primary btn-sm" href="<?= site_url('cases') ?>" role="button">Назад</a>

        <h1>Закрытие случая: <?= $case_uid ?></h1>
        <div class="col-6 p-2">
            <?php if(isset($warnings)): ?>
            <div class="alert alert-warning" role="alert">
                <?= $warnings ?>
            </div>
            <?php endif; ?>
            <form action="<?= site_url('cases/close') ?>" method="post">
                <div class="input-group mb-2">
                    <label for="case_uid" class="input-group-text bg-secondary">ID</label>
                    <input type="text" class="form-control bg-secondary" id="case_uid" value="<?= $case_uid ?>" name="case_uid" readonly>
                </div>
                <div class="input-group mb-2">
                    <label for="full_name" class="input-group-text bg-secondary">Пациент</label>
                    <input type="text" class="form-control bg-secondary" id="full_name" value="<?= "$surname $first_name $patronymic" ?>" name="full_name" readonly>
                </div>
                <div class="input-group mb-2">
                    <label for="open_date" class="input-group-text bg-secondary">Дата открытия</label>
                    <input type="date" class="form-control bg-secondary" id="open_date" value="<?= $open_date ?>" name="open_date" readonly>
                </div>
                <div class="input-group mb-2">
                    <label for="diagnosis_uid" class="input-group-text">Диагноз*</label>
                    <?=form_dropdown(
                            'diagnosis_uid',
                            $options,
                            $diagnosis_uid,
                            ['class' => 'form-select', 'id' => 'diagnosis_uid'])?>
                </div>
                <div class="input-group mb-2">
                    <label for="close_date" class="input-group-text">Дата закрытия*</label>
                    <input type="date" class="form-control" id="close_date" value="" name="close_date">
                </div>
                <?=view('btn_close', ['id' => ($case_uid ?? '')])?>
            </form>
        </div>
    </div>
</div>

<?php print view('_footer'); ?>