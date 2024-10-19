<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Tasks.title5') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1 class="title"><?= lang('Tasks.title5') ?></h1>
<div class="container">
<p><?= lang('Tasks.areyou') ?></p>

<?= form_open("/tasks/delete/" . $task->id)?>

<div class="field is-grouped mt-4">
        <div class="control">
            <button class="button is-primary"><?= lang('Tasks.yes') ?></button>
        </div>
        <div class="control">
            <a class="button" href="<?= site_url('/tasks/show/' . $task->id)?>"><?= lang('Tasks.cancel') ?></a>
        </div>
</div>

</form>
</div>
<?= $this->endSection() ?>
