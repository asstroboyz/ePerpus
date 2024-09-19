<?=$this->extend('template/index')?>

<?=$this->section('content')?>
<section class="section">
         
          <section class="section">
          <div class="section-header">
            <h1>Kelas </h1>
            <div class="section-header-button">
            
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
              <div class="breadcrumb-item">Data Master</a></div>
              <div class="breadcrumb-item"><a href="/admin/kelas">Kelas</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>
        
          <?php if(session()->getFlashdata('is_unique')):?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss>x</button>
      <b><i class="fa fa-exclamation-triangle "></i></b>
      <?=session()->getFlashdata('is_unique')?>
      </div>
     
     
    </div>
    <?php endif;?>
          <div class="section-body">
           

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data</h4>
                  
                  </div>
                  <div class="card-body">
                   <form action="<?=base_url('/admin/updateKelas/'.$kelas->id_kelas)?>"method="post" autocomplete="off">
                   <?=csrf_field();?>
                    <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                       
                    <input type="hidden" class="form-control <?=$validation->hasError('nama_jurusan')?' is-invalid':'';?>  "  name="j" required autofocus value="<?=old('nama_jurusan'); ?>">
                       
                   
                    

                    <div class="form-group">
                    <label for="" placeholder="tingkatan">tingkatan :</label>
                    <select class="form-control" name="tingkatan" autofocus>
                      <option selected disabled value="">-- pilih tingkatan --</option>
                      <option <?= $kelas->tingkatan==10?'selected ':''?> value="10">10</option>
                      <option <?= $kelas->tingkatan==11?'selected ':''?> value="11">11</option>
                      <option <?= $kelas->tingkatan==12?'selected ':''?> value="12">12</option>
                    </select>
                    <!--  -->
                  </div>
                  <div class="form-group">
                    <label for="keterangan">rombel :</label>
                    <input type="text" class="form-control <?= $validation->hasError('keterangan') ? ' is-invalid' : ''; ?> " name="rombel" required  value="<?= $kelas->rombel?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('keterangan'); ?>
                    </div>
                  </div>
                  <div class="form-group">

                    <label for="nama_jurusan">Jurusan :</label>

                    <select class="form-control" name="jurusan_id">
                      <option selected disabled value="">-- pilih Jurusan --</option>
                      <?php foreach ($jurusan as $key => $j) { ?>
                        <option <?= $j->id_jurusan ==$kelas->jurusan_id?'selected ':''?>  value="<?= $j->id_jurusan ?>"><?= $j->keterangan ?></option>
                      <?php } ?>



                    </select>

                  </div>
                  <div class="">
                    <button class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                    <a href="/admin/kelas" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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