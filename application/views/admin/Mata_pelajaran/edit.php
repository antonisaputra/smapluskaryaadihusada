<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Mate pelajaran</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control" id="mata_pelajaran" aria-describedby="emailHelp" autocomplete="off" value="<?= $mata_pelajaran['mata_pelajaran']; ?>">
                    <?= form_error('mata_pelajaran','<div class="form-text text-danger
                     my-2">','</div>') ?>
                </div>
                <a href="<?= base_url(); ?>Mata_pelajaran" class="btn btn-danger">Kembali</a>
                <button class="btn btn-warning">Ubah Mata Pelajaran</button>
            </form>
        </div>
    </div>
</div>