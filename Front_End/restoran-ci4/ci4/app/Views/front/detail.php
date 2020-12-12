<?= $this->extend('template/front')  ?>
<?= $this->section('content') ?>

<div class="row-8">
    <div class="col mx-auto">
        <h3>Histori Pembelian</h3>
        <hr>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($detail as $key => $value) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value['tglorder'] ?></td>
                        <td><?php echo $value['menu'] ?></td>
                        <td><?php echo $value['harga'] ?></td>
                        <td><?php echo $value['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>