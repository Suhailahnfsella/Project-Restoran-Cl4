<div class="form-group">
    <select class="form-control" onchange="this.form.submit()" name="idkategori" id="kategori">
        <option value="1">
            Cari...
        </option>
        <?php foreach ($kategori as $key => $value) : ?>
            <option value="<?= $value['idkategori'] ?>">
                <td><?= $value['kategori'] ?></td>
            </option>
        <?php endforeach; ?>
    </select>
</div>