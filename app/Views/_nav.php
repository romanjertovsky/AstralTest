<?php
    $active = service('uri')->getSegment(1);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link<?=(empty($active)?' active bg-secondary rounded': '')?>"
                       href="<?= site_url() ?>"
                       title="Страница со списком пациентов"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom">Пациенты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?=($active == 'cases' ? ' active bg-secondary rounded': '')?>"
                       href="<?= site_url('cases') ?>"
                       title="Страница со списком случаев"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom">Случаи</a>
                </li>
                <?php if(!is_null(session()->getFlashdata('message'))): ?>
                <li class="nav-item">
                    <div class="nav-link active bg-success rounded ms-3"><?= session()->getFlashdata('message') ?></div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>