<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Mantab Jiwa | Aplikasi Restoran Mantab</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <h2><a href="<?= base_url('/front/homepage') ?>">Restoran Mantab</a></h2>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <?php
                            if (!empty(session()->get('emailp'))) { ?>
                                <li class="nav-item mt-3 ml-5"> Pelanggan: </li>
                                <li class="nav-item mt-3 mr-1 ml-1">
                                    <?php
                                    if (!empty(session()->get('pelanggan'))) {
                                        echo session()->get('pelanggan');
                                    }
                                    ?> <span class="sr-only">(current)</span>
                                </li>
                                <li class="nav-item mt-3 ml-3"> Email: </li>
                                <li class="nav-item mt-3 mr-2 ml-1">
                                    <?php
                                    if (!empty(session()->get('emailp'))) {
                                        echo session()->get('emailp');
                                    }
                                    ?>
                                </li>
                                <li class="nav-item mt-2 ml-5">
                                    <button class="btn btn-primary">
                                        <a href="<?= base_url('Front/Beli/beli') ?>" style="color: white;">Cart</a>
                                    </button>
                                </li>
                                <li class="nav-item mt-2 ml-3">
                                    <button class="btn btn-secondary">
                                        <a href="<?= base_url('Front/Histori/histori') ?>" style="color: white;"> History </a>
                                    </button>
                                </li>
                                <li class="nav-item mt-2 ml-3">
                                    <button class="btn btn-danger">
                                        <a href="<?= base_url('front/login/logout') ?>" style="color: white;">Logout</a>
                                    </button>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item mt-2 ml-3">
                                    <button class="btn btn-primary">
                                        <a href="<?= base_url('front/daftar/index') ?>" style="color: white;"> Daftar </a>
                                    </button>
                                </li>
                                <li class="nav-item mt-2 ml-3">
                                    <button class="btn btn-primary">
                                        <a href="<?= base_url('front/login') ?>" style="color: white;"> Login </a>
                                    </button>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <h3>Kategori</h3>
                <hr>
                <nav>
                    <?php
                    foreach ($kategori as $key) : ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('front/kategori/menu/' . $key['idkategori']) ?>">
                                <?php echo $key['kategori'] ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </nav>
            </div>
            <div class="col-md-9">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <p class="text-center">2020 - copyright@suhailahnfsella_</p>
            </div>
        </div>
    </div>
</body>

</html>