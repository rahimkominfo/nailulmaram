<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex justify-center items-center space-x-2">
    <?php if ($pager->hasPrevious()) : ?>
        <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-2xl text-gray-400 hover:bg-green-600 hover:text-white hover:border-green-600 transition shadow-sm">
            <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
        </a>
        <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-2xl text-gray-400 hover:bg-green-600 hover:text-white hover:border-green-600 transition shadow-sm">
            <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <a href="<?= $link['uri'] ?>" class="w-12 h-12 flex items-center justify-center rounded-2xl font-black text-sm transition shadow-sm border <?= $link['active'] ? 'bg-green-600 text-white border-green-600 shadow-green-100' : 'bg-white text-gray-500 border-gray-100 hover:border-green-600 hover:text-green-600' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-2xl text-gray-400 hover:bg-green-600 hover:text-white hover:border-green-600 transition shadow-sm">
            <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
        </a>
        <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-2xl text-gray-400 hover:bg-green-600 hover:text-white hover:border-green-600 transition shadow-sm">
            <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
        </a>
    <?php endif ?>
</nav>
