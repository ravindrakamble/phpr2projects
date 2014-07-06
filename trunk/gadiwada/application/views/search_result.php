<?php $this->load->view('include/header');?>
<!-- content -->
<style>
#outer {width:90%;margin:0 auto;}
#inner {overflow:hidden;}
#header {width:64%;min-height:100px; background-color: #f8f9f7}
#content {width:auto;float:left; margin-left: 50px;}
#sidebar{width: auto;float:left; background-color: #f8f9f7}
</style>
<div class="content-boxs" id="outer" align="center">
	<div id="wrappers">	
		 <div id="header">
			<h4>You have searched</h4>
			<?php 
				if(isset($header))
				echo $header;?>		
		</div>
		<div id="inner">
			<!-- BEGIN LEFT-SIDEBAR -->                        
			 <div id="sidebar"> 
			<!-- LEFT-SIDEBAR: SIDEBAR NAVIGATION -->
			<div class="side-nav sidebar-block" id="filter_data">
				<?php 
				if(isset($filter_data))
				echo $filter_data;?>	
			</div>                                
		</div>														
		                    
			<!-- END LEFT-SIDEBAR -->

			<!-- BEGIN ARTICLE CONTENT AREA -->
			<div id="content"> 
			<p align="right"></p>             
			<div id="results">
				<p id="searchError" class="error-box"></p>
				<?php 
				if(isset($search_result))
				echo $search_result;?>	
			</div>
		</div>
		</div>
	</div>	
</div>
<?php $this->load->view('include/footer');?>    
