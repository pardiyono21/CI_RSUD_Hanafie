Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Proses ETL</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Proses ETL > </a></li>
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
                                
                                <form method="post" action="<?=base_url()?>adm_proses_etl/load_data">
                                <div class="col-sm-2 col-xs-12">
                                   <label>Ekstrak data</label>
                                   <label style="margin-bottom: 18px"></label><br>
                                   <button type="submit" name="tabel" value="submit" class="btn btn-success"> <i class="fa fa-check"></i> Proses</button>
                                </div>
                                
                                </form>
                        
                                   
                                    
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