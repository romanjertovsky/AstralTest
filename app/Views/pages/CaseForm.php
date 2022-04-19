<?php print view('_header'); ?>
<?php print view('_nav'); ?>


<div class="container">
    <div class="row">

        <a class="btn btn-primary btn-sm" href="<?= site_url('cases')?>" role="button">Назад</a>
ФОРМА случай


        <?php
        print_r(($case_uid ?? ''));
        ?>



        <?=view('btn_close', ['id' => ($case_uid ?? '')])?>

        <?php if (isset($case_uid)):?>
        <form action="<?= site_url('cases/delete') ?>" method="post">
            <?=view('btn_del', ['id' => ($case_uid ?? '')])?>
        </form>
        <?php endif; ?>
    </div>
</div>



<?php print view('_footer'); ?>