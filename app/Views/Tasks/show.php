<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Tasks.title3') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1  class="title"><?= lang('Tasks.title3') ?></h1>

<a href="<?= site_url("/tasks")?>"> &laquo; <?= lang('Tasks.back') ?></a>

<div class="content">
    <dl>
        <dt class="has-text-weight-bold">ID</dt>
        <dd> <?= $task->id ?> </dd>

        <dt class="has-text-weight-bold"><?= lang('Tasks.description') ?></dt>
        <dd><?= esc($task->description) ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Tasks.created') ?></dt>
        <dd><?= $task->created_at->humanize() ?></dd>

        <dt class="has-text-weight-bold"><?= lang('Tasks.updated') ?></dt>
        <dd><?= $task->updated_at->humanize() ?></dd>  
    </dl>
</div>

<a class="button is-link" href="<?= site_url('/tasks/edit/' . $task->id) ?>"><?= lang('Tasks.edit') ?></a>
<a class="button is-link" href="<?= site_url('/tasks/delete/' . $task->id)?>"><?= lang('Tasks.delete') ?></a>

<?= $this->endSection() ?>