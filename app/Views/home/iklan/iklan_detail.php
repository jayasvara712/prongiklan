<?= $this->extend("layout/home"); ?>
<?= $this->section('content')  ?>

<div class="row iklan-detail">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#"><?= $iklan->judul_kategori ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $iklan->judul_subkategori ?></li>
        </ol>
    </nav>
    <div class="col-lg-8 col-sm-12">
        <!-- Slider gambar iklan -->
        <div class="card">
            <?= $this->include("home/iklan/component/iklan_slider"); ?>
        </div>
        <div class="card card-iklan-detail">
            <div class="card-body">
                <h2 class="title">Detail</h2>
                <div class="row">
                    <div class="col-6">
                        <p>Kategori : <?= $iklan->judul_kategori ?></p>
                        <p>Subkategori : <?= $iklan->judul_subkategori ?></p>
                    </div>
                </div>
            </div>
            <hr class="my-2">
            <div class="card-body">
                <h2 class="title">Deskripsi</h2>
                <p><?= $iklan->deskripsi_iklan ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="card card-harga-iklan">
            <div class="card-body">
                <h1>Rp. <?= $iklan->harga_iklan ?></h1>
                <p><?= $iklan->judul_iklan ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Penjual</h4>
                <div class="row iklan-detail__profile">
                    <div class="d-flex justify-align-center mt-3 mb-3">
                        <div>
                            <a href="#">
                                <img src="https://dummyimage.com/100x100/000/fff.png" class="rounded-circle float-start avatar-contact" alt="...">
                            </a>
                        </div>

                        <div class="ms-3 align-self-center">
                            <p><a href="#" class="text-reset nama-penjual">Nama Penjual</a></p>
                            <p><a href="#" class="text-reset">Seller Terpercaya 100%</a></p>

                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-success"><i class="fab fa-whatsapp"></i> <span class="call-button">Hubungi Penjual</span></button>

                </div>

            </div>
        </div>
    </div>

</div>
<?= $this->endsection()  ?>