<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Olap</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Olap > </a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <?=$this->session->flashdata('alert')?>
                <!--row -->
                <div class="row">

                        
                        <div class="white-box">
                            
                            <div class="row">
                                <form method="GET" action="<?=base_url()?>adm_olap/proses_olap">
                                <div class="col-sm-4 col-xs-12">
                                    <?php
                                    $olap=$this->input->get('olap');
                                    ?>
                                   <label>Tabel Fakta</label>
                                   <select class="form-control" name="olap" id="olap">
                                       <option value="">-Pilih-</option>
                                       <option value="rawat_inap" <?=$olap=='rawat_inap' ? 'selected':''?>>Fakta Rawat Inap</option>
                                       <option value="rawat_jalan" <?=$olap=='rawat_jalan' ? 'selected':''?>>Fakta Rawat Jalan</option>
                                       <option value="penunjang_medis" <?=$olap=='penunjang_medis' ? 'selected':''?>>Fakta Penunjang Medis</option>
                                       <option value="apotek" <?=$olap=='apotek' ? 'selected':''?>>Fakta Apotek</option>
                                   </select>
                                   <br>
                                   
                                

                                    <label>Tabel Dimensi</label>
                                    <span id="informasi">
                                        <select class="form-control" name="olap" id="olap" disabled>
                                           <option value="">-Pilih-</option>
                                       </select>
                                    </span>
                                    <br>
                                    <label>Rentang Waktu</label>
                                    <input type="date" name="awal" class="form-control"><br>
                                           
                                     <input type="date" name="akhir" class="form-control">
                                       
                                    <br>
                                    <button type="submit" class="btn btn-danger" id="submit" disabled data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i class="fa fa-check"></i> Proses</button>

                                    <!-- <button type="submit" class="btn btn-success" id="submit" disabled> <i class="fa fa-check"></i> Proses</button> -->
                                </div>
                                <script type="text/javascript">
                                    $('.btn').on('click', function() {
                                        var $this = $(this);
                                      $this.button('loading');
                                        setTimeout(function() {
                                           $this.button('reset');
                                       }, 80000000000000000);
                                    });
                                </script>

                                <div class="col-sm-8 col-xs-12">
                                    
                                   
                                </div>
                                </form>
                            </div>
                        </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; RSUD H. HANAFIE </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <script type="text/javascript">
            document.getElementById("olap").onchange = function()
            {

                if(this.value === "rawat_inap")
                {
                    document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>-Pilih-</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Dokter</option><option value='informasi3'>Asuransi</option><option value='informasi4'>Kamar</option><option value='informasi5'>Penyakit</option></select>";
                    document.getElementById("submit").disabled=false;
                }else if(this.value == "rawat_jalan")
                {
                    document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>-Pilih-</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Dokter</option><option value='informasi3'>Asuransi</option><option value='informasi4'>Kinik</option><option value='informasi5'>Penyakit</option></select>";
                    document.getElementById("submit").disabled=false;
                }else if(this.value == "penunjang_medis")
                {
                    document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>-Pilih-</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Jenis Penunjang Medis</option><option value='informasi3'>Asuransi</option></select>";
                    document.getElementById("submit").disabled=false;
                }else if(this.value == "apotek")
                {
                    document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>-Pilih-</option><option value='informasi1'>Pelayan Medik</option></select>";
                    document.getElementById("submit").disabled=false;
                }else{
                    
                    document.getElementById("informasi").innerHTML="<select class='form-control' disabled><option value=''>-Pilih-</option></select>";
                    document.getElementById("submit").disabled=true;
                }
            };
        </script>