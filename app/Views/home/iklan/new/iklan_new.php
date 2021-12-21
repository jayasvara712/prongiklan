<div class="form-iklan">
    <h1 class="title-form text-center">Pasang iklan anda</h1>

    <div class="container-sm form-iklans">
        <p class="p-forms">Kategori terpilih</p>
        <!-- <span class="p-kategori">Mobil/Mobil bekas</span> -->
        <span aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><span class="p-kategori">Mobil</span></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="p-kategori">Mobil bekas</span></li>
            </ol>
        </span>
        <button type="button" class="btn btn-link btn-ubah">ubah</button>
        <hr>
        <form class="row">
            <div class="col-lg-10">
                <label for="judul" class="form-label p-forms">
                    <span class="p-forms">Judul*</span>
                </label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="judul" required>
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <label for="harga" class="form-label p-forms">
                    <span class="p-forms">Harga*</span>
                </label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="harga">Rp</span>
                    <input type="number" class="form-control" id="harga" required>
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <label for="handphone" class="form-label p-forms">
                    <span class="p-forms">Nomor handphone*</span>
                </label>
                <div class="input-group has-validation">
                    <input type="number" class="form-control" id="handphone" required>
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <label for="deskripsi" class="form-label p-forms">
                    <span class="p-forms">Deskripsi*</span>
                </label>
                <div class="input-group has-validation">
                    <textarea class="form-control" id="deskripsi" required></textarea>
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group has-validation form-files">
                    <label for="image" class="form-label p-forms">
                        <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                    </label>
                    <input type="file" class="form-control image-input-file" id="image" required style="display: none;">
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group has-validation form-files">
                    <label for="image-1" class="form-label p-forms">
                        <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                    </label>
                    <input type="file" class="form-control image-input-file" id="image-1" required style="display: none;">
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group has-validation form-files">
                    <label for="image-2" class="form-label p-forms">
                        <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                    </label>
                    <input type="file" class="form-control image-input-file" id="image-2" required style="display: none;">
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group has-validation form-files">
                    <label for="image-3" class="form-label p-forms">
                        <img src="<?= base_url('/assets/img/input-image.jpeg') ?>" alt="" srcset="" class="image-formiklan">
                    </label>
                    <input type="file" class="form-control image-input-file" id="image-3" required style="display: none;">
                    <div class="invalid-feedback">
                        //
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btnforms" type="submit">Submit form</button>
            </div>
        </form>
    </div>
</div>