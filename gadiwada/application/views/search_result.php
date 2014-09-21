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
			<h4 align="right">
				<a class='fancybox fancybox.iframe'  
				  href='javascript:parent.jQuery.fancybox.open({topRatio:0,href:&quot;#searching&quot;});'>
						Modify Search
				</a>
			</h4>
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
<!--Start modify serach div-->
<div style="display: none">
	<div align="center" id="searching" class="searching" style="width:600px;" >
		<style>th, td{ padding: 5px;}</style>
	<div class="content">
		<?php 
		$curr_session = $this->session->all_userdata();
		$sel_option = $curr_session['option'];
		$sel_search = $curr_session['search'];
		$sel_journeydate = $curr_session['journeydate'];
		$sel_city = $curr_session['city'];
		if(array_key_exists('area', $curr_session))
		$sel_area = $curr_session['area'];
		else
		$sel_area= '';
		$sel_estimation = $curr_session['estimationjourney'];
		$sel_esttime = $curr_session['estimationtime'];
		if(array_key_exists('car_type', $curr_session))
		$sel_car_type = $curr_session['car_type'];
		else $sel_car_type= '';
		$sel_package = $curr_session['package'];
		$sel_CarTypePackage = $curr_session['CarTypePackage'];
		$city = array();
		$city['0']='--';
		    foreach($cities as $c){
			  $city[$c->CITY_NAME]=$c->CITY_NAME;
		}
		$type = array();
		$type['0']='--';
		    foreach($car_type as $c){
			  $type[$c->TYPE_NAME]=$c->TYPE_NAME;
		}
		$local_Package = array();
		$local_Package['0']='--';
		    foreach($local as $c){
			  $local_Package[$c->LOCAL_NAME]=$c->LOCAL_NAME;
		}
		$out_Package = array();
		$out_Package['0']='--';
		    foreach($outstation as $c){
			  $out_Package[$c->OUTSTATION_NAME]=$c->OUTSTATION_NAME;
		}
		?>
		<ul class="nav nav-tabs" id="myTab">
		
			 <li <?php if($sel_search == 'LOCAL SEARCH') echo'class="active"';?>><a href="#local" role="tab" data-toggle="tab">Local</a></li>
			 <li <?php if($sel_search == 'OUTSTATION SEARCH') echo'class="active"';?>><a href="#outstation" role="tab" data-toggle="tab">Outstation</a></li>
		</ul>
		<div class="tab-content">
			<!--Outstation Div Start-->
			<div id='outstation' class="tab-pane fade" >
			<form name="outsearch" method="POST" action="<?php echo base_url()?>search_result">
				<table style="width:100%;">
	            <tr>
	                <td>Journey Date : </td>
	                <td><input class="dt" value="<?php echo $sel_journeydate?>" name='journeydate' id='journeydate1' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('city',$city,$sel_city,"class='city'");?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('area',array(),$sel_area,"class='area'");?></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input <?php if($sel_option =='Flexible')echo "checked = true";?> type="radio" name="option" onclick="options(this.value)" value='Flexible'/>Flexible
	                	<input <?php if($sel_option =='Package') echo "checked = true '";?> type="radio" name="option" onclick="options(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
				<div id="flexibleDiv" style="display: none">
			        <table style="width:100%; ">
			            <tr>
			                <td>Estimated total km of journey : </td>
			                <td> <input value="<?php echo $sel_estimation;?>" name='estimationjourney' id='estimationjourney' /> </td>
			            </tr>
			            <tr>
			                <td>Estimated total time of hire : </td>
			                <td> <input value="<?php echo $sel_esttime ?>" name='estimationtime' id='estimationtime' />  </td>
			            </tr>
			             <tr>
			                <td>Car Type :   </td>
			                <td><?php echo form_dropdown('car_type',array(),$sel_car_type);?></td>
			            </tr>
			           <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="OUTSTATION SEARCH"/></td></tr>
			        </table>
        		</div>
		       	<div id="packageDiv" style="display: none" >
		        	<table style="width:100%;">
			            <tr>
			                <td>Choose Package : </td>
			                <td><?php echo form_dropdown('package',$out_Package,$sel_package);?></td>
			            </tr>
			             <tr>
			                <td>Car Type :   </td>
			                <td><?php echo form_dropdown('CarTypePackage',$type,$sel_CarTypePackage);?></td>
			            </tr>
			             <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="OUTSTATION SEARCH"/></tr>
			        </table>
	       		</div>
				
	     	</form>
			</div>
			<!--Outstation Div End -->
			<!--Local Div Start -->
			<div id='local' class="tab-pane fade  active in">
			<form name="localsearch" method="POST" action="<?php echo base_url()?>search_result">
			<table style="width:100%;">
	            <tr>
	                <td>Journey Date : </td>
	                <td> <input class="dt" value="<?php echo $sel_journeydate?>" name='journeydate' id='journeydate2' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('city',$city,$sel_city,"class='city'");?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('area',array(),$sel_area,"class='area'");?></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input <?php if($sel_option =='Flexible')echo "checked = true";?> type="radio" name="option" onclick="localoptions(this.value)" value='Flexible'/>Flexible
	                	<input <?php if($sel_option =='Package')echo "checked = true";?> type="radio" name="option" onclick="localoptions(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
	        <div id="localflexibleDiv" style="display: none">
		        <table style="width:100%;">
		            <tr>
		                <td>Estimated total km of journey : </td>
		                <td> <input value="<?php echo $sel_estimation;?>"  name='estimationjourney' id='estimationjourney' /> </td>
		            </tr>
		            <tr>
		                <td>Estimated total time of hire : </td>
		                <td> <input value="<?php echo $sel_esttime ?>"  name='estimationtime' id='estimationtime' />  </td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('car_type',array(),$sel_car_type);?></td>
		            </tr>
		            <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="LOCAL SEARCH"/></td></tr>
		        </table>
       		</div>
	        <div id="localpackageDiv" style="display: none" >
	        	<table style="width:100%;">
		            <tr>
		                <td>Choose Package : </td>
		                <td><?php echo form_dropdown('package',$local_Package,$sel_package);?></td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('CarTypePackage',$type,$sel_CarTypePackage);?></td>
		            </tr>
		             <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="LOCAL SEARCH"/></td></tr>
		        </table>
        	</div>
			</form>
		</div>
			<!--Local Div End -->
		</div>
	</div>
	<!--content end-->

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

