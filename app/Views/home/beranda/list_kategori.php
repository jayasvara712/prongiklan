<div class="kategori">
    <div class="row">
        <?php foreach (array_slice($kategori, 0, 5) as $value) : ?>
            <div class="col-4 col-sm-2 col-lg-2 kategori__list d-flex justify-content-center">
                <a href="<?= site_url("halaman/searchresult") ?>">
                    <div>
                        <img src="<?= base_url('/uploads/kategori') . "/" ?><?= $value->gambar ?>" class="kategori__list__gambar mx-auto d-flex">
                        <p class="kategori__list__judul text-center"><?= $value->judul ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        <div class="col-4 col-sm-2 col-lg-2 kategori__list d-flex justify-content-center">
            <a href="<?= site_url("Halaman/tampilkategori/{$value->id_kategori}") ?>">
                <div>
                    <img src="<?= base_url('/uploads/kategori') . "/" ?><?= $value->gambar ?>" class="kategori__list__gambar mx-auto d-flex">
                    <p class="kategori__list__judul text-center">Semua</p>

                </div>
            </a>
        </div>
    </div>
</div>