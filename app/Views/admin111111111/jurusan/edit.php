<?=$this->extend('template/index')?>

<?=$this->section('content')?>
<section class="section">
         
          <section class="section">
          <div class="section-header">
            <h1>Jurusan </h1>
            <div class="section-header-button">
            
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
              <div class="breadcrumb-item">Data Master</a></div>
              <div class="breadcrumb-item"><a href="/admin/jurusan">Jurusan</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>
        
  
          <div class="section-body">
           

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data</h4>
                  
                  </div>
                  <div class="card-body">
                   <form action="<?=base_url('/admin/updateJurusan/'.$jurusan->id_jurusan)?>"method="post" autocomplete="off">
                   <?=csrf_field();?>
                    <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                       
                    <input type="hidden" class="form-control <?=$validation->hasError('nama_jurusan')?' is-invalid':'';?>  "  name="j" required autofocus value="<?=old('nama_jurusan'); ?>">
                       
                   
                    

                      <div class="form-group">
                        <label for="nama_jurusan">Kode Jurusan :</label>
                        <input type="text" class="form-control <?=$validation->hasError('nama_jurusan')?' is-invalid':'';?>  "  name="nama_jurusan" required autofocus value="<?= $jurusan->nama_jurusan?>">
                        <div class="invalid-feedback">
                          <?=$validation->getError('nama_jurusan');?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <input type="text" class="form-control <?=$validation->hasError('keterangan')?' is-invalid':'';?> "  name="keterangan" required autofocus  value="<?= $jurusan->keterangan ?>">
                        <div class="invalid-feedback">
                        <?=$validation->getError('keterangan');?>
                        </div>
                      </div>

                      
                      
                      <div class="">
                        <button class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                        <a href="/admin/jurusan"class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                      </div>
                    </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
       <?=$this->endSection()?>