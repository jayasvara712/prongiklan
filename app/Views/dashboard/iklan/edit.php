<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Iklan</h1>
        <div><a href="<?= site_url("iklan") ?>" class="btn btn-primary">Back</a></div>

    </div>

    <div class="section-body">
        <div class="card-body">

            <form action="<?= site_url('iklan/update/' . $iklan->id_iklan) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <?php
                $gambar_array = explode(",", $iklan->list_gambar);
                ?>

                <input type="hidden" name="id_iklan" value="<?= $iklan->id_iklan ?>">
                <input type="hidden" name="id_gambar" value="<?= $iklan->id_gambar ?>">
                <div class="form-group">
                    <label>Nama Iklan</label>
                    <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="title" value="<?= $iklan->judul_iklan ?>" onkeyup="slugify()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Slug Iklan</label>
                    <input type="text" name="slug" class="form-control" id="slug-iklan" value="<?= $iklan->slug_iklan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Iklan</label>
                    <textarea class="form-control " id="deskripsi" rows="3" name="deskripsi" style="height: 200px;"><?= $iklan->deskripsi_iklan ?></textarea>
                </div>

                <div class="form-group">
                    <label>Harga Iklan</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            Rp.
                        </div>
                        <input type="number" name="harga" class="form-control currency" id="intTextBox" value="<?= $iklan->harga_iklan ?>">
                        <div class="invalid-feedback <?= ($validation->hasError('harga')) ? 'd-block' : '' ?>">
                            <?= $validation->getError('harga') ?>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_subkategori">
                        <?php foreach ($subkategori as $key => $sub) : ?>
                            <option value="<?= $sub->id_subkategori ?>" <?= ($sub->id_subkategori == $iklan->id_subkategori) ? 'selected' : '' ?>><?= $sub->judul ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <?php
                    foreach ($gambar_array as $key => $asd) :
                    ?>
                    <?php endforeach ?>
                    <div class="row image-iklan">
                        <?php foreach ($gambar_array as $key => $gambar_lists) : ?>

                            <div class="col-2 m-1 images">
                                <input type="hidden" name="gambar_lama[]" value="<?= $gambar_lists ?>" class="old-image">
                                <input type="hidden" name="temp_gambar[]" value="<?= $gambar_lists ?>" class="tmp-image">
                                <label for="image-<?= $key + 1 ?>">
                                    <?php
                                    if ($gambar_lists == "no-image.png")
                                        $gambar_lists = "prongiklan-addimage.png"
                                    ?>
                                    <img src="<?= "/uploads/iklan/" . $gambar_lists ?>" class="dashboard__show__gambar" width="150px" alt="<?= $gambar_lists ?>">
                                </label>
                                <input type="file" name="gambar[]" id="image-<?= $key + 1 ?>" class="dashboard__input__gambar">
                                <?php if ($gambar_lists == $gambar_array[0]) {
                                    echo "<p>Gambar Utama</p>";
                                } ?>

                            </div>
                        <?php endforeach ?>


                    </div>

                </div>
                <div>
                    <p>Masukan 4 Gambar Dengan Format PNG/JPG/JPEG</p>
                </div>
                <?php if (session()->getFlashdata('error-image')) : ?>
                    <p class="invalid">
                        <?= session()->getFlashdata('error-image') ?></p>
                <?php endif ?>
                <?php
                if ($validation->getErrors()) :  ?>
                    <div>
                        <p class="invalid"><?= $validation->getError('judul') ?></p>
                        <p class="invalid"><?= $validation->getError('harga') ?></p>
                        <p class="invalid"><?= $validation->getError('deskripsi') ?></p>
                        <p class="invalid"><?= $validation->getError('gambar') ?></p>
                    </div>
                <?php endif ?>
                <div>
                    <button type=" submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>
<?= $this->endsection()  ?>