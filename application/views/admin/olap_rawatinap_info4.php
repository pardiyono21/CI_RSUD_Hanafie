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

                                <div class="col-sm-8 col-xs-12">
                                    <label>Tabel Olap</label>
                                    <i style="float: right;">Periode 
                                      <a><?=date("d M Y",strtotime($this->input->get('awal')))?></a> to 
                                      <a><?=date("d M Y",strtotime($this->input->get('akhir')))?></a>
                                    </i>
                                    <div class="table-responsive">
                                        
                                        <table class="table-bordered-toggle" align="center">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Pasian Rawat Inap </th>
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
                                                                    <th colspan="2" width="250">Jumlah Pasien Per Kamar </th>
                                                                </tr>
                                                                <?php 
                                                                if (count($data_kamar2016)>0) {
                                                                ?>
                                                                <tr>
                                                                    <th width="60">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016_jan" aria-expanded="true">Jan
                                                                        <span class="fa fa-plus-circle buka1"></span>
                                                                        <span class="fa fa-minus-circle tutup1"></span></a></th>
                                                                    
                                                                    
                                                                    
                                                                    <th>
                                                                        <div id="collapse2016_jan" class="collapse in">
                                                                            <table class="table-bordered-collapse">
                                                                                <?php
                                                                                foreach ($data_kamar2016 as $key) {
                                                                                 
                                                                                ?>
                                                                                <tr>
                                                                                    <th style="min-width: 200px"><?=$key->id_kamar?></th>
                                                                                    <th style="min-width: 55px"><?=$key->jml_kamar?></th>
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
                                                                $bulan1=1;
                                                                $bulan2=1;
                                                                $bulan3=1;
                                                                foreach ($data_2016 as $key ) {
                                                                    $bulan1++;
                                                                    $bulan2++;
                                                                    $bulan3++;
                                                                    if (count($key)>0) {
                                                                    ?>
                                                                    <tr>
                                                                        <th width="60">
                                                                            <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2016_<?=$bulan1?>" aria-expanded="false"><?=date("F", mktime(0, 0, 0, $bulan2, 10))?>
                                                                            <span class="fa fa-plus-circle buka1"></span>
                                                                            <span class="fa fa-minus-circle tutup1"></span></a>
                                                                        </th>
                                                                        <th>
                                                                            <div id="collapse2016_<?=$bulan3?>" class="collapse">
                                                                                <table class="table-bordered-collapse">
                                                                                    <?php
                                                                                    foreach ($key as $val) {
                                                                                     
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th style="min-width: 200px"><?=$val->id_kamar?></th>
                                                                                        <th style="min-width: 55px"><?=$val->jml_kamar?></th>
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
                                                                    <th colspan="2" width="250">Jumlah Pasien Per Kamar </th>
                                                                </tr>
                                                                <?php 
                                                                if (count($data_kamar2017)>0) {
                                                                ?>
                                                                <tr>
                                                                    <th width="60">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2017_jan" aria-expanded="false">Jan
                                                                        <span class="fa fa-plus-circle buka1"></span>
                                                                        <span class="fa fa-minus-circle tutup1"></span></a></th>
                                                                    
                                                                    
                                                                    
                                                                    <th>
                                                                        <div id="collapse2017_jan" class="collapse">
                                                                            <table class="table-bordered-collapse">
                                                                                <?php
                                                                                foreach ($data_kamar2017 as $key) {
                                                                                 
                                                                                ?>
                                                                                <tr>
                                                                                    <th style="min-width: 200px"><?=$key->id_kamar?></th>
                                                                                    <th style="min-width: 55px"><?=$key->jml_kamar?></th>
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
                                                                $bulan1=1;
                                                                $bulan2=1;
                                                                $bulan3=1;
                                                                foreach ($data_2017 as $key ) {
                                                                    $bulan1++;
                                                                    $bulan2++;
                                                                    $bulan3++;
                                                                    if (count($key)>0) {
                                                                    ?>
                                                                    <tr>
                                                                        <th width="60">
                                                                            <a class="accordion-toggle" data-toggle="collapse" data-target="#collapse2017_<?=$bulan1?>" aria-expanded="false"><?=date("F", mktime(0, 0, 0, $bulan2, 10))?>
                                                                            <span class="fa fa-plus-circle buka1"></span>
                                                                            <span class="fa fa-minus-circle tutup1"></span></a>
                                                                        </th>
                                                                        <th>
                                                                            <div id="collapse2017_<?=$bulan3?>" class="collapse">
                                                                                <table class="table-bordered-collapse">
                                                                                    <?php
                                                                                    foreach ($key as $val) {
                                                                                     
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th style="min-width: 200px"><?=$val->id_kamar?></th>
                                                                                        <th style="min-width: 55px"><?=$val->jml_kamar?></th>
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
                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="box-title">BAR CHART</h3>
                                    <div>
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
                                      <canvas id="myChartline" width="700" height="370"></canvas>
                                      <script>
                                        var ctx = document.getElementById("myChartline");
                                        var year = <?=$namakamar?>;
                                        var data_jml = <?=$jml?>;


                                        var barChartData = {
                                            labels: year,
                                            datasets: [{
                                                label: 'Pasien',
                                                backgroundColor: "#71BDF1",
                                                data: data_jml
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
                                                    text: '10 Kamar Terbanyak Di Pakai '
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