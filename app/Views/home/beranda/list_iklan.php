<?php
foreach ($list_iklan as $key => $iklan) :
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