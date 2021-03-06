<body>

</body>

<div class="container">
    <div class="mt-4">
        <?php foreach ($pelajar as $p) : ?>
            <form class="m-auto col-8" action="<?= base_url('Welcome/aksi_update') ?>" method="post">
                <input type="hidden" name="id" value="<?= $p->pelajar_id ?>">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" value="<?= $p->nisn ?>" autofocus>
                    <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="nama" id="nama" value="<?= $p->nama ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <?php if ($p->jenis_kelamin == 'L') : ?>
                    <div class="form-group form-check-inline">
                        <input class="form-check-input" value="L" type="radio" checked name="jenis_kelamin" id="l">
                        <label class="form-check-label" for="l">Laki - laki</label>
                    </div>
                    <div class="form-group form-check-inline">
                        <input class="form-check-input" value="P" type="radio" name="jenis_kelamin" id="p">
                        <label class="form-check-label" for="p">Perempuan</label>
                    </div>
                <?php else : ?>
                    <div class="form-group form-check-inline">
                        <input class="form-check-input" value="L" type="radio" name="jenis_kelamin" id="l">
                        <label class="form-check-label" for="l">Laki - laki</label>
                    </div>
                    <div class="form-group form-check-inline">
                        <input class="form-check-input" value="P" type="radio" checked name="jenis_kelamin" id="p">
                        <label class="form-check-label" for="p">Perempuan</label>
                    </div>
                <?php endif ?>
                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-paper-plane"></i> Kirim</button>
            </form>
        <?php endforeach ?>
    </div>
</div>

</html>