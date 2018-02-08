<!--
<h3 style="color: #4e5f4d"><?php echo $title; ?></h3>
<hr/>

<div class="row">
    <div class="col-xs-12 col-sm-12 text-right">

		<?php
$tmp  = $this->admin_model->getOnce_Application(46);
$tmp1 = $this->admin_model->chkOnce_usrmPermiss(46, $user_id); //Check User Permission
?>
		<a <?php if (!isset($tmp1['perm_status'])) {?>
			readonly
			<?php } else {?> href="<?php echo site_url('intelprop/olderp_info'); ?>" <?php }?> style="color: #000; padding-left: 20px; padding-right: 20px;" title="บันทึกแบบขึ้นทะเบียน<?php //if(isset($tmp['app_name'])){echo $tmp['app_name'];}?>" class="btn btn-default">
			<i class="fa fa-plus" aria-hidden="true"></i>
		</a>

		<?php
$tmp  = $this->admin_model->getOnce_Application(48);
$tmp1 = $this->admin_model->chkOnce_usrmPermiss(48, $user_id); //Check User Permission
?>
		<a <?php if (!isset($tmp1['perm_status'])) {?>
			readonly
			<?php } else {?> href="<?php echo site_url('report/excel'); ?>" <?php }?> style="color: #000; padding-left: 20px; padding-right: 20px;" title="<?php if (isset($tmp['app_name'])) {echo $tmp['app_name'];}?>" class="btn btn-default">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
		</a>

		&nbsp;
		<a style="color: #000; padding-left: 20px; padding-right: 20px;" title="ค้นหา" class="btn btn-default" data-toggle="modal" data-target="#mySearch">
			<i class="fa fa-filter" aria-hidden="true"></i>
		</a>

	</div>
</div>
-->

   <div id="tmp_menu" hidden='hidden'>
    <?php
      $tmp = $this->admin_model->getOnce_Application(46); 
      $tmp1 = $this->admin_model->chkOnce_usrmPermiss(46,$user_id); //Check User Permission
    ?>
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" style=" margin-left: 0px; background-color: #2f4250; border: 0;font-size: 17px; padding: 2px 20px 2px 20px;" 
    <?php if(!isset($tmp1['perm_status'])) {?>
            readonly 
          <?php }else{?> href="<?php echo site_url('intelprop/olderp_info');?>" 
    <?php }?> title="บันทึก <?php //if(isset($tmp['app_name'])){echo $tmp['app_name'];}?>">
    <i class="fa fa-plus" aria-hidden="true"></i> 
    </a>

    <a title="ค้นหา" class="navbar-minimalize minimalize-styl-2 btn btn-primary" style=" margin-left: 0px; background-color: #2f4250; border: 0;font-size: 17px; padding: 2px 20px 2px 20px;" href="" data-toggle="modal" data-target="#mySearch">
    <i class="fa fa-filter" aria-hidden="true"></i> </a>

    <?php
      $tmp = $this->admin_model->getOnce_Application(48); 
      $tmp1 = $this->admin_model->chkOnce_usrmPermiss(48,$user_id); //Check User Permission
    ?>
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" style=" margin-left: 0px; background-color: #2f4250; border: 0;font-size: 17px; padding: 2px 20px 2px 20px;" 
    <?php if(!isset($tmp1['perm_status'])) {?>
            readonly 
          <?php }else{?> href="<?php echo site_url('report/excel');?>" 
    <?php }?> title="<?php if(isset($tmp['app_name'])){echo $tmp['app_name'];}?>">
    <i class="fa fa-file-excel-o" aria-hidden="true"></i> </a>

    <!--
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" style="margin-top: 11px; margin-left: 0px; background-color: #2f4250; border: 0;font-size: 17px; padding: 5px 20px 3px 20px;" href="<?php echo site_url('control/main_module');?>"><i class="fa fa-caret-left" aria-hidden="true"></i> </a>
    -->
  </div>
  <script>
    setTimeout(function(){
      $("#menu_topright").html($("#tmp_menu").html());
    },300);
  </script>

