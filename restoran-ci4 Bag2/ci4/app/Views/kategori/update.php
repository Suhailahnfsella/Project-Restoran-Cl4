<?= $this->extend('template/admin')  ?>

<?= $this->section('content') ?>

<h1>Update DATA</h1>

<form action="<?= base_url() ?>/admin/kategori/update" method="post">
    Kategori : <input type="text" name="kategori" value="<?= $kategori['kategori'] ?>" required>
    <br>
    Keterangan : <input type="text" name="keterangan" value="<?= $kategori['keterangan'] ?>">
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori'] ?>">
    <input type="submit" name="simpan" value="SIMPAN">
</form>

<?= $this->endSection() ?>