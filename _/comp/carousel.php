<!-- main_slide.php -->
<div class="slide_wrapper">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="_/images/slide1.png" alt="Slide 1">
				<div class="carousel-caption">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
			<div class="item">
				<img src="_/images/slide2.png" alt="Slide 2">
				<div class="carousel-caption">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
			<div class="item">
				<img src="_/images/slide3.png" alt="Slide 3">
				<div class="carousel-caption">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
		<div id="booking-panel" class="panel panel-default">
			<div class="panel-heading">Welcome and Book Now!</div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group col col-sm-6">
						<div class="row input-group input-group-sm">
							<input type="text" name="arrival" id="arrival" class="jquery-ui-datepicker form-control" placeholder="Set Arrival date" />
							<span class="arrival input-group-btn ">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
					<div class="form-group col col-sm-6 pull-right">
						<div class="row input-group input-group-sm">
							<input type="text" name="departure" id="departure" class="jquery-ui-datepicker form-control" placeholder="Set departure date" />
							<span class="departure input-group-btn">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
					<div class="form-group col col-sm-6">
						<div class="row input-group input-group-sm">
							<input type="text" name="single_room" id="single_room" class="form-control" placeholder="Single rooms" />
						</div>
					</div>
					<div class="form-group col col-sm-6 pull-right">
						<div class="row input-group input-group-sm">
							<input type="text" name="double_room" id="double_room" class="form-control" placeholder="Double rooms" />
						</div>
					</div>
					<br/>
					<div class="form-group">
						<button type="button" class="btn btn-warning btn-sm pull-right" id="book_me" data-toggle="modal" data-target="#booking">
							Book Me
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end main_slide.php -->