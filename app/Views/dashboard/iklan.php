<?= $this->extend("layout/dashboard") ?>
<?= $this->section("content") ?>
<section class="section">
    <div class="section-header">
        <h1>Iklan</h1>
        <div><a href="<?= site_url("iklan/new") ?>" class="btn btn-primary">Tambah</a></div>

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
                <div class="search-element m-2">
                    <form action="" class="d-inline-flex" method="get" autocomplete="off">
                        <input class="form-control" name="keyword" value="<?= $keyword ?>" type="search" placeholder="Search" aria-label="Search" data-width="250" style="width: 250px;">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Deskripsi </th>
                            <th>Thumbnail</th>
                            <th>Kategori</th>
                            <th>harga</th>
                            <th>Action</th>
                        </tr>

                        <?php

                        foreach ($iklan as $key => $value) :
                            $gambar = explode(",", $value->list_gambar);
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->judul_iklan ?></td>
                                <td><?= $value->deskripsi_iklan ?></td>
                                <td>
                                    <img src="<?= base_url('/uploads/iklan/') . "/" ?><?= $gambar[0] ?>" alt="" srcset="" width="100px" height="100px">
                                </td>
                                <td><?= $value->judul_kategori ?>><?= $value->judul_subkategori ?></td>

                                <td><?= $value->harga_iklan ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?= site_url('iklan/edit/' .  $value->slug_iklan) ?>">Edit</a>
                                    <form action="<?= site_url('iklan/delete/' . $value->id_iklan) ?>" class="d-inline" method="post">
                                        <?= csrf_field() ?>
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