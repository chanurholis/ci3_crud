<body>

</body>

<div class="container">
    <div class="mt-4">
        <form class="m-auto col-8" action="<?= base_url('Welcome/murid_baru') ?>" method="post">
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="number" class="form-control" id="nisn" name="nisn" value="<?= set_value('nisn') ?>" autofocus>
                <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control" id="nama" value="<?= set_value('nama') ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="l" value="<?= set_value('jenis_kelamin') ?>">
                <label class="form-check-label" for="l">Laki - laki</label>
            </div>
            <div class="form-group form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="p" value="<?= set_value('jenis_kelamin') ?>">
                <label class="form-check-label" for="p">Perempuan</label>
            </div>
            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-paper-plane"></i> Kirim</button>
        </form>
    </div>
</div>

</html>