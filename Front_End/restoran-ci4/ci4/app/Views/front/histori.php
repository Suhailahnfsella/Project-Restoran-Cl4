<?= $this->extend('template/front')  ?>
<?= $this->section('content') ?>

<div class="row-8">
    <div class="col-6">
        <h3>Histori Pembelian</h3>
        <hr>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($vorder as $key => $value) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value['tglorder'] ?></td>
                        <td><?php echo $value['total'] ?></td>
                        <td><a href="<?= base_url('Front/Histori/detail/' . $value['idorder']) ?>">Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>