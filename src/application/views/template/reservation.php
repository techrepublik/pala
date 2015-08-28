<?php
$form = array(
    'class' => 'form-horizontal',
    'id' => 'reservation-form'
);
$submit = array(
    'name'	=> 'reserve',
    'class' => 'btn btn-warning btn-sm',
    'id'	=> 'reserve',
    'value'	=> 'Reserve',
    'disabled' => ''
);
$arrival = $this->input->post('arrival');
$departure = $this->input->post('departure');
?>
<div class="content" id="reservation-page">
    <div class="row">
        <div class="hidden-xs hidden-sm col-md-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?php
                    if( ! empty($errors))
                    {
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger">
                                <ul>
                                    <?php echo $errors; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
        			<div class="row">
                        <?php echo form_open($this->uri->uri_string(), $form); ?>
        					<div class="form-group col col-sm-6">
        						<div class="row input-group input-group-sm">
        							<input type="text" name="arrival" id="arrival" class="jquery-ui-datepicker form-control" placeholder="Set Arrival date" readonly value="<?php if($arrival) echo $arrival; ?>" />
        							<span class="arrival input-group-btn ">
        								<button class="btn btn-default" type="button">
        									<span class="glyphicon glyphicon-calendar"></span>
        								</button>
        							</span>
        						</div>
        					</div>
        					<div class="form-group col col-sm-6 pull-right">
        						<div class="row input-group input-group-sm">
        							<input type="text" name="departure" id="departure" class="jquery-ui-datepicker form-control" placeholder="Set departure date" readonly value="<?php if($departure) echo $departure; ?>" />
        							<span class="departure input-group-btn">
        								<button class="btn btn-default" type="button">
        									<span class="glyphicon glyphicon-calendar"></span>
        								</button>
        							</span>
        						</div>
        					</div>
                            <div class="form-group">
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
                                        <?php
                                        if (! empty ($room_types))
                                        {
                                            foreach ($room_types as $type)
                                            {
                                        ?>
                                        <tr class="<?php echo preg_replace('/\s+/', '_', strtolower($type->type_name)); ?>_row main_row">
                							<td><?php echo $type->type_name; ?></td>
                							<td>
                                                <?php
                                                for ($x = 0; $x < $type->max_occ; $x++)
                                                { ?>
                                                <span class="glyphicon glyphicon-user"></span>
                                                <?php
                                                } ?>
                							</td>
                							<td>
                								<div class="row">
                									<div class="col-md-12">
                										<b>PHP <span class="rate"><?php echo $type->rate; ?></span></b>
                									</div>
                								</div>
                								<div class="row">
                									<div class="col-md-12">
                										<?php echo $type->info; ?>
                									</div>
                								</div>
                							</td>
                							<td>
                								<select name="room_reservations[<?php echo $type->id; ?>]" id="<?php echo preg_replace('/\s+/', '_', strtolower($type->type_name)); ?>_select" class="form-control">
                                                <?php
                                                for ($x = 0; $x <= $type->count; $x++)
                                                { ?>
                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                } ?>
                                                </select>
                							</td>
                							<td>
                								<div class="row">
                									<div class="col-md-12">
                										<b>PHP <span class="subtotal">00.00</span></b>
                									</div>
                								</div>
                								<div class="row">
                									<div class="col-md-12">
                										Our last <span class="remaining_rooms"><?php echo $type->count; ?></span> rooms
                									</div>
                								</div>
                							</td>
                						</tr>
                                        <?php
                                            }
                                        }
                                        ?>
                						<tr class="total_values_row">
                							<td>Total</td>
                							<td></td>
                							<td></td>
                							<td></td>
                							<td>
                								<div class="row">
                									<div class="col-md-12">
                										<b>PHP <span class="total">00.00</span></b>
                									</div>
                								</div>
                							</td>
                						</tr>
                					</tbody>
                				</table>
                            </div>
        					<input type="hidden" name="total_amount" id="total_amount" value="0" />
                            <div class="form-group">
                                <div class="col-md-6">
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
                						<label for="contact_no">Contact number</label>
                						<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number">
                					</div>
                                </div>
                            </div>
                            <div class="form-group">
            					<div class="col-md-12 text-center">
            						<?php echo form_submit($submit); ?>
            					</div>
            				</div>
        				<?php echo form_close(); ?>
        			</div>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-2"></div>
    </div>
</div>