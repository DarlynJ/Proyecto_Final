<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= lang('Profile.title5') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>



<h1 class="title"><?= lang('Profile.title5') ?></h1>
<div class="content">
<p><?= lang('Profile.areyou') ?></p>

<?= form_open("/profileimage/delete")?>

<div class="field is-grouped">
        <div class="control">
            <button class="button is-primary"><?= lang('Profile.yes') ?></button>
        </div>
        <div class="control">
            <a  class="button" href="<?= site_url("/profile/show")?>"><?= lang('Profile.cancel') ?></a>
        </div>
</div>

</form>
</div>
<?= $this->endSection() ?>
