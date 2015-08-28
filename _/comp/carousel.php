<!-- main_slide.php -->
<div class="slide_wrapper">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner carousel-caption-style" role="listbox">
			<div class="item active">
				<img src="_/images/slide1.jpg" alt="Slide 1">
				<div class="carousel-caption">
					<p>Guest Receiving Area..</p>
				</div>
			</div>
			<div class="item">
				<img src="_/images/slide2.jpg" alt="Slide 2">
				<div class="carousel-caption">
					<p>Coffee Shop and Dining Hall..</p>
				</div>
			</div>
			<div class="item">
				<img src="_/images/slide4.jpg" alt="Slide 4">
				<div class="carousel-caption">
					<p>Spacious Parking Space..</p>
				</div>
			</div>
			<div class="item">
				<img src="_/images/slide6.jpg" alt="Slide 6">
				<div class="carousel-caption">
					<p>Julieta's Rooms..</p>
				</div>
			</div>
		</div>

		<!-- Controls -->
		<!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>-->

		<div id="booking-panel" class="panel panel-default">
			<div class="panel-heading">Welcome and Book Now!</div>
			<div class="panel-body">
				<form class="form-horizontal" action="src/reservation/" id="carousel-form" method="POST">
					<div class="form-group col col-sm-6">
						<div class="row input-group input-group-sm">
							<input type="text" name="arrival" id="arrival" class="jquery-ui-datepicker form-control" placeholder="Set Arrival date" readonly="readonly" />
							<span class="arrival input-group-btn ">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
					<div class="form-group col col-sm-6 pull-right">
						<div class="row input-group input-group-sm">
							<input type="text" name="departure" id="departure" class="jquery-ui-datepicker form-control" placeholder="Set departure date" readonly="readonly" />
							<span class="departure input-group-btn">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
					<br/>
					<div class="form-group">
						<button type="submit" class="btn btn-warning btn-sm pull-right" id="book_me">
							Book Me
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end main_slide.php -->