<!--Modify Search  Javascript Start-->
<script type="text/javascript">
$(function() {
	var sel_city = "<?php echo $sel_city; ?>";
	var sel_option = "<?php echo $sel_option; ?>";
	var sel_search = "<?php echo $sel_search ?>";
	if(sel_search == 'LOCAL SEARCH'){
		localoptions(sel_search);
	}
	if(sel_search == 'OUTSTATION SEARCH'){
		options(sel_search);
	}
	
	sendrequest(sel_city);
	
	$('#journeydate1').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0
	});
	$('#journeydate2').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0
	});
	if($(".city").val() != "--" && $(".city").val() != "0"){
		sendrequest($(".city").val());
	}else{
		$('.area').empty();
	}
	$(".city").change(function(){
    	var selectedValue = this.value;
    	if(selectedValue != "0" && selectedValue != "--"){
			sendrequest(selectedValue);
		}else{
			$('.area').empty();
		}
	});
	//Outstation validation
	var frmvalidator = new Validator("outsearch");
	frmvalidator.addValidation("journeydate","req","Please select your journey date");
	frmvalidator.addValidation("city","dontselect=0","Please select city");
	frmvalidator.addValidation("area","req","Please select area");
	var frmvalidator = new Validator("localsearch");
	frmvalidator.addValidation("journeydate","req","Please select your journey date");
	frmvalidator.addValidation("city","dontselect=0","Please select city");
	frmvalidator.addValidation("area","req","Please select area");
});

function sendrequest(city){
	jQuery.ajax({
			type:"POST",
			url: "<?php echo base_url();?>search/get_areas/"+city,
			data: city,
			success: function(response) {
				if(response == ""){
					$('.area').empty();
				}else{
					$('.area').empty();
					$('.area').append(response);
				}
			}
		});
	
}

function options(val){
	if(val == 'Flexible'){
		$('#flexibleDiv').show();
		$('#packageDiv').hide();
	}
	if(val == 'Package'){
		$('#packageDiv').show();
		$('#flexibleDiv').hide();
	}
}
function localoptions(val){
	if(val == 'Flexible'){
		$('#localflexibleDiv').show();
		$('#localpackageDiv').hide();
	}
	if(val == 'Package'){
		$('#localpackageDiv').show();
		$('#localflexibleDiv').hide();
	}
}

function clearCityAndArea(){
	$('.area').empty();
	$('.city').empty();
}
</script>
<!--Modify Search  Javascript End-->
<?php $this->load->view('include/footer');?>    
