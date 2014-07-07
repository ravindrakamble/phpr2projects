<?php  $this->load->view('include/header'); ?>
<div class="content-boxs">
		<ul class="nav nav-tabs" id="myTab">
			 <li class="active"><a href="#car" role="tab" data-toggle="tab">Car</a></li>
			 <li><a href="#area" role="tab" data-toggle="tab">Area</a></li>
		</ul>
		<div class="tab-content">
			<div id='car' class="tab-pane fade  active in"><h2>CAR</h2></div>
			<div id='area' class="tab-pane fade" > <h2>AREA</h2></div>
</div>
<?php $this->load->view('include/footer'); ?>