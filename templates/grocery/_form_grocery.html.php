<?php
    /** @var $post ?\App\Model\Grocery */
?>

<div class="form-group">
    <label for="subject">Title</label>
    <input type="text" id="subject" name="grocery[subject]" value="<?= $post ? $post->getSubject() : '' ?>">
</div>

<div class="form-group">
    <label for="content">Description</label>
    <textarea id="content" name="grocery[content]"><?= $post? $post->getContent() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="content">Release Date</label>
    <input type = "date" id="content" name="grocery[date]"><?= $post? $post->getContent() : '' ?></input>
</div>
<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
