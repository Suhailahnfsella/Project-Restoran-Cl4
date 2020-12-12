<?= $this->extend('template/front')  ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col mx-auto">
        <span>
            <h3>DATA MENU</h3>
        </span>
        <hr>
        <?php foreach ($menu as $key) : ?>
            <div class="card" style="width: 15rem; float: left; margin: 12px;">
                <img src="<?= base_url('upload/' . $key['gambar'] . '') ?>" class="card-img-top" style="height: 150px;" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $key['menu'] ?></h5>
                    <p class="card-text">Rp.<?= $key['harga'] ?></p>
                    <a href="<?= base_url('Front/Beli/beli/' . $key['idmenu'] . '') ?>" class="btn btn-primary">
                        Beli
                    </a>
                </div>
            </div>
        <?php endforeach ?>
        <div style="clear: both;">
            <?= $pager->links('page', 'bootstrap') ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>