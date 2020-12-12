<?= $this->extend('template/front')  ?>
<?= $this->section('content') ?>

<div class="row-8">
    <div class="col mx-auto">
        <span>
            <h3>Keranjang Belanja</h3>
        </span>
        <hr>
        <table class="table table-bordered w-70">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($menu as $key => $value) {
                    foreach ($value as $v) {
                ?>
                        <tr>
                            <td><?= $v['menu'] ?></td>
                            <td><?= number_format($v['harga']) ?></td>
                            <td>
                                <a href="<?= base_url('Front/Beli/kurang/' . $v['idmenu']) ?>">[-]</a>
                                &nbsp;&nbsp;<?= $jumlah[$key] ?>&nbsp;&nbsp;
                                <a href="<?= base_url('Front/Beli/tambah/' . $v['idmenu']) ?>">[+]</a>
                            </td>
                            <td><?= $jumlah[$key] * $v['harga'] ?></td>
                            <?php $total = $total + ($jumlah[$key] * $v['harga']) ?>
                            <td><a href="<?= base_url('Front/Beli/hapus/' . $v['idmenu']) ?>">Hapus</a></td>
                        </tr>
                <?php }
                } ?>
                <tr>
                    <td colspan=4>
                        <h3>GRAND TOTAL</h3>
                    </td>
                    <td>
                        <h3><?= number_format($total) ?></h3>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php
        if (!empty($total)) { ?>
            <a class="btn btn-primary" href="<?= base_url('Front/Beli/checkout/' . $total . '') ?>" role="button">CHECKOUT</a>
        <?php } ?>

        <?= $this->endSection() ?>