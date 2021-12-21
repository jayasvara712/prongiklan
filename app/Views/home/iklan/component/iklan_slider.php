<!-- <div id="iklan-carousel" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner p-2">
        <?php
        $gambars = explode(",", $iklan->list_gambar);
        foreach ($gambars as $key => $gambar) :
        ?>
            <div class="carousel-item <?= ($gambar[$key] == '1') ? 'active' : '' ?>">
                <img src="<?= base_url('/uploads/iklan/') . "/" ?><?= $gambar ?>" class="d-block w-50 mx-auto">
            </div>
        <?php endforeach ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#iklan-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#iklan-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> -->

<div class="slider-single">
    <?php foreach ($gambars as $key => $gambar) :
    ?>
        <div>
            <div class="ss">
                <img src="<?= base_url('/uploads/iklan/') . "/" ?><?= $gambar ?>" class="d-block w-50 mx-auto " width="200px">
            </div>
        </div>
    <?php endforeach ?>

</div>
<div class="slider-nav card">
    <?php foreach ($gambars as $key => $gambar1) :
    ?><div>
            <div class="ss ">
                <img src="<?= base_url('/uploads/iklan/') . "/" ?><?= $gambar1 ?>" class="d-block w-100 mx-auto " width="300px">
            </div>
        </div>
    <?php endforeach ?>

</div>