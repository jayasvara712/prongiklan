<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Buat Iklan</h1>
        <div><a href="<?= site_url("iklan") ?>" class="btn btn-primary">Back</a></div>

    </div>

    <div class="section-body">
        <form action="<?= site_url('iklan') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php $validation->getError('gambar') ?>
            <div class="form-group">
                <label>Judul Iklan</label>
                <input type="text" name="judul" id="title" value="<?= old('judul') ?>" class="form-control  <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" onkeyup="slugify()">
            </div>
            <div class="form-group">
                <label>Slug Iklan</label>
                <input type="text" name="slug" class="form-control" id="slug-iklan" readonly value=<?= old('slug') ?>>
            </div>
            <div class="form-group">
                <label>Subkategori</label>
                <select class="form-control" name="id_subkategori">
                    <?php foreach ($subkategori as $key => $value) : ?>
                        <option value="<?= $value->id_subkategori ?>"><?= $value->judul ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Iklan</label>
                <textarea class="form-control  <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="deskripsi" rows="3" name="deskripsi"><?= old('deskripsi') ?></textarea>
            </div>

            <div class="form-group">
                <label>Harga Iklan</label>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Rp.
                    </div>
                    <input type="number" name="harga" class="form-control currency <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="intTextBox" value="<?= old('harga') ?>">
                </div>
            </div>


            <div class="form-group ">
                <div class="row image-iklan">
                    <!-- ubah label dan id dari 0 -->
                    <div class="col-2 m-2">
                        <input type="hidden" name="temp_gambar[]" class="old-image" value="prongiklan-addimage.png">
                        <label for="image">
                            <!-- <span class="delete__image__iklan"></span> -->

                            <img src="/uploads/iklan/prongiklan-addimage.png" alt="" srcset="" width="100%" class="dashboard__show__gambar">
                        </label>
                        <input type="file" name="gambar[]" id="image" class="dashboard__input__gambar ">
                        <p>Gambar Utama</p>

                    </div>
                    <div class="col-2 m-2">
                        <input type="hidden" name="temp_gambar[]" class="old-image" value="prongiklan-addimage.png">
                        <label for="image-1">
                            <img src="/uploads/iklan/prongiklan-addimage.png" alt="" srcset="" width="100%" class="dashboard__show__gambar"> </label>
                        <input type="file" name="gambar[]" id="image-1" class="dashboard__input__gambar">

                    </div>
                    <div class="col-2 m-2">
                        <input type="hidden" name="temp_gambar[]" class="old-image" value="prongiklan-addimage.png">
                        <label for="image-2">
                            <input type="hidden" name="temp_gambar[]" value="">
                            <img src="/uploads/iklan/prongiklan-addimage.png" alt="" srcset="" width="100%" class="dashboard__show__gambar"> </label>
                        <input type="file" name="gambar[]" id="image-2" class="dashboard__input__gambar">

                    </div>
                    <div class="col-2 m-2">
                        <input type="hidden" name="temp_gambar[]" class="old-image" value="prongiklan-addimage.png">
                        <label for="image-3">
                            <input type="hidden" name="temp_gambar[]" value="">
                            <img src="/uploads/iklan/prongiklan-addimage.png" alt="" srcset="" width="100%" class="dashboard__show__gambar"> </label>
                        <input type="file" name="gambar[]" id="image-3" class="dashboard__input__gambar">

                    </div>

                </div>
                <div>
                    <p>Masukan 4 Gambar Dengan Format PNG/JPG/JPEG</p>
                </div>
                <?php
                if ($validation->getErrors()) :  ?>
                    <div>
                        <p class="invalid"><?= $validation->getError('judul') ?></p>
                        <p class="invalid"><?= $validation->getError('harga') ?></p>
                        <p class="invalid"><?= $validation->getError('deskripsi') ?></p>
                        <p class="invalid"><?= $validation->getError('gambar') ?></p>
                    </div>
                <?php endif ?>

            </div>


            <div>
                <button type="submit" class="btn btn-success "><i class="fas fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>

    </div>
    </div>
</section>
<?= $this->endsection()  ?>