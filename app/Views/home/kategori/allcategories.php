<div class="row all-kategori">
    <div class="all-kategori__title">
        <h1>Kategori</h1>
    </div>
    <?php foreach ($kategori as $key => $value) : ?>
        <div class="col-6 col-md-6 col-lg-4 col-categories">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?= site_url("halaman/searchresult") ?>"><?= $value->judul ?></a></h5>
                    <?php foreach ($subkategori as $sub) : ?>
                        <?php if ($sub->judul_kategori == $value->judul) : ?>
                            <ul class="list-group list-group-flush sub-kategori">
                                <li class="list-group-item"><a href="#"><?= $sub->judul_subkategori ?></a></li>
                            </ul>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>