<?= $this->extend("layout/home") ?>
<?= $this->section("content") ?>
<div class="form-iklan">
    <h1 class="text-center form-iklan__title">Pasang iklan anda</h1>

    <div class="container-sm form-iklans">
        <p class="form-iklans__title">Kategori terpilih</p>

        <hr>
        <form action="<?= site_url('halaman/create') ?>" method="post" autocomplete="off" enctype="multipart/form-data">

            <input type="hidden" name="kategori" value="<?= ($kategori) ? $kategori : old('kategori') ?>">
            <input type="hidden" name="subkategori" value="<?= ($subkategori) ? $subkategori : old('subkategori') ?>">
            <input type="hidden" name="id_subkategori" value="<?= ($id_subkategori) ? $id_subkategori : old('id_subkategori') ?>">
            <!-- <input type="hidden" name="subkategori" value="<?= $subkategori ?>"> -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">

                        <span class="title-kategori"><?= ($kategori) ? $kategori : old('kategori') ?> </span>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span class="title-kategori"><?= ($subkategori) ? $subkategori : old('subkategori') ?></span>
                    </li>
                    <li>
                        <a href="<?= site_url('halaman/buatiklan') ?>">
                            <p class="link-back">Ubah</p>
                        </a>
                    </li>
                </ol>
            </nav>
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="judul" class="form-label p-forms">
                    <span class="p-forms">Judul iklan*</span>
                </label>
                <div class="input-group has-validation">
                    <input type="text" name="judul" value="<?= old('judul') ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="title" onkeyup="slugify()">
                </div>
                <?php if ($validation->getError('judul')) : ?>
                    <div>
                        <p class="invalid"><?= $validation->getError('judul') ?></p>
                    </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <!-- <label for="slug" class="form-label p-forms">
                    <span class="p-forms">Slug iklan</span>
                </label> -->
                <div class="input-group has-validation">
                    <input type="hidden" name="slug" class="form-control" id="slug-iklan" readonly value=<?= old('slug') ?>>
                </div>
            </div>
            <div class="form-group">
                <label for="harga" class="form-label p-forms">
                    <span class="p-forms">Harga*</span>
                </label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="harga">Rp</span>
                    <input type="number" name="harga" class="form-control currency <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="intTextBox" value="<?= old('harga') ?>">
                </div>
                <?php if ($validation->getError('harga')) : ?>
                    <div>
                        <p class="invalid"><?= $validation->getError('harga') ?></p>
                    </div>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="handphone" class="form-label p-forms">
                    <span class="p-forms">Nomor handphone*</span>
                </label>
                <div class="input-group has-validation">
                    <input type="number" name="handphone" class="form-control" id="handphone">
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi" class="form-label p-forms">
                    <span class="p-forms">Deskripsi*</span>
                </label>
                <div class="input-group has-validation">
                    <textarea class="form-control  <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="deskripsi" rows="3" name="deskripsi"><?= old('deskripsi') ?></textarea>
                </div>
                <?php if ($validation->getError('deskripsi')) : ?>
                    <div>
                        <p class="invalid"><?= $validation->getError('deskripsi') ?></p>
                    </div>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="text-gambar">
                    <p class="text-gambar">Masukan gambar iklan dengan format JPG/JPEG/PNG*</p>
                </div>
                <div class="col">
                    <div class="input-group">
                        <label for="image" class="form-label p-forms">
                            <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                        </label>
                        <input type="file" class="form-control image-input-file" name="gambar[]" id="image" style="display: none;">

                    </div>
                </div>
                <div class="col">
                    <div class="input-group ">
                        <label for="image-1" class="form-label p-forms">
                            <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                        </label>
                        <input type="file" class="form-control image-input-file" name="gambar[]" id="image-1" style="display: none;">

                    </div>
                </div>
                <div class="col">
                    <div class="input-group ">
                        <label for="image-2" class="form-label p-forms">
                            <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                        </label>
                        <input type="file" class="form-control image-input-file" name="gambar[]" id="image-2" style="display: none;">
                        <?php
                        if ($validation->getErrors('deskripsi')) :  ?>
                            <div>
                                <p class="invalid"><?= $validation->getError('gambar') ?></p>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group ">
                        <label for="image-3" class="form-label p-forms">
                            <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                        </label>
                        <input type="file" class="form-control image-input-file" name="gambar[]" id="image-3" style="display: none;">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btnforms" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endsection()  ?>