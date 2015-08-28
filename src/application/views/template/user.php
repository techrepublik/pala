<?php

?>
<div class="content" id="user-page">
    <div class="row">
        <div class="hidden-xs col-sm-3 col-md-2 user-sidebar">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Profile</div>
                        <div class="panel-body">
                            <?php echo empty($user) ? 'Juan' : $user->last; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Last Login</div>
                        <div class="panel-body">
                            <?php echo empty($user) ? '0000-00-00 00:00:00' : $user->last_login; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Last IP Address</div>
                        <div class="panel-body">
                            <?php echo empty($user) ? '0:0:0' : $user->last_ip; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 pull-right">
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
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Sign in</button>
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('.jquery-ui-datepicker').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'd MM, yy'
  });

  $('.arrival').find('button').click(function () {
    $('#arrival').datepicker('show');
  });

  $('.departure').find('button').click(function () {
    $('#departure').datepicker('show');
  });
}
</script>