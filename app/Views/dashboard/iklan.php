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
                            <th>Nama </th>
                            <th>Deskripsi </th>
                            <th>gambar</th>
                            <th>Kategori</th>
                            <th>URL{slug}</th>
                            <th>harga</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Avanza 2020</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, facere!</td>
                            <td>
                                <img src="https://dummyimage.com/100x100/000/fff&text=iklan" alt="" srcset="">

                            </td>
                            <td>Mobil>Mobil Bekas</td>
                            <td>Avanza-2020-{randomnumber}</td>
                            <td>rp.23112312312</td>
                            <td>Delete | edit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<?= $this->endsection()  ?>