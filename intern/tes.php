<form method="post" action="action/pro_edit_paket.php" name="buatsoal" id="buatsoal">
                    <input type="hidden" name="id" id="id" value="1">
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
                            <button class="btn button btn-success">Buat</button>
                        </div>
                    </div> 
                </form>