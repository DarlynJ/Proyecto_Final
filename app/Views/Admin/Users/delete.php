<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Userr.title5') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1 class="title"><?= lang('Userr.title5') ?></h1>
<p><?= lang('Userr.areyou') ?></p>

<?= form_open("/admin/users/delete/" . $user->id)?>

<div class="field is-grouped mt-4">
            <div class="control">
                <button class="button is-primary" ><?= lang('Userr.yes') ?></button>
            </div>
            <div class="control">
                <a class="button" href="<?= site_url('/admin/users/show/' . $user->id)?>"><?= lang('Userr.cancel') ?></a>
            </div>
</div>

</form>

<?= $this->endSection() ?>
