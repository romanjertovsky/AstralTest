<?php print view('_header'); ?>
<?php print view('_nav'); ?>

<div class="container">
    <div class="row">

        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Пол</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Дата смерти</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var array $patients */
            foreach ($patients as $val): ?>
            <tr>
                <th scope="row"><?=$val['patient_id']?></th>
                <td><?=$val['surname']?></td>
                <td><?=$val['first_name']?></td>
                <td><?=$val['patronymic']?></td>
                <td><?=$val['gender']?></td>
                <td><?=$val['birth_date']?></td>
                <td><?=$val['death_date']?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


        <?= /** @var $pager */
        $pager->links() ?>
    </div>
</div>

<?php print view('_footer'); ?>