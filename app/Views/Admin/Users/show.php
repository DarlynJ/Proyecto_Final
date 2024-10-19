<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Userr.title3') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1 class="title"><?= lang('Userr.title3') ?></h1>

<a href="<?= site_url("/admin/users")?>"> &laquo; <?= lang('Userr.back') ?> </a>

<div class="content">
    <dl>
        <dt class="has-text-weight-bold"><?= lang('Userr.name') ?></dt>
        <dd><?= esc($user->name) ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Userr.email') ?></dt>
        <dd><?= esc($user->email) ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Userr.active') ?></dt>
        <dd><?= $user->is_active ? 'yes' : 'no' ?></dd>


        <dt class="has-text-weight-bold"><?= lang('Userr.administrator') ?></dt>
        <dd><?= $user->is_admin ? 'yes': 'no' ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Userr.created') ?></dt>
        <dd><?= $user->created_at ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Userr.updated') ?></dt>
        <dd><?= $user->updated_at ?></dd>
    </dl>
</div>


<a  class="button is-link" href="<?= site_url('/admin/users/edit/' . $user->id) ?>"><?= lang('Userr.edit') ?></a>

<?php if ($user->id != current_user()->id): ?>
    <a  class="button is-link" href="<?= site_url('/admin/users/delete/' . $user->id)?>"><?= lang('Userr.delete') ?></a>
<?php endif; ?>
<?= $this->endSection() ?>