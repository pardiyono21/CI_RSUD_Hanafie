<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Olap</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Olap Rawat Jalan > </a></li>
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
                                                    <th colspan="3">Pasian Rawat Jalan secara keseluruhan berdasarkan asuransi</th>
                                                </tr>
                                                <tr class="accordion-toggle">
                                                    <th width="150">Tahun </th>
                                                    <th colspan="2" style="min-width: 350px">Rincian </th>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <th><a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016" aria-expanded="true">2016
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <td colspan="4">
                                                        <div id="collapse2016" class="collapse in">
                                                            <table class="table-bordered-collapse">
                                                                <tr class="no">
                                                                    <th width="100">Bulan </th>
                                                                    <th colspan="2" width="250">Jumlah Pasien Per Asuransi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016_jan" aria-expanded="true">Jan
                                                                        <span class="fa fa-plus-circle buka1"></span>
                                                                        <span class="fa fa-minus-circle tutup1"></span></a></th>
                                                                    
                                                                    
                                                                    
                                                                    <th>
                                                                        <div id="collapse2016_jan" class="collapse in">
                                                                            <table class="table-bordered-collapse">
                                                                                <?php
                                                                                foreach ($data_asuransi2016 as $key) {
                                                                                 
                                                                                ?>
                                                                                <tr>
                                                                                    <th style="min-width: 200px"><?=$key->id_asuransi?></th>
                                                                                    <th style="min-width: 55px"><?=$key->jml_asuransi?></th>
                                                                                </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                               <?php 
                                                                $bulan1=2;
                                                                $bulan2=2;
                                                                $bulan3=2;
                                                                foreach ($data_2016 as $key ) {
                                                                    ?>
                                                                    <tr>
                                                                        <th width="60">
                                                                            <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016_<?=$bulan1++?>" aria-expanded="false"><?=date("F", mktime(0, 0, 0, $bulan2++, 10))?>
                                                                            <span class="fa fa-plus-circle buka1"></span>
                                                                            <span class="fa fa-minus-circle tutup1"></span></a>
                                                                        </th>
                                                                        <th>
                                                                            <div id="collapse2016_<?=$bulan3++?>" class="collapse">
                                                                                <table class="table-bordered-collapse">
                                                                                    <?php
                                                                                    foreach ($key as $val) {
                                                                                     
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th style="min-width: 200px"><?=$val->id_asuransi?></th>
                                                                                        <th style="min-width: 55px"><?=$val->jml_asuransi?></th>
                                                                                    </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    
                                                                                </table>
                                                                            </div>
                                                                        </th>

                                                                    </tr>
                                                                <?php
                                                                        
                                                                }
                                                                ?>

                                                               
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
                                                            <table class="table-bordered-collapse">
                                                                <tr class="no">
                                                                    <th width="100">Bulan </th>
                                                                    <th colspan="2" width="250">Jumlah Pasien Per Asuransi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2017_jan" aria-expanded="true">Jan
                                                                        <span class="fa fa-plus-circle buka1"></span>
                                                                        <span class="fa fa-minus-circle tutup1"></span></a></th>
                                                                    
                                                                    
                                                                    
                                                                    <th>
                                                                        <div id="collapse2017_jan" class="collapse in">
                                                                            <table class="table-bordered-collapse">
                                                                                <?php
                                                                                foreach ($data_asuransi2017 as $key) {
                                                                                 
                                                                                ?>
                                                                                <tr>
                                                                                    <th style="min-width: 200px"><?=$key->id_asuransi?></th>
                                                                                    <th style="min-width: 55px"><?=$key->jml_asuransi?></th>
                                                                                </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                               <?php 
                                                                $bulan1=2;
                                                                $bulan2=2;
                                                                $bulan3=2;
                                                                foreach ($data_2017 as $key ) {
                                                                    ?>
                                                                    <tr>
                                                                        <th width="60">
                                                                            <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2017_<?=$bulan1++?>" aria-expanded="false"><?=date("F", mktime(0, 0, 0, $bulan2++, 10))?>
                                                                            <span class="fa fa-plus-circle buka1"></span>
                                                                            <span class="fa fa-minus-circle tutup1"></span></a>
                                                                        </th>
                                                                        <th>
                                                                            <div id="collapse2017_<?=$bulan3++?>" class="collapse">
                                                                                <table class="table-bordered-collapse">
                                                                                    <?php
                                                                                    foreach ($key as $val) {
                                                                                     
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th style="min-width: 200px"><?=$val->id_asuransi?></th>
                                                                                        <th style="min-width: 55px"><?=$val->jml_asuransi?></th>
                                                                                    </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    
                                                                                </table>
                                                                            </div>
                                                                        </th>

                                                                    </tr>
                                                                <?php
                                                                        
                                                                }
                                                                ?>

                                                               
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
                                <div class="col-sm-6 col-xs-12">
                                    <h3 class="box-title">BAR CHART</h3>
                                    <div>
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
                                      <canvas id="myChartline" width="700" height="370"></canvas>
                                      <script>
                                        var ctx = document.getElementById("myChartline");
                                        var year = <?=$namaasuransi2016?>;
                                        var data2016 = <?=$jml2016?>;
                                        var data2017 = <?=$jml2017?>;


                                        var barChartData = {
                                            labels: year,
                                            datasets: [{
                                                label: 'Tahun 2016',
                                                backgroundColor: "#71BDF1",
                                                data: data2016
                                            }, {
                                                label: 'Tahun 2017',
                                                backgroundColor: "#DD90AF",
                                                data: data2017
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
                                                    text: 'Pasien Keseluruhan per Asuransi'
                                                },
                                                scales: {
                                                  yAxes: [{
                                                      ticks: {
                                                          beginAtZero:true
                                                      }
                                                  }]
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
        