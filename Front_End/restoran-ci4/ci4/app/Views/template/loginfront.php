<?= $this->extend('template/front')  ?>
<?= $this->section('content') ?>

<div class="row mt-1">
    <div class="col-8 mx-auto">
        <div class="col">
            <?php
            if (!empty($info)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $info;
                echo '</div>';
            }
            ?>
        </div>
        <span>
            <h3>LOGIN PELANGGAN</h3>
        </span>
        <hr>
        <form action="<?= base_url('/front/login') ?>" method="post">
            <div class="form-group">
                <label for="kategori">Email</label>
                <input type="email" name="emailp" required class="form-control">
            </div>
            <div class="form-group">
                <label for="keterangan">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="login" value="LOGIN">
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>