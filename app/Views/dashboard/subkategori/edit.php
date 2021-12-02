<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Subkategori</h1>
        <div><a href="<?= site_url("subkategori") ?>" class="btn btn-primary">Back</a></div>

    </div>

    <div class="section-body">
        <div class="card-body">

            <form action="<?= site_url('subkategori/update/' . $subkategori->id_subkategori) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $subkategori->id_subkategori ?>">
                <input type="hidden" name="gambar_lama" value="<?= $subkategori->gambar_subkategori ?>">
                <div class="form-group">
                    <label>Nama Subkategori</label>
                    <input type="text" name="judul" id="title" value="<?= $subkategori->judul_subkategori ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" onkeyup="slugify()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Slug Subkategori</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="<?= $subkategori->slug_subkategori ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <?php foreach ($kategori as $key => $value) : ?>
                            <option value="<?= $value->id_kategori ?>" <?= ($value->id_kategori == $subkategori->id_kategori) ? 'selected' : '' ?>><?= $value->judul ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label>Gambar</label>
                    <div class="col-4">
                        <img src="/uploads/subkategori/<?= $subkategori->gambar_subkategori ?>" alt="" srcset="" class="image-thumbnail img-preview" width="150px">
                    </div>
                    <div class="col-8">
                        <input type="file" id="gambar" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" onchange="imagePreview()">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('gambar') ?>
                        </div>
                        <label for="gambar" class="custom-file-label gambar-label"><?= $subkategori->gambar_subkategori ?></label>
                        <p>*Gambar Format PNG/JPG/JPEG</p>
                    </div>

                </div>

                <div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>
<?= $this->endsection()  ?>