<?= $this->extend('template/front')  ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . "=>" . $value;
            echo "<br>";
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col ml-5">
    <h3>DAFTAR PELANGGAN</h3>
</div>

<div class="col-8 ml-5">
    <form action="<?= base_url('/front/daftar/insert') ?>" method="post">
        <div class="form-group">
            <label for="pelanggan">Pelanggan</label>
            <input type="text" name="pelanggan" value="Nama Pelanggan" required class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="Alamat" required class="form-control">
        </div>
        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="number" name="telp" required class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="Email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="konfirmpassword">Konfirmasi Password</label>
            <input type="password" name="konfirmpassword" required class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endSection() ?>