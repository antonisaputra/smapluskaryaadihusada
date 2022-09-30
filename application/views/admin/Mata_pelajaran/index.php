<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Mata pelajaran</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <a href="<?= base_url(); ?>Mata_pelajaran/tambah" class="btn btn-success mt-3">Tambah Mata Pelajaran</a>
    <?php if (!empty($this->session->flashdata('pesan'))) : ?>
        <div class="alert <?= $this->session->flashdata('alert'); ?> mt-3 d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        </div>
    <?php endif; ?>
    <table class="table table-warning mt-3 table-hover table-striped fw-bold">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mata_pelajaran as $row) : ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $row['mata_pelajaran']; ?></td>
                    <td><a href="<?= base_url(); ?>Mata_pelajaran/edit/<?= $row['id']; ?>" class="btn btn-warning me-3">Edit</a>
                    <a href="<?= base_url(); ?>Mata_pelajaran/delete/<?= $row['id']; ?>" onclick="return confirm('yakin');" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>