<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Reporting</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Reporting > </a></li>
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
                            <form action="<?=base_url()?>adm_reporting/proses_analisis" method="post">
                              <div class="col-sm-3 col-xs-12">
                                <select class="form-control" name="tabel">
                                   <option value="">-Pilih-</option>
                                   <option value="rawat_inap" >Rawat Inap</option>
                                   <option value="rawat_jalan" >Rawat Jalan</option>
                                   <option value="penunjang_medis" >Penunjang Medis</option>
                                   <option value="apotek" >Apotek</option>
                                </select>
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <input type="date" class="form-control" name="awal">
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <input type="date" class="form-control" name="akhir">
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Analisis</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="white-box">
                            <center><h4><b>LAPORAN Rawat Inap</b></h4></center>
                            <ul>
                                <li>Informasi jumlah pasien rawat inap dalam setiap bulan dan tahun</li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="box-title">Tabel</h3>
                                   <table class="table-bordered-toggle">
                                       <tr>
                                           <th>Bulan / Tahun</th>
                                           <th>Jumlah Pasien</th>
                                       </tr>
                                       <?php foreach ($report_pasien as $key): ?>
                                        <tr>
                                          <th><?=$key->tgl_masuk?></th>
                                          <th><?=$key->jml?></th>
                                       </tr>
                                       <?php endforeach ?>
                                       
                                   </table>
                                   
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="row">
                                

                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="box-title">Bar chart </h3>
                                    <div>
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
                                      <canvas id="myChartline" width="700" height="370"></canvas>
                                      <script>
                                      var ctx = document.getElementById("myChartline");
                                     
                                      var myChartline = new Chart(ctx, {
                                          type: 'bar',
                                          
                                          data: {
                                              labels : <?=$namabulan?>,
                                              datasets : [{
                                                label: 'Jumlah Pasien',
                                                backgroundColor: [
                                                    '#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1','#71BDF1',
                                                ],
                                                borderColor: '#DD90AF',
                                                borderWidth: 3,
                                                data : <?=$jml?>
                                              }]
                                          },
                                          options: {
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
                                  <br><br><br><br>
                                  <div class="col-sm-6 col-xs-12">
                                    <h3 class="box-title">Pie Chart</h3>
                                      <div>
                                          
                                          <canvas id="myChart1" width="400" height="400"></canvas>
                                          <script>
                                          


                                          var ctx = document.getElementById("myChart1");
                                          var myChart1 = new Chart(ctx, {
                                              type: 'pie',
                                              data: {
                                                  labels : <?=$namabulan?>,
                                                  datasets: [{
                                                      label: 'Jumlah Pasien',
                                                      data: <?=$jml?>,
                                                      backgroundColor: [
                                                          '#71BDF1','#8E91FF','#6AD6C9','#E3BF8D','#C9AECB','#A0B98A','#7BA2C8','#FF7A81','#C1D0C7','#FFADA4','#81B09D','#D7DB91','#71BDF1','#8E91FF','#6AD6C9','#E3BF8D','#C9AECB','#A0B98A','#7BA2C8','#FF7A81','#C1D0C7','#FFADA4','#81B09D','#D7DB91',
                                                      ],
                                                      borderColor: ['#fff'],
                                                      hoverBorderWidth: 2,
                                                      borderWidth: 2
                                                  }]
                                              },
                                              
                                          });
                                          </script>
                                          

                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        
                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; RSUD H. HANAFIE </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->