<?php print view('_header'); ?>
<?php print view('_nav'); ?>


    <div class="container">
        <div class="row">
            <!-- Кнопка "Добавить" -->
            <form action="<?= site_url('cases/delete') ?>" method="post">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">UID</th>
                    <th scope="col">Пациент</th>
                    <th scope="col">Диагноз</th>
                    <th scope="col">Дата открытия</th>
                    <th scope="col">Дата закрытия</th>
                    <!-- Поле для кнопки "Просмотр" -->
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $cases */
                foreach ($cases as $row): ?><tr>
                        <th scope="row"><a href="/cases/<?=$row['case_uid']?>"><?=$row['case_uid']?></a></th>
                        <td><?=$row['full_name']?></td>
                        <td><?=$row['diagnosis_uid']?> <?=$row['diagnosis']?></td>
                        <td><?=$row['open_date']?></td>
                        <td><?=$row['close_date']?></td>
                        <!-- Кнопка "Просмотр" -->
                        <td><?= $row['close_date'] ?
                                '<div class="btn-secondary btn-sm">Закрыто</div>'
                                :
                                view('a_close', ['id' => $row['case_uid']]) ?></td>
                        <td><?=view('btn_del', ['id' => $row['case_uid']])?></td>
                    </tr><?php endforeach; ?>
                </tbody>
            </table>
            </form>
            <?= /** @var $pager */
            $pager->links() ?>
        </div>
    </div>

<?php print view('_footer'); ?>