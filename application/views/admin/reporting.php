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
                                <input type="date" class="form-control" min="2016-01-01" max="2017-12-31" name="awal">
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <input type="date" class="form-control" min="2016-01-01" max="2017-12-31" name="akhir">
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Analisis</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="white-box">
                            
                        </div>
                        
                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; RSUD H. HANAFIE </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->