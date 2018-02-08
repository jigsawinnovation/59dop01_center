<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand font22 fontb" href="<?php echo base_url(); ?>">ศูนย์ข้อมูลผู้สูงอายุ</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		<ul class="nav navbar-nav navbar-right">
			<li class="font22 fontb"><a href="<?php echo base_url(); ?>">หน้าแรก</a></li>
			<li class="font22 fontb"><a href="<?php echo base_url('main/about'); ?>">เกี่ยวกับเรา</a></li>
			<li class="font22 fontb"><a href="<?php echo base_url('main/article')?>">บทความ</a></li>
			<li class="font22 fontb"><a href="<?php echo base_url('main/school')?>">โรงเรียนผู้สูงอายุ</a></li>
		</ul>
		<form class="navbar-form navbar-right">
			
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control font20" placeholder="ค้นหาข้อมูลผู้สูงอายุ">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
						<i class="fa fa-search" aria-hidden="true" style="padding: 3px 0;"></i>
						</button>
					</span>
				</div><!-- /input-group -->
			</div>
		</form>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>