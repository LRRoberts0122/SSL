<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="logged-in well">
				<? 
					echo '<h1><div class="avatar" style="background-image: url(\'uploads/'.$_SESSION["current_user"]["avatar"].'\')"></div> Welcome, '.$_SESSION["current_user"]["username"].'! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>';
				?>
			</div>
			
			<div class="well roster">
				<h1 class="roster">Roster Table</h1>
				<table class="table table-striped">
					<tr>
						<th width="35"><b>#</b></th>
						<th width="89"><b>IMG</b></th>
						<th widht="164"><b>Username</b></th>
						<th width="687"><b>Password</b></th>
						<th width="47"><b>Edit</b></th>
						<th width="47"><b><span class="glyphicon glyphicon-trash"></span></b></th>
					</tr>
					
					<?
						foreach($data as $key=>$value) {
							?>
								<tr>
									<td><p><?echo $value["id"]?></p></td>
									<td><div class="table-img" style="background-image: url('uploads/<?echo $value["avatar"]?>')"></div></td>
									<td><p><?echo $value["username"]?></p></td>
									<td><p><?echo $value["password"]?></p></td>
									<td><a class="edit-link" href="/ssl/Lab4/?action=edit&id=<?echo $value["id"]?>">Edit</a></td>
									<td><a class="table-link" href="/ssl/Lab4/?action=delete&id=<?echo $value["id"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
							<?
						}
					?>
				</table>
			</div>
		</div>
	</div>
</div>