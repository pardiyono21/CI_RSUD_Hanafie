Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Proses ETL </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Proses ETL > Ekstrak</a></li>
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
                                
                                <div class="col-sm-10 col-xs-12">
                                <br>
                                <?php
                                    if ($this->input->post('tabel')==NULL) {
                                ?>
                                <?php
                                }else{
                                ?>
                                    <div class="col-sm-5">
                                        <div class="table-responsive">
                                            
                                            <table class="tabel table-bordered" align="center">
                                                <thead>
                                                    <tr>
                                                        <th>Data Source</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>Data Pasien</td></tr>
                                                    <tr><td>Data Dokter</td></tr>
                                                    <tr><td>Data Kamar</td></tr>
                                                    <tr><td>Data Penyakit</td></tr>
                                                    <tr><td>Data Asuransi</td></tr>
                                                    <tr><td>Data Klinik</td></tr>
                                                    <tr><td>Data Apotek</td></tr>
                                                    <tr><td>Data Penunjang Medis</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                         <!-- Proses ETL -->
                                        
                                            <form action="<?=base_url()?>adm_proses_etl/ekstrak" method="post">
                                            <button type="submit" name="ekstrak" class="btn btn-danger" >Ekstrak <i class="fa fa-hand-o-right"></i> </button>
                                            </form><br>
                                        
                                        
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="table-responsive">
                                            
                                            <table class="tabel table-bordered" align="center">
                                                <thead>
                                                    <tr>
                                                        <th>Data Target</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>Data Dim Pasien</td></tr>
                                                    <tr><td>Data Dim Dokter</td></tr>
                                                    <tr><td>Data Dim Kamar</td></tr>
                                                    <tr><td>Data Dim Penyakit</td></tr>
                                                    <tr><td>Data Dim Asuransi</td></tr>
                                                    <tr><td>Data Dim Klinik</td></tr>
                                                    <tr><td>Data Fact Rawat Inap</td></tr>
                                                    <tr><td>Data Fact Rawat Jalan</td></tr>
                                                    <tr><td>Data Fact Apotek</td></tr>
                                                    <tr><td>Data Fact Penunjang Medis</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>
                                
                            </div>
                        </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; RSUD H. HANAFIE </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ==============================================================