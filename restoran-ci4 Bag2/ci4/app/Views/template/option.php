<select name="kategori" id="kategori">
    <?php foreach ($kategori as $key => $value) : ?>
        <option value="<?= $value['idkategori'] ?>">
            <td><?= $value['kategori'] ?></td>
        </option>
    <?php endforeach; ?>
</select>