<?= $this->extend("layout/home"); ?>
<?= $this->section('content')  ?>
    <?= $this->include("home/profile-user/profiles") ?>
<?= $this->endsection()  ?>