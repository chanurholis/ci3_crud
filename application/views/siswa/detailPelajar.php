<body>

</body>

<div class="container">
    <?php foreach ($result as $r) : ?>
        <div class="m-auto">
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $r->nama ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $r->nisn ?></h6>
                    <?php if ($r->jenis_kelamin == 'L') : ?>
                        <p class="card-text">Laki - Laki</p>
                    <?php else : ?>
                        <p class="card-text">Perempuan</p>
                    <?php endif ?>
                    <a href="<?= base_url('/') ?>" class="card-link badge badge-info"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                    <a onclick="return confirm('Sure?')" href="<?= base_url('Welcome/delete/') . $r->pelajar_id ?>" class="card-link badge badge-danger"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

</html>