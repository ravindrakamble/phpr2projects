<?php $this->load->view('include/header');?>
			<!-- content -->
		<div class="content-boxs">
		<!--Outstation Div Start-->
		<div id='outstation>
			<table style="width: 40%">
	            <tr>
	                <td>Journey Date : </td>
	                <td> <input name='journeydate' id='journeydate' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input type="radio" name="option" onclick="options(this.value)" value='Flexible'/>Flexible
	                	<input type="radio" name="option" onclick="options(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
		</div>
        <div id="flexibleDiv" style="display: none">
	        <table style="width: 40%">
	            <tr>
	                <td>Estimated total km of journey : </td>
	                <td> <input name='estimationjourney' id='estimationjourney' /> </td>
	            </tr>
	            <tr>
	                <td>Estimated total time of hire : </td>
	                <td> <input name='estimationtime' id='estimationtime' />  </td>
	            </tr>
	             <tr>
	                <td>Car Type :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	            <tr> <td colspan="2"><input type="button" name="flexiblebtn" value="SEARCH"/></td></tr>
	        </table>
        </div>
        <div id="packageDiv" style="display: none" >
        	<table style="width: 40%">
	            <tr>
	                <td>Choose Package : </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr>
	                <td>Car Type :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr> <td colspan="2"><input type="button" name="packagebtn" value="SEARCH"/></td></tr>
	        </table>
        </div>
		<!--Outstation Div End -->
		<!--Local Div Start -->
		<div id='local>
			<table style="width: 40%">
	            <tr>
	                <td>Journey Date : </td>
	                <td> <input name='localjourneydate' id='localjourneydate' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input type="radio" name="localoption" onclick="localoptions(this.value)" value='Flexible'/>Flexible
	                	<input type="radio" name="localoption" onclick="localoptions(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
		</div>
        <div id="localflexibleDiv" style="display: none">
	        <table style="width: 40%">
	            <tr>
	                <td>Estimated total km of journey : </td>
	                <td> <input name='localestimationjourney' id='localestimationjourney' /> </td>
	            </tr>
	            <tr>
	                <td>Estimated total time of hire : </td>
	                <td> <input name='localestimationtime' id='localestimationtime' />  </td>
	            </tr>
	             <tr>
	                <td>Car Type :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	            <tr> <td colspan="2"><input type="button" name="localflexiblebtn" value="SEARCH"/></td></tr>
	        </table>
        </div>
        <div id="localpackageDiv" style="display: none" >
        	<table style="width: 40%">
	            <tr>
	                <td>Choose Package : </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr>
	                <td>Car Type :   </td>
	                <td><select><option value="0">--</option></select></td>
	            </tr>
	             <tr> <td colspan="2"><input type="button" name="localpackagebtn" value="SEARCH"/></td></tr>
	        </table>
        </div>
		<!--Local Div End -->
	</div>
	<!--content end-->
<script type="text/javascript">
$(document).ready(function() {
	

});

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
</script>
<?php $this->load->view('include/footer');?>