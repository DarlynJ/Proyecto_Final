<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Userr.title2') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1 class="title" ><?= lang('Userr.title2') ?></h1>
<div class="container">
<?php if (session()->has('errors')): ?>

    <ul>
        <?php foreach(session('errors') as $error):?>
            <li><?= $error ?></li>
        <?php endforeach;?>  
    </ul>
<?php endif ?>

<?= form_open("/admin/users/create") ?>

    <?= $this->include('Admin/Users/form') ?>
    <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary"><?= lang('Userr.save') ?></button>
            </div>
            <div class="control">
                <a class="button" href="<?= site_url("/admin/users")?>"><?= lang('Userr.cancel') ?></a>
            </div>
    </div>
</form>
</div>
<?= $this->endSection() ?>
