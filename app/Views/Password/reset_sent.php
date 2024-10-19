<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Password.email_subject')?><?= $this->endSection() ?>
<?= $this->section('content') ?>


<h1 class="title"><?= lang('Password.email_subject')?></h1>

<p><?= lang('Password.reset_requested')?></p>


<?= $this->endSection() ?>
