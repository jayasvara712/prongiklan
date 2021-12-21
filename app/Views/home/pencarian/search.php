<?= $this->extend("layout/home"); ?>
<?= $this->section('content')  ?>
<?= $this->include("home/searchbox") ?>
<?= $this->include("home/pencarian/searchresult") ?>
<?= $this->endsection()  ?>