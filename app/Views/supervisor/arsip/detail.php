<div class="table-responsive">

<table class="table table-hover table-bordered table-striped">
  <thead>
      <tr>
        <th>#</th>
        <th>Nama Dokumen</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
      
        <?php 
        $no=1;
          foreach($data as $d){
            $btn='';
            if($d->is_status==0){
                $btn='<button class="btn btn-success btn-sm approvalDokumen" data-id="'.$d->id_file.'" id="buttonCheck'.$d->id_file.'" type="button"><i class="icon-base ti tabler-check"></i> </button>';
            }
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <th><?php echo $d->nama_dokumen; ?></td>
              <td>
              <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                <?php 
                if(!empty($d->file)){
                  $url ="https://diktis.kemenag.go.id/kelembagaan/kemenag/";
                    if($d->url=="baru"){
                      $url ="https://diktis.kemenag.go.id/kelembagaan/kemenag2old/";
                    }
                  ?>
                <a class="btn btn-danger btn-sm" href="<?php echo $url; ?>file_upload/<?php echo $d->kode_klp; ?>/<?php echo $d->file; ?>" target="_blank" ><i class="icon-base ti tabler-zoom-scan"></i> </a>
                <?php 
                  echo $btn;
                }
                ?>
              
              </div>
      </td>
            </tr>
              <?php 

          }
          ?>
       
   
</tbody>

</table>


</div>