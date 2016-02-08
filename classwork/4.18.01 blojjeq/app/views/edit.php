<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 25.01.16
 * Time: 21:24
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blojjeq</title>
</head>
<body>
<?php $flashMessages = flushFlashMessages(); ?>

<?php foreach ($flashMessages as $type => $messages): ?>
    <div class="<?= $type ?>">
        <?php foreach ($messages as $text) : ?>
            <p><?= $text ?></p>
        <?php endforeach ?>
    </div>
<?php endforeach; ?>

<form method="post">
    <div>
        <div class="error"><?= e($errors, 'title') ?></div>
        <label for="post-title">Title</label>
        <input id="post-title" name="post[title]" type="text" value="<?= e($post, 'title') ?>">
    </div>
    <div>
        <div class="error"><?= e($errors, 'content') ?></div>
        <label for="post-content">Content</label>
        <textarea name="post[content]" id="post-content"><?= e($post, 'content') ?></textarea>
    </div>
    <?php  if (isset($post['id'])): ?>
        <div>
            <input type="hidden" name="post[id]" value="<?= e($post, 'id') ?>">
        </div>
    <?php endif; ?>
    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>

