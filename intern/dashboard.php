<?php 
include '../config/connect.php';
function myStat($v){
    $stat="";
    switch ($v) {
        case '0':
            $stat="Idle";
            break;
        case '1':
            $stat="Terjadwal";
            break;
        case '2':
            $stat="Dimulai";
            break;
        case '3':
            $stat="Selesai";
            break;
        case '4':
            $stat="Pembahasan";
            break;
        default:
            $stat="Idle";
            break;
    }
    return $stat;
};
?>
<div class="card">
    <div class="card-header">
        <p class="h4">Event</p>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Keterangan</td>
                    <td>Kategori</td>
                    <td>Harga</td>
                    <td>Status</td>
                    <td>Pelaksanaan</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $s=mysqli_query($con, "select * from paket_soal order by id");
                    while($su=mysqli_fetch_array($s)){
                        $nama=$su['nama'];
                        $keterangan=$su['keterangan'];
                        $kategori=$su['kategori'];
                        $status=$su['status'];
                        $bintang=$su['bintang'];
                        $mulai=$su['tgl_mulai'];
                        $selesai=$su['tgl_selesai'];
                ?>
                    <tr>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $kategori;?></td>
                        <td><?php echo $keterangan;?></td>
                        <td><?php echo $bintang;?> <i class="text-warning fa fa-star"></i></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $mulai." sampai ".$selesai;?></td>
                        <td><button class="btn button btn-primary pilih-sesi edit-soal" sesi="<?php echo $su['id'];?>" href="sesi" paket="<?php echo $su['id'];?>"><i class="fa fa-edit"></i></button></td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
<div>
<div class="modal" id="editSoal">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Paket Soal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" name="EditSoale" id="EditSoale">
                    <input type="hidden" name="ide" id="ide" value="">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" name="harga" id="harga" class="form-control required" placeholder="Harga">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend"> <i class="text-warning fa fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <select name="kategori" class="form-control" id="kategori">
                                <option>Idle</option>
                                <option>Terjadwal</option>
                                <option>Dimulai</option>
                                <option>Selesai</option>
                                <option>Pembahasan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_mulai">Mulai</label>
                                <div class="input-group">
                                    <input type="date" id="mulai" name="mulai" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_akhir">Berakhir</label>
                                <div class="input-group">
                                    <input type="date" id="akhir" name="akhir" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan paket soal"></textarea>
                        </div>
                    </div> 
                    <div id="hasile"></div>
                    <div class="form-group">
                        <div class="input-group">
                            <button class="btn button btn-success">Edit</button>
                        </div>
                    </div> 
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="hasile"></div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<script>
$(".edit-soal").click(function(){
    $("#editSoal").modal('show');
    $("#id").val($(this).attr('paket'));
})
</script>