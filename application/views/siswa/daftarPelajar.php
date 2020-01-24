<body>

</body>

<div class="container">
    <div class="m-auto">
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($pelajar as $p) : ?>
                <tbody>
                    <tr>
                        <th class="text-center" scope="row"><?= $no++ ?></th>
                        <td><?= $p->nisn ?></td>
                        <td><?= $p->nama ?></td>
                        <td width="300px" class="text-center">
                            <span class="badge badge-success"><i class="fa fa-edit"></i> <a class="text-light" href="">Update</a></span>
                            <span class="badge badge-danger"><i class="fa fa-trash"></i> <a class="text-light" href="">Delete</a></span>
                            <span class="badge badge-info"><i class="fa fa-search-plus"></i> <a class="text-light" href="">Detail</a></span>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

</html>