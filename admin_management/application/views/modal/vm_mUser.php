

<div id="page-form">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= $title ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a data-dismiss="modal" class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">                
                <!--<form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?php echo base_url().'insert/insertUser'; ?>"> -->
                   <form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?php if ($action == 'add') {echo base_url().'insert/insertmUser';} else {echo base_url().'update/updatemUser/'.$user["id_user"];} ?>">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="input_username" type="text" class="form-control" placeholder="Username" value="<?= $user["username"] ?>" <?php if ($action == 'update'){ echo"readonly";}?>>

                            <code>Username tidak boleh sama</code>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="input_password" type="password" class="form-control" placeholder="Password"  <?php if ($action == 'add'){ echo"required=''";}?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Karyawan <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="input_nama_karyawan" type="text" class="form-control" placeholder="nama_karyawan" value="<?=$user["nama_karyawan"]?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Hp </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="input_no_hp" type="text" class="form-control" placeholder="no_hp" value="<?=$user["no_hp"]?>">
                            </div>
                        </div>                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="input_alamat"><?=$user["alamat"]?></textarea>
                            </div>
                        </div>    
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="input_email" type="email" class="form-control" placeholder="email" value="<?=$user["email"]?>">
                            </div>
                        </div> 
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cabang Toko <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="input_cabang_toko" class="select2_single form-control">
                                    <option disabled selected>Pilih</option>
                                    <?php
                                    if (isset($dataToko)) {
                                        foreach ($dataToko as $var) {
                                            $selected = ($var->id_toko == $user["cabang_toko"]) ? 'selected' : '';
                                            echo '<option value="' . $var->id_toko . '" ' . $selected . '>'. $var->nama_toko .', &nbsp;Cabang ke-'. $var->cabang_toko . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>                  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="select2_single form-control" name="input_privilege">
                                    <option disabled selected>Pilih</option>
                                    <?php
                                    for ($i = 0; $i < 2; $i++) {
                                        $selected = ($i == $user["privilege"]) ? 'selected' : '';
                                        echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                                <code>Keterangan =  0: Super Admin; 1: Admin;</code>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Aktif <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="select2_single form-control" name="input_is_aktif">
                                    <option disabled selected> Pilih</option>
                                    <?php
                                    for ($i = 0; $i < 2; $i++) {
                                        $selected = ($i == $user["is_aktif"]) ? 'selected' : '';
                                        echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                                <code>Keterangan =  0: Tidak Aktif; 1: Aktif;</code>
                            </div>
                        </div>    
                        <div class="ln_solid"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <?php if ($action == 'add') { ?>
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-save"></i> Update
                                </button>
                             
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>