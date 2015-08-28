<div class="content" id="reservation-summary-page">
    <div class="row">
        <div class="hidden-xs hidden-sm col-md-1"></div>
        <div class="col-sm-10">
            <div class="row" id="printable" readonly>
                <div class="col-sm-12 col-md-12">
        			<div class="row">
                        <header>
                			<h1>Summary</h1>
                			<address >
                				<p>Name: <?php echo $lname.', '.$fname.' '.$mname; ?></p>
                				<p>Email: <?php echo $email; ?></p>
                				<p>Contact #: <?php echo $contact_no; ?></p>
                			</address>
                			<span><img alt="JPH" src="<?php echo base_url('assets/img/jph_logo_sm.png'); ?>"></span>
                		</header>
                		<article>
                			<h1>Recipient</h1>
                			<address ></address>
                			<table class="meta">
                				<tr>
                					<th><span>Ref. #</span></th>
                					<td><span ><?php echo $ref_no; ?></span></td>
                				</tr>
                                <tr>
                					<th><span >Reservation Date</span></th>
                					<td><span ><?php echo $date; ?></span></td>
                				</tr>
                				<tr>
                					<th><span >Check-in Date</span></th>
                					<td><span ><?php echo $checkin; ?></span></td>
                				</tr>
                                <tr>
                					<th><span >Check-out Date</span></th>
                					<td><span ><?php echo $checkout; ?></span></td>
                				</tr>
                				<tr>
                					<th><span >Amount Due</span></th>
                					<td><span id="prefix" >PHP</span> <span><?php echo number_format($total, 2); ?></span></td>
                				</tr>
                			</table>
                			<table class="inventory">
                				<thead>
                					<tr>
                						<th><span >Room No.</span></th>
                						<th><span >Type</span></th>
                						<th><span >Rate</span></th>
                					</tr>
                				</thead>
                				<tbody>
                                    <?php
                                    foreach($room_reservations as $room)
                                    { ?>
                                    <tr>
                						<td><span >Room <?php echo $room->number; ?></span></td>
                						<td><span ><?php echo $room->type_name; ?></span></td>
                						<td><span data-prefix>PHP</span> <span ><?php echo ($room->custom_rate) ? number_format($room->custom_rate, 2) : number_format($room->rate, 2); ?></span></td>
                					</tr>
                                    <?php
                                    } ?>
                				</tbody>
                			</table>
                		</article>
                		<aside>
                			<!--<h1><span >Additional Notes</span></h1>
                			<div >
                				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
                			</div>-->
                		</aside>
        			</div>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-1"></div>
    </div>
</div>