<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Guru</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control" id="nama_guru" aria-describedby="emailHelp" autocomplete="off">
                    <?= form_error('nama_guru', '<div class="form-text text-danger
                     my-2">', '</div>') ?>
                </div>
                <select class="form-select mb-3" name="id_mata_pelajaran" aria-label="Default select example">
                    <option selected>Pilih Mata Pelajaran</option>
                    <?php foreach($mata_pelajaran  as $row):?>
                    <option value="<?= $row['id'] ?>"><?= $row['mata_pelajaran']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="form-select mb-3" name="id_posisi" aria-label="Default select example">
                    <option selected>Pilih Posisi</option>
                    <?php foreach($posisi  as $row):?>
                    <option value="<?= $row['id'] ?>"><?= $row['posisi']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="mb-3">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="number" name="NIP" class="form-control" id="NIP" aria-describedby="emailHelp" autocomplete="off">
                    <?= form_error('NIP', '<div class="form-text text-danger
                     my-2">', '</div>') ?>
                </div>
                <div class="mb-3">
                    <label for="wali_kelas" class="form-label">Wali Kelas</label>
                    <input type="number" name="wali_kelas" class="form-control" id="wali_kelas" aria-describedby="emailHelp" autocomplete="off">
                    <?= form_error('wali_kelas', '<div class="form-text text-danger
                     my-2">', '</div>') ?>
                </div>
                <a href="<?= base_url(); ?>Mata_pelajaran" class="btn btn-danger">Kembali</a>
                <button class="btn btn-success">Tambah Mata Pelajaran</button>
            </form>
        </div>
    </div>
</div>