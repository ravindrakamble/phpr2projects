<?php $this->load->view('include/header');?>
<!-- content -->
<script type="text/javascript">
var TSort_Data = new Array ('search_table', 's', 's', 's','s','s','');
</script>
<style>
#outer {width:100%;margin:0 auto;}
#inner {overflow:hidden;}
#header {width:60%;min-height:120px; background-color: #f8f9f7}
#content {width:65%;float:left; margin-left: 20px;}
#sidebar{width:20%;float:left; background-color: #f8f9f7}

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
			<div align="left" class="side-nav sidebar-block" id="filter_data">
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
<script type="text/javascript">
$(document).ready(function($) {

	var p = document.getElementById("pricerange"),
    res = document.getElementById("labelprice");

	p.addEventListener("input", function() {
    	res.innerHTML = "Rs. " + p.value;
	}, false); 
	
	//$('body').on('click','.ajx',function() {
	$('#sidebar').on('click', ':checkbox', function() {
		$('#results').html('<center><img src="<?php echo base_url(); ?>images/loading.gif" /></center>');
		var id_sele = $(this).attr('id'); 
		var p = document.getElementById("pricerange"),
    	res = document.getElementById("labelprice");

		p.addEventListener("input", function() {
			alert(1);
    		res.innerHTML = "Rs." + p.value;
		}, false); 
		
		var checkboxes = document.getElementsByName('car_model');
  		var checkboxesChecked = [];
  		// loop over them all
  		for (var i=0; i<checkboxes.length; i++) {
     		// And stick the checked ones onto an array...
     		if (checkboxes[i].checked) {
				
        		checkboxesChecked.push(checkboxes[i].id);
     		}
  		}
  		
  		var opr_names = document.getElementsByName('opr_name');
  		var opr_names_Checked = [];
  		// loop over them all
  		for (var i=0; i<opr_names.length; i++) {
     		if (opr_names[i].checked) {
        		opr_names_Checked.push(opr_names[i].id);
     		}
  		}
  		
  		var features = document.getElementsByName('features');
  		var features_Checked = [];
  		// loop over them all
  		for (var i=0; i<features.length; i++) {
     		if (features[i].checked) {
        		features_Checked.push(features[i].id);
     		}
  		}
  		
		// data string
		var dataString = 'val=' + checkboxesChecked + '&opr_name=' + opr_names_Checked
		+ '&features=' + features_Checked;
		  
		// ajax
		jQuery.ajax({
				type:"POST",
				url: "<?php echo base_url();?>search_result/filter",
				data: dataString,
				success: function(response) {
					//jQuery('#results').html(response);
					var chunks = response.split("~");
					jQuery('#results').html(chunks[0]);
					jQuery('#filter_data').html(chunks[1]);

				}
			});
		});  
		
});	
</script>
<?php $this->load->view('include/footer');?>    
