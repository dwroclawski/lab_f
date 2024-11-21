<?php

/** @var \App\Model\Grocery $post */
/** @var \App\Service\Router $router */

$title = 'Create grocery';
$bodyClass = "edit";

ob_start(); ?>
    <h1>Create New</h1>
    <form action="<?= $router->generatePath('grocery-create') ?>" method="grocery" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . '_form_grocery.html.php'; ?>
        <input type="hidden" name="action" value="grocery-create">
    </form>

    <a href="<?= $router->generatePath('grocery-index') ?>">Back to list</a>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
