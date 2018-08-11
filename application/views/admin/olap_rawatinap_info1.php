<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Olap</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Olap Rawat Inap > </a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                
                <!--row -->
                <div class="row">

                        
                        <div class="white-box">
                            
                            <div class="row">
                                <form method="post" action="<?=base_url()?>adm_olap/proses_olap">
                                <div class="col-sm-2 col-xs-12">
                                    <?php
                                    $olap=$this->input->get('olap');
                                    ?>
                                   <label>Fakta</label>
                                    <select class="form-control" name="olap" id="olap">
                                       <option value="">-Pilih-</option>
                                       <option value="rawat_inap" <?=$olap=='rawat_inap' ? 'selected':''?>>Rawat Inap</option>
                                       <option value="rawat_jalan" <?=$olap=='rawat_jalan' ? 'selected':''?>>Rawat Jalan</option>
                                       <option value="penunjang_medis" <?=$olap=='penunjang_medis' ? 'selected':''?>>Penunjang Medis</option>
                                       <option value="apotek" <?=$olap=='apotek' ? 'selected':''?>>Apotek</option>
                                   </select><br><br>
                                   <label>Informasi Berdasarkan</label>
                                    <span id="informasi">
                                        <select class="form-control" name="olap" id="olap" disabled>
                                           <option value="">-Pilih-</option>
                                       </select>
                                    </span>
                                    <script type="text/javascript">
                                        document.getElementById("olap").onchange = function()
                                        {

                                            if(this.value === "rawat_inap")
                                            {
                                                document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>Keseluruhan</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Dokter</option><option value='informasi3'>Asuransi</option><option value='informasi4'>Kamar</option><option value='informasi5'>Penyakit</option></select>";
                                                document.getElementById("submit").disabled=false;
                                            }else if(this.value == "rawat_jalan")
                                            {
                                                document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>Keseluruhan</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Dokter</option><option value='informasi3'>Asuransi</option><option value='informasi4'>Kinik</option><option value='informasi5'>Penyakit</option></select>";
                                                document.getElementById("submit").disabled=false;
                                            }else if(this.value == "penunjang_medis")
                                            {
                                                document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>Keseluruhan</option><option value='informasi1'>Jenis Kelamin</option><option value='informasi2'>Jenis Penunjang Medis</option><option value='informasi3'>Asuransi</option></select>";
                                                document.getElementById("submit").disabled=false;
                                            }else if(this.value == "apotek")
                                            {
                                                document.getElementById("informasi").innerHTML="<select class='form-control' name='informasi'><option value=''>Keseluruhan</option><option value='informasi1'>Pelayan Medik</option></select>";
                                                document.getElementById("submit").disabled=false;
                                            }else{
                                                
                                                document.getElementById("informasi").innerHTML="<select class='form-control' disabled><option value=''>-Pilih-</option></select>";
                                                document.getElementById("submit").disabled=true;
                                            }
                                        };
                                    </script>
                                </div>
                                <div class="col-sm-2 col-xs-12">
                                    <label style="margin-bottom: 18px"></label><br>
                                   <button type="submit" class="btn btn-success" id="submit" disabled> <i class="fa fa-check"></i> Proses</button>
                                </div>
                                </form>

                                <div class="col-sm-8 col-xs-12">
                                    <label>Tabel Olap</label>
                                    <div class="table-responsive">
                                        
                                        <table class="table-bordered-toggle" align="center">
                                            <thead>
                                                <tr>
                                                    <th colspan="5">Pasian Rawat Inap berdasarkan jenis kelamin dalam setiap bulan dan tahun </th>
                                                </tr>
                                                <tr class="accordion-toggle">
                                                    <th width="150">Tahun </th>
                                                    <th colspan="4" style="min-width: 350px">Rincian </th>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th><a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016" aria-expanded="true">2016
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <td colspan="4">
                                                        <div id="collapse2016" class="collapse in">
                                                            <table class="table-bordered-collapse" style="min-width: 355px">
                                                                <tr class="no">
                                                                    <th>Bulan </th>
                                                                    <th>Jumlah Pasien  </th>
                                                                    <th colspan="2">Jumlah Pasien Per Jenis Kelamin </th>
                                                                </tr>
                                                                <?php foreach ($pasien_2016_jk as $key): ?>
                                                                <tr>
                                                                    <th rowspan="2"><?=$key->tgl_masuk?></th>
                                                                    <th rowspan="2"><?=$key->jml?></th>
                                                                    <th>L</th>
                                                                    <th><?=$key->jml_l?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>P</th>
                                                                    <th><?=$key->jml_p?></th>
                                                                </tr>
                                                                <?php endforeach ?>
                                                                
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th><a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2017" aria-expanded="false">2017
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <td colspan="4">
                                                        <div id="collapse2017" class="collapse">
                                                            <table class="table-bordered-collapse" style="min-width: 355px">
                                                                <tr class="no">
                                                                    <th>Bulan </th>
                                                                    <th>Jumlah Pasien  </th>
                                                                    <th colspan="2">Jumlah Pasien Per Jenis Kelamin </th>
                                                                </tr>
                                                                <?php foreach ($pasien_2017_jk as $key): ?>
                                                                <tr>
                                                                    <th rowspan="2"><?=$key->tgl_masuk?></th>
                                                                    <th rowspan="2"><?=$key->jml?></th>
                                                                    <th>L</th>
                                                                    <th><?=$key->jml_l?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>P</th>
                                                                    <th><?=$key->jml_p?></th>
                                                                </tr>
                                                                <?php endforeach ?>

                                                                                        
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th><?=$all_pasien?></th>
                                                </tr>
                                            
                                                
                                        </table>
                                       
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-box"> 
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="box-title">BAR CHART</h3>
                                    <div>
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
                                      <canvas id="myChartline" width="700" height="370"></canvas>
                                      <script>
                                        var ctx = document.getElementById("myChartline");
                                        var year = <?=$namabulan?>;
                                        var data_laki = <?=$jmll?>;
                                        var data_perempuan = <?=$jmlp?>;


                                        var barChartData = {
                                            labels: year,
                                            datasets: [{
                                                label: 'Laki - laki',
                                                backgroundColor: "#71BDF1",
                                                data: data_laki
                                            }, {
                                                label: 'Perempuan',
                                                backgroundColor: "#DD90AF",
                                                data: data_perempuan
                                            }]
                                        };
                                        var myChartline = new Chart(ctx, {
                                            type: 'bar',
                                            data: barChartData,
                                            options: {
                                                elements: {
                                                    rectangle: {
                                                        borderWidth: 2,
                                                        borderColor: '#999',
                                                        borderSkipped: 'bottom'
                                                    }
                                                },
                                                responsive: true,
                                                title: {
                                                    display: true,
                                                    text: 'Pasien per jenis kelamin'
                                                }
                                            }

                                        });
                                      </script>
                                    </div>
                                </div>
                                
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
        