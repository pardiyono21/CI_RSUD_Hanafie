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
                                        
                                        <table class="table-bordered-toggle" align="center" width="100%">
                                            
                                                <tr>
                                                    <th colspan="8">Penunjang Medis Tahun 2016</th>
                                                </tr>   
                                                <tr class="no">
                                                    <th>Bulan </th>
                                                    <th>Jumlah Pasien  </th>
                                                    <th colspan="2" width="100">Jumlah Pasien / Jenis Kelamin </th>
                                                    <th colspan="2" width="150">Jumlah Pasien / Penunjang Medis </th>
                                                    <th width="200">Jumlah Pasien / Asuransi </th>
                                                </tr>

                                                <!-- Januari -->
                                                <tr>
                                                    <th rowspan="2" width="60">Jan</th>
                                                    <th rowspan="2"><?=$jan_l+$jan_p?></th>
                                                    <th>L</th>
                                                    <th><?=$jan_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejan_radio" aria-expanded="true">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jan_radio?></th>
                                                    <th>
                                                        <div id="collapsejan_radio" class="collapse in" style="width: 100%">
                                                            <table class="table-bordered-collapse" align="center" width="100%">
                                                                <?php foreach($jan_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jan_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$jan_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejan_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jan_labor?></th>
                                                    <th>
                                                        <div id="collapsejan_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($jan_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jan_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>

                                                <!-- Februari -->
                                                <tr>
                                                    <th rowspan="2" width="60">Feb</th>
                                                    <th rowspan="2"><?=$feb_l+$feb_p?></th>
                                                    <th>L</th>
                                                    <th><?=$feb_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsefeb_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$feb_radio?></th>
                                                    <th>
                                                        <div id="collapsefeb_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($feb_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->feb_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$feb_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsefeb_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$feb_labor?></th>
                                                    <th>
                                                        <div id="collapsefeb_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($feb_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->feb_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>

                                                <!-- Maret -->
                                                <tr>
                                                    <th rowspan="2" width="60">Mar</th>
                                                    <th rowspan="2"><?=$mar_l+$mar_p?></th>
                                                    <th>L</th>
                                                    <th><?=$mar_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsemar_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$mar_radio?></th>
                                                    <th>
                                                        <div id="collapsemar_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($mar_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->mar_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$mar_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsemar_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$mar_labor?></th>
                                                    <th>
                                                        <div id="collapsemar_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($mar_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->mar_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>

                                                <!-- April -->
                                                <tr>
                                                    <th rowspan="2" width="60">Apr</th>
                                                    <th rowspan="2"><?=$apr_l+$apr_p?></th>
                                                    <th>L</th>
                                                    <th><?=$apr_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseapr_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$apr_radio?></th>
                                                    <th>
                                                        <div id="collapseapr_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($apr_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->apr_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$apr_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseapr_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$apr_labor?></th>
                                                    <th>
                                                        <div id="collapseapr_labor" class="collapse">
                                                            <table class="table-bordered-collapse"> 
                                                                <?php foreach($apr_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->apr_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                                
                                                                
                                                <!-- Mei -->
                                                <tr>
                                                    <th rowspan="2" width="60">Mei</th>
                                                    <th rowspan="2"><?=$may_l+$may_p?></th>
                                                    <th>L</th>
                                                    <th><?=$may_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsemay_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$may_radio?></th>
                                                    <th>
                                                        <div id="collapsemay_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($may_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->may_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$may_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsemay_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$may_labor?></th>
                                                    <th>
                                                        <div id="collapsemay_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($may_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->may_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                

                                                <!-- Juni -->
                                                <tr>
                                                    <th rowspan="2" width="60">Jun</th>
                                                    <th rowspan="2"><?=$jun_l+$jun_p?></th>
                                                    <th>L</th>
                                                    <th><?=$jun_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejun_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jun_radio?></th>
                                                    <th>
                                                        <div id="collapsejun_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($jun_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jun_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$jun_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejun_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jun_labor?></th>
                                                    <th>
                                                        <div id="collapsejun_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($jun_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jun_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                

                                                <!-- Juli -->
                                                <tr>
                                                    <th rowspan="2" width="60">Jul</th>
                                                    <th rowspan="2"><?=$jul_l+$jul_p?></th>
                                                    <th>L</th>
                                                    <th><?=$jul_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejul_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jul_radio?></th>
                                                    <th>
                                                        <div id="collapsejul_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($jul_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jul_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$jul_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsejul_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$jul_labor?></th>
                                                    <th>
                                                        <div id="collapsejul_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($jul_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->jul_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                
                                                <!-- Agustus -->
                                                <tr>
                                                    <th rowspan="2" width="60">Agus</th>
                                                    <th rowspan="2"><?=$aug_l+$aug_p?></th>
                                                    <th>L</th>
                                                    <th><?=$aug_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseaug_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$aug_radio?></th>
                                                    <th>
                                                        <div id="collapseaug_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($aug_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->aug_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$aug_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseaug_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$aug_labor?></th>
                                                    <th>
                                                        <div id="collapseaug_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($aug_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->aug_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                
                                                <!-- September -->
                                                <tr>
                                                    <th rowspan="2" width="60">Sep</th>
                                                    <th rowspan="2"><?=$sep_l+$sep_p?></th>
                                                    <th>L</th>
                                                    <th><?=$sep_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsesep_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$sep_radio?></th>
                                                    <th>
                                                        <div id="collapsesep_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($sep_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->sep_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$sep_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsesep_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$sep_labor?></th>
                                                    <th>
                                                        <div id="collapsesep_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($sep_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->sep_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                
                                                <!-- Oktober -->
                                                <tr>
                                                    <th rowspan="2" width="60">Okt</th>
                                                    <th rowspan="2"><?=$oct_l+$oct_p?></th>
                                                    <th>L</th>
                                                    <th><?=$oct_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseoct_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$oct_radio?></th>
                                                    <th>
                                                        <div id="collapseoct_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($oct_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->oct_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$oct_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseoct_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$oct_labor?></th>
                                                    <th>
                                                        <div id="collapseoct_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($oct_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->oct_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                
                                                <!-- November -->
                                                <tr>
                                                    <th rowspan="2" width="60">Nov</th>
                                                    <th rowspan="2"><?=$nov_l+$nov_p?></th>
                                                    <th>L</th>
                                                    <th><?=$nov_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsenov_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$nov_radio?></th>
                                                    <th>
                                                        <div id="collapsenov_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($nov_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->nov_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$nov_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsenov_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$nov_labor?></th>
                                                    <th>
                                                        <div id="collapsenov_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($nov_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->nov_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                
                                                <!-- Desember -->
                                                <tr>
                                                    <th rowspan="2" width="60">Des</th>
                                                    <th rowspan="2"><?=$dec_l+$dec_p?></th>
                                                    <th>L</th>
                                                    <th><?=$dec_l?></th>
                                                    
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsedec_radio" aria-expanded="false">Radiologi
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$dec_radio?></th>
                                                    <th>
                                                        <div id="collapsedec_radio" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($dec_radio_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->dec_radio_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>P</th>
                                                    <th><?=$dec_p?></th>
                                                    <th>
                                                        <a class="accordion-toggle" data-toggle="collapse" data-target="#collapsedec_labor" aria-expanded="false">Laboratorium
                                                        <span class="fa fa-plus-circle buka"></span>
                                                        <span class="fa fa-minus-circle tutup"></span></a></th>
                                                    <th><?=$dec_labor?></th>
                                                    <th>
                                                        <div id="collapsedec_labor" class="collapse">
                                                            <table class="table-bordered-collapse">
                                                                <?php foreach($dec_labor_asuransi as $field){ ?>
                                                                <tr>
                                                                    <th style="min-width: 150px"><?=$field->id_asuransi=='Asuransi' ? 'Pemerintah' : $field->id_asuransi?></th>
                                                                    <th style="min-width: 50px"><?=$field->dec_labor_asuransi?></th>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                           
                                                   
                                                
                                                <tr>
                                                    <th>Total Pasien</th>
                                                    <th colspan="7"><?=$all_pasien?></th>
                                                </tr>
                                            
                                                
                                        </table>
                                        
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
        