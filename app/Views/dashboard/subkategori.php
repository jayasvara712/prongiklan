<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Subkategori</h1>
        <div><a href="<?= site_url("subkategori/new") ?>" class="btn btn-primary">Tambah</a></div>

    </div>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif ?>
    <div class="section-body">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Subkategori</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <?php foreach ($subkategori as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->judul_subkategori ?></td>
                            <td><?= $value->judul_kategori
                                ?></td>
                            <td> <img src="<?= base_url('/uploads/subkategori') . "/" ?><?= $value->gambar_subkategori ?>" alt="" srcset="" width="100px" height="100px"></td>
                            <td>
                                <a class="btn btn-warning" href="<?= site_url('subkategori/edit/' .  $value->slug_subkategori) ?>">Edit</a>
                                <form action="<?= site_url('subkategori/delete/' . $value->id_subkategori) ?>" class="d-inline" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="gambar" value="<?= $value->gambar_subkategori ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach ?>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<?= $this->endsection()  ?>