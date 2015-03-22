<!-- booking_modal.php -->
<div class="modal fade" id="booking">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Booking</h4>
			</div>
			<div class="modal-body text-center">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center" width="30%">Room Type</th>
							<th class="text-center" width="10%">Max</th>
							<th class="text-center" width="25%">Rate</th>
							<th class="text-center" width="10%">No. of Rooms</th>
							<th class="text-center" width="25%"></th>
						</tr>
					</thead>
					<tbody>
						<tr class="double_room_row">
							<td>Double Room</td>
							<td>
								<span class="glyphicon glyphicon-user"></span>
								<span class="glyphicon glyphicon-user"></span>
							</td>
							<td>
								<div class="row">
									<div class="col-md-12">
										<b>PHP <span class="rate">999,999.00</span></b>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										Additional info
									</div>
								</div>
							</td>
							<td>
								<select name="double_room_select" id="double_room_select" class="form-control"></select>
							</td>
							<td>
								<div class="row">
									<div class="col-md-12">
										<b>PHP <span class="subtotal">00.00</span></b>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										Our last <span class="remaining_rooms">7</span> rooms
									</div>
								</div>
							</td>
						</tr>
						<tr class="single_room_row">
							<td>Single Room</td>
							<td>
								<span class="glyphicon glyphicon-user"></span>
							</td>
							<td>
								<div class="row">
									<div class="col-md-12">
										<b>PHP <span class="rate">999,999.00</span></b>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										Additional info
									</div>
								</div>
							</td>
							<td>
								<select name="single_room_select" id="single_room_select" class="form-control"></select>
							</td>
							<td>
								<div class="row">
									<div class="col-md-12">
										<b>PHP <span class="subtotal">00.00</span></b>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										Our last <span class="remaining_rooms">5</span> rooms
									</div>
								</div>
							</td>
						</tr>
						<tr class="total_values_row">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="row">
									<div class="col-md-12">
										<b>PHP <span class="total">00.00</span></b>
									</div>
								</div>
								<br />
								<div class="row">
									<div class="col-md-12">
										<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#booking_cont">
											Continue
										</button>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end booking_modal.php -->

<!-- booking_cont_modal.php -->
<div class="modal fade" id="booking_cont">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Booking Continue</h4>
			</div>
			<div class="modal-body">
				<form id="booking_form" role="form">
					<input type="hidden" name="double_room_no" id="double_room_no" value="0" />
					<input type="hidden" name="single_room_no" id="double_room_no" value="0" />
					<input type="hidden" name="total_amount" id="total_amount" value="0" />
					<div class="form-group">
						<label for="fname">First name</label>
						<input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
					</div>
					<div class="form-group">
						<label for="lname">Last name</label>
						<input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
					</div>
					<div class="form-group">
						<label for="mname">Middle name</label>
						<input type="text" class="form-control" name="mname" id="mname" placeholder="Middle name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="billing_addr">Contact number</label>
						<input type="text" class="form-control" name="billing_addr" id="billing_addr" placeholder="Billing Address">
					</div>
					<div class="form-group">
						<label for="contact_no">Contact number</label>
						<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number">
					</div>
					<div class="form-group text-right">
						<button type="button" class="btn btn-warning btn-sm">Continue</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end booking_cont_modal.php -->