<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Posisi</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" name="posisi" class="form-control" id="posisi" aria-describedby="emailHelp" autocomplete="off">
                    <?= form_error('posisi','<div class="form-text text-danger
                     my-2">','</div>') ?>
                </div>
                <a href="<?= base_url(); ?>Posisi" class="btn btn-danger">Kembali</a>
                <button class="btn btn-success">Tambah Posisi</button>
            </form>
        </div>
    </div>
</div>