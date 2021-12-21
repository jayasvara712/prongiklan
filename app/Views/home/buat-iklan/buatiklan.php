<div class="buat-iklan ">
    <h1 class="text-center buat-iklan__title">Pasang iklan anda</h1>
    <div class="buat-iklan__section">
        <h1>Pilih Kategori</h1>
        <div class=" d-flex align-items-start justify-content-center option-kategori">
            <div class="nav flex-column nav-pills col-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php $sub = array() ?>
                <?php foreach ($kategori as $key => $value) : ?>
                    <a class="nav-kategori " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#<?= $value->slug ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <p class="nav-kategori__text d-flex justify-content-between p-2"><?= ($value->judul) ?><span><i class="fas fa-chevron-right"></i></span></p>
                    </a>
                <?php endforeach ?>
            </div>

            <div class="tab-content col-6" id="v-pills-tabContent">

                <?php foreach ($kategori as $key => $kat) : ?>
                    <div class="tab-pane show fade" id="<?= $kat->slug ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <?php foreach ($subkategori as $key => $sub) : ?>
                            <?php if ($kat->judul == $sub->judul_kategori) : ?>
                                <li class="nav nav-kategori d-flex p-2">
                                    <form action="<?= site_url("halaman/formbuatiklan") ?>" class="d-inline" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="kategori" value="<?= $kat->judul ?>">
                                        <input type="hidden" name="subkategori" value="<?= $sub->judul_subkategori ?>">
                                        <input type="hidden" name="id" value="<?= $sub->id_subkategori ?>">
                                        <button type="submit" class="btn btn-link btn-list-buat-iklans"><?= $sub->judul_subkategori ?></button>
                                    </form>
                                </li>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>