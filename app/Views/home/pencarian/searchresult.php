<div class="pencarian">
    <div class="pencarian__title">
        <h1>Pencarian</h1>
    </div>
    <div class="search-result">
        <div class="filter-iklan">
            <div class="dropdown sticky-top">
                <button class="btn dropdown-toggle button-filter" type="button" id="button-harga" data-bs-toggle="dropdown" aria-expanded="false">
                    harga
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="<?= site_url("halaman/searchresult") ?>"><span class="title-harga">Harga tertinggi</span></a></li>
                    <li><a class="dropdown-item" href="<?= site_url("halaman/searchresult") ?>"><span class="title-harga">Harga terendah</span></a></li>
                </ul>
            </div>
        </div>
        <div class="row iklans">
            <?php foreach ($list_iklan as $key => $iklan) :
                $gambar = explode(",", $iklan->list_gambar)
            ?>
                <div class="col-6 col-sm-4 col-lg-3 list-iklan mb-4">
                    <a href="<?= site_url("iklan-detail/") . $iklan->slug_iklan ?>" class="text-reset">
                        <div class="card">
                            <img src="<?= base_url('/uploads/iklan/' . $gambar[0]) ?>" class="list-iklan__thumbnail p-2">
                            <div class="card-body ">
                                <p class="list-iklan__judul"><?= $iklan->judul_iklan ?></p>
                                <p class="list-iklan__harga">Rp.<?= $iklan->harga_iklan ?></p>
                                <p class="list-iklan__deskripsi"><?= $iklan->deskripsi_iklan ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>