<div class="table-responsive">

    <table id="dtable" class="table table-striped table-bordered table-hover dataTables-example" >
		<thead style="color: #333; font-wight: bold; font-size: 15px; font-weight: bold;">
			<tr>
				<th style="text-align: center;">#</th>
				<th style="text-align: center;">เลขประจำตัวประชาชน</th>
				<th style="text-align: center;">ชื่อตัว-ชื่อสกุล </th>
				<th style="text-align: center;">อายุ (ปี)</th>
				<th style="text-align: center;">ที่อยู่ (อำเภอ,จังหวัด)</th>
				<th style="text-align: center;">เบอร์โทรศัพท์ (มือถือ)</th>
				<th style="text-align: center;">วันที่ขึ้นทะเบียน</th>
				<th style="text-align: center;">สาขาภูมิปัญญา (สาขา)</th>

				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
$number = 1;

foreach ($wisd_info as $key => $value) {
    $pers = $this->personal_model->getOnce_PersonalInfo($value['pers_id']);
    $addr = $this->personal_model->getOnce_PersonalAddress($value['reg_addr_id']);
    //dieArray($addr);
    ?>
				<tr>
                     <td class="lnk text-center"><?php echo $number; ?></td>
                     <td class="lnk text-center"><?php echo $pers['pid']; ?></td>
                     <td class="lnk"><?php echo $pers['name']; ?></td>
                     <td class="lnk text-center">
			     <?php
					$age = '';
					    if ($pers['date_of_birth'] != '') {
					        $date     = new DateTime($pers['date_of_birth']);
					        $now      = new DateTime();
					        $interval = $now->diff($date);
					        $age      = $interval->y;
					        echo $age;
					    }
					    ?>
					</td>
					<td class="lnk">
                        <?php
							//ถ้ามีข้อมูลอำเภอและจังหวัด ให้แสดงทั้งสอง
							    if ((isset($pers['addr_district'])) || (isset($pers['addr_province']))) {
							        if (($pers['addr_district'] != '') && ($pers['addr_province'] != '')) {
							            echo $pers['addr_district'] . "," . $pers['addr_province'];
							        } else if ($pers['addr_district'] != '') {
							            echo $pers['addr_district'];
							        } else if ($pers['addr_province'] != '') {
							            echo $pers['addr_province'];
							        } else {
							            echo "-";
							        }
							    } else {
							        echo "-";
							    }
							    ?>
					</td>
					<td class="lnk">

						<?php

						    if ($pers['tel_no_mobile'] != '') {
						        echo $pers['tel_no_mobile'];
						    } else {
						        echo "-";
						    }

						    ?>
					</td>
					<td class="lnk text-center">
						<?php if ($value['date_of_reg'] != '') {?>
							<font class="text-sucsess" color="green"><b><?php echo dateChange($value['date_of_reg'], 5); ?></b></font>
						<?php }?>
					</td>

					<td class="lnk">
						<?php

    //แสดงชื่อสาขาภูมิปัญญา ตามเลขไอดี
    $wisdom = $this->wisd_model->get_wisd_branch_by_knwlid($value['knwl_id']);
    //dieArray($wisdom);
    if (!empty($wisdom)) {
        foreach ($wisdom as $key1 => $value1) {
            echo $value1['wis_name'] . "<br>"; # code...
        }
    } else {
        echo "-";
    }
    ?>
					</td>

					<td align="right">

						<?php
$tmp  = $this->admin_model->getOnce_Application(46);
    $tmp1 = $this->admin_model->chkOnce_usrmPermiss(46, $user_id); //Check User Permission
    ?>
						<a <?php if (!isset($tmp1['perm_status'])) {?>
                                                    readonly
						<?php } else {?> href="<?php echo site_url('intelprop/olderp_info/Edit/' . $value['knwl_id']); ?>" <?php }?> title="<?php if (isset($tmp['app_name'])) {echo $tmp['app_name'];}?>"
						class="btn btn-default">
                                               <i class="fa fa-pencil-square" aria-hidden="true" style="color: #000"></i>
						</a>

						&nbsp;
						<a data-toggle="modal" data-target="#prt<?php echo $pers['pid']; ?>" title="พิมพ์แบบฟอร์ม" class="btn btn-default">
							<i class="fa fa-file-text" aria-hidden="true" style="color: #000"></i>
						</a>
						<!-- Print Modal -->
						<div class="modal fade" id="prt<?php echo $pers['pid']; ?>" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header text-left">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color: #333; font-size: 20px;">พิมพ์แบบฟอร์ม</h4>
							</div>
							<div class="modal-body">
							<div class="row">
							<?php
$tmp  = $this->admin_model->getOnce_Application(49);
    $tmp1 = $this->admin_model->chkOnce_usrmPermiss(49, get_session('user_id')); //Check User Permission
    ?>
                                                            <div class="col-xs-12 col-sm-12 text-left" style="margin-bottom: 10px;"
                                                            <?php
if (!isset($tmp1['perm_status'])) {?>
                                                            class="disabled"
                                                            <?php
} else if ($usrpm['app_id'] == 49) {
        ?>
                                                            class="active"
                                                            <?php
}
    ?>
							>
							<a style="color: #333; font-size: 20px;" target="_blank"
							href="<?php echo site_url('report/E1'); ?>"><i class="fa fa-print"
							aria-hidden="true">
							</i> <?php if (isset($tmp1['perm_status'])) {echo $tmp1['app_name'];}?>
							</a>
							</div>

							</div>

							</div>
							<br/>

							</div>
							</div>

							</div>
							</div>
							<!-- End Print Modal -->

							&nbsp;
							<?php
$tmp = $this->admin_model->chkOnce_usrmPermiss(3, $user_id); //Check User Permission
    if (isset($tmp['perm_status'])) {
        if ($tmp['perm_status'] == 'Yes') {
            ?>
							<a data-id=<?php echo $value['knwl_id']; ?> onclick="opn(this)" title="ลบ" type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-trash" style="color: #000"></span>
							</a>
							<?php }
    }
    ?>

							<!-- Info Modal -->
							<div class="modal fade" id="<?php echo $pers['pid']; ?>" role="dialog">
							  <?php 
                        $addr = $this->personal_model->getPersonalInfo($value['pers_id']); 
                         // dieArray($addr);

                        ?>
							<div class="modal-dialog modal-lg" style="text-align: left; ">
							<div class="modal-content">
							<div class="modal-header" style="background-color: rgb(56, 145, 209); color:white; ">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title text-left"><?php echo $pers['name']; ?></h3>
							</div>
							<div class="modal-body">
							<div class="row">
							<div class="col-xs-12 col-sm-3">
							<img src="<?php echo path('noProfilePic.jpg', 'member'); ?>" class="img-responsive">
							</div>
							<div class="col-xs-12 col-sm-9">
							<div class="row">
							<div class="col-xs-12 col-sm-3"><h4>เลขประจำตัวประชาชน</h4></div><div class="col-xs-12 col-sm-3"><?php echo $pers['pid']; ?></div>
							</div>
							<div class="row">
							<div class="col-xs-12 col-sm-3"><h4>วันเดือนปีเกิด</h4></div><div class="col-xs-12 col-sm-6"><?php echo @$addr['date_of_birth']; ?></div>
							</div>
							<div class="row">
                                    <div class="col-xs-12 col-sm-3"><h4>เพศ</h4> <?php echo @$value['gender_name']; ?></div>
                                    <div class="col-xs-12 col-sm-3"><h4>สัญชาติ</h4> <?php echo @$value['nation_name_th']; ?></div>
                                    <div class="col-xs-12 col-sm-3"><h4>ศาสนา</h4> <?php echo @$value['relg_title']; ?></div>
                               </div>
							<div class="row">
							&nbsp;
							</div>
							<div class="row">
							<div class="col-xs-12 col-sm-3"><h4>ที่อยู่ตามทะเบียนบ้าน</h4></div><div class="col-xs-12 col-sm-5"><?php echo @$addr['reg_add_info']; ?></div>
							</div><br>

                            </div>
							</div>
							</div>
							</div>
							</div>
							</div>
							<!-- End Info Modal -->

							</td>
							</tr>
							<?php
								$number++;
								}
								?>
							</tbody>
							</table>

							</div>

							<!-- Trigger the modal with a button -->
							<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

							<!-- Delete Modal -->
							<div id="dltModel" class="modal fade" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color: #333; font-size: 20px;">หน้าต่างแจ้งเตือนเพื่อยืนยัน</h4>
							</div>
							<div class="modal-body">
							<?php $str = getMsg('034');?>
							<p><?php echo $str; ?></p>
							<!--<p>ยืนยันการลบ?</p>-->
							</div>
							<div class="modal-footer">
							<button id="btnYes" type="button" class="btn btn-danger">ตกลง</button>
							<button style="margin-bottom: 5px;" type="button" aria-hidden="true" class="btn btn-default"       data-dismiss="modal">ยกเลิก</button>
							</div>
							</div>
							</div>
							</div>
							<!-- End Delete Model -->

														<!-- Search Modal -->
							<div class="modal fade" id="mySearch" role="dialog">
							  <div class="modal-dialog">
							    
							     <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							         <h4 class="modal-title" style="color: #333; font-size: 20px;">ค้นหา</h4>
							       </div>
							      <div class="modal-body">
							        <label for="col1_filter">เลขประจำตัวประชาชน:</label>
							        <input data-column="1" type="text" class="form-control column_filter" id="col1_filter">
							    
							        <label for="col2_filter">ชื่อตัว-ชื่อสกุล:</label>
							        <input data-column="2" type="text" class="form-control column_filter" id="col2_filter">

							        <label for="col4_filter">ที่อยู่ (อำเภอ,จังหวัด):</label>
							        <input data-column="4" type="text" class="form-control column_filter" id="col4_filter">

							        <label for="col4_filter">วันที่ขึ้นทะเบียน:</label>
							        <input type="date" class="form-control date_filter">
							        <input data-column="4" type="text" class="form-control column_filter" id="col6_filter">

							         <label for="col7_filter">สาขาภูมิปัญญา (สาขา):</label>
							        <input data-column="7" type="text" class="form-control column_filter" id="col7_filter">
							       
                                        <!-- /* fitter */ --> 
								         <script type="text/javascript">
								            $('.date_filter').css('display','none');
								            var date_set = '<?php echo (date("Y")+543)."-".date("m-d"); ?>';
								                            
								                 $('.date_filter').next().focus(function(){
								                    $(this).css('display','none');
								                    $(this).prev().css('display','block');
								                    $(this).prev().val(date_set);
								                 });

								                $('.date_filter').change(function(){
								                      var val_date    = $(this).val();
								                      if(val_date!=''){
								                      var date_filter = val_date.split("-");
								                      //var year_th = parseInt(date_filter[0])+543;
								                      var date_th     = date_filter[2]+"/"+date_filter[1]+"/"+date_filter[0];
								                      $(this).next().val(date_th);
								                      }else{
								                        $(this).next().val('');
								                        $(this).next().css('display','block');
								                        $(this).css('display','none');                                       
								                        $(this).val(date_set);
								                      }
								                });
								         </script>
								         <!-- END fitter -->

							      </div>
							       <div class="modal-footer">
							        <button id="filter" type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-search" aria-hidden="true"></i> ตกลง</button> 
							       </div>
							    </div>
							      
							  </div>
							 </div>
							 <!-- End Search Modal -->

