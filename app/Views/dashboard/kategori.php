<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>
        <div><a href="<?= site_url("kategori/new") ?>" class="btn btn-primary">Tambah</a></div>

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
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($kategori as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->judul ?></td>
                                <td> <img src="<?= base_url('/uploads/kategori') . "/" ?><?= $value->gambar ?>" alt="" srcset="" width="100px" height="100px"></td>

                                <td>
                                    <a class="btn btn-warning" href="<?= site_url('kategori/edit/' .  $value->slug) ?>">Edit</a>
                                    <form action="<?= site_url('kategori/delete/' . $value->id_kategori) ?>" class="d-inline" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="gambar" value="<?= $value->gambar ?>">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<?= $this->endsection()  ?>