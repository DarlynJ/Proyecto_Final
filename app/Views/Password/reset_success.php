<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Password.email_subject')?><?= $this->endSection() ?>
<?= $this->section('content') ?>


<h1 class="title"><?= lang('Password.email_subject')?></h1>

<p><?= lang('Password.reset_success')?></p>

<p><a class="button" href="<?= site_url("/$locale/login") ?>"><?= lang('Password.login')?></a></p>


<?= $this->endSection() ?>
