<?php $pager->setSurroundCount(5) ?>

<nav aria-label="Navigation">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" class="page-link">Первая</a>
            </li>

            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link">Предыдущая</a>
            </li>
        <?php endif ?>
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link" ><?= $link['title'] ?></a>
            </li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" class="page-link">Следующая</a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" class="page-link">Последняя</a>
            </li>
        <?php endif ?>
    </ul>
</nav>