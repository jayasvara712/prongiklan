<div class="buat-iklans justify-content-center">
    <h1 class="text-center title-buat-iklan">Pasang iklan anda</h1>
    <div class="container-sm buatiklan">
        <div class=" d-flex align-items-start buatiklans">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php $sub = array() ?>
                <?php foreach ($kategori as $key => $value) : ?>
                    <a class="nav-kategori " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#<?= $value->slug ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <p class="kategori-buat d-flex justify-content-between p-2"><?= ($value->judul) ?><span><img src="<?= base_url('/assets/img/nav/next.png') ?>" alt="icon" srcset="" class="icon-buat-iklan"></span></p>
                    </a>

                <?php endforeach ?>

            </div>

            <div class="tab-content" id="v-pills-tabContent">
                <?php foreach ($kategori as $key => $dd) : ?>
                    <div class="tab-pane show ddd fade" id="<?= $dd->slug ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <?php foreach ($subkategori as $key => $asd) : ?>
                            <?php if ($dd->judul == $asd->judul_kategori) : ?>
                                <li class="nav-kategori d-flex p-2"><a href="<?= base_url("halaman/formbuatiklan") ?>">
                                        <p class="list-buatiklans"><?= $asd->judul ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>