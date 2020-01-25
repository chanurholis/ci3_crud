<body>

</body>

<div class="container">
    <div class="m-auto">
        <?= $this->session->flashdata('message'); ?>
        <table class="table table-striped table-bordered mt-4">
            <?php if ($pelajar == NULL) : ?>

            <?php else : ?>
                <thead class="bg-primary">
                    <tr>
                        <th class="text-center text-light" scope="col">#</th>
                        <th class="text-light" scope="col">NISN</th>
                        <th class="text-light" scope="col">Nama</th>
                        <th class="text-center text-light" scope="col">Aksi</th>
                    </tr>
                </thead>
            <?php endif ?>
            <tbody>
                <?php $no = 1;
                foreach ($pelajar as $p) : ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $no++ ?></th>
                        <td><?= $p->nisn ?></td>
                        <td><?= $p->nama ?></td>
                        <td width="300px" class="text-center">
                            <span class="badge badge-info"><i class="fa fa-search-plus"></i> <a class="text-light" href="<?= base_url('Welcome/detail/') . $p->pelajar_id ?>">Detail</a></span>
                            <span class="badge badge-success"><i class="fa fa-edit"></i> <a class="text-light" href="<?= base_url('Welcome/update/') . $p->pelajar_id ?>">Update</a></span>
                            <span onclick="return confirm('Sure?')" class="badge badge-danger"><i class="fa fa-trash"></i> <a class="text-light" href="<?= base_url('Welcome/delete/') . $p->pelajar_id ?>">Delete</a></span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

</html>