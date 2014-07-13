<?php
Class Discounts_m extends CI_Model{
	
	function get_all_discounts($type='')
	{
		$this->db->distinct();
		$this->db->select('*');
		$query=$this->db->get('discount_coupons')->result();
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
					<tr>
					<th>Coupon code</th>
					<th>Discount Amount</th>
					<th>Discount Percentage</th>
					<th>Last date of discount</th>
					<th>Minimum Purchase price</th>
					<th>Coupon type</th>
					<th>Max limit</th>
					<th>passenger mobile number</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>";
				foreach($query as $c){
					echo "<tr>
						<td>".$c->COUPON_CODE."</td>
						<td>".$c->DISCOUNT_AMOUNT."</td>
						<td>".$c->DISCOUNT_PERCENTAGE."</td>
						<td>".$c->EXPIRY_DATE."</td>
						<td>".$c->MIN_PURCHASE_PRICE."</td>
						<td>".$c->COUPON_TYPE."</td>
						<td>".$c->MAX_LIMIT."</td>
						<td>".$c->PASSENGER_MOBILE_NO."</td>
					<td>
						<a href=\"javascript: editdiscount(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removediscount(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/minus32.png' 
							title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
						</a>
					</td></tr>";
				}
				echo "</table>";
		}
		else
		{
			return $query;
		}
	}

	function edit_discount($id)
	{
		$query=$this->db->get_where('discount_coupons',array('ID'=>$id))->result();
		return $query;
	}
	
	function delete_discount($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('discount_coupons');
		$this->get_all_discounts('ajax');
	}
}
?>