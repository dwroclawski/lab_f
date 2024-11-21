<?php

/** @var \App\Model\Grocery $post */
/** @var \App\Service\Router $router */

$title = "Edit Grocery {$post->getSubject()} ({$post->getId()})";
$bodyClass = "edit";

ob_start(); ?>
    <h1><?= $title ?></h1>
    <form action="<?= $router->generatePath('grocery-edit') ?>" method="grocery" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . '_form_grocery.html.php'; ?>
        <input type="hidden" name="action" value="grocery-edit">
        <input type="hidden" name="id" value="<?= $post->getId() ?>">
    </form>

    <ul class="action-list">
        <li>
            <a href="<?= $router->generatePath('post-index') ?>">Back to list</a></li>
        <li>
            <form action="<?= $router->generatePath('grocery-delete') ?>" method="grocery">
                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                <input type="hidden" name="action" value="grocery-delete">
                <input type="hidden" name="id" value="<?= $post->getId() ?>">
            </form>
        </li>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
