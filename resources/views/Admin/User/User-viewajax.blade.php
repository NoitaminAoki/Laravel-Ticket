<div class="row">
	<div class="col-12 d-flex justify-content-center">
		<img src="{{asset('images/user/'.$user->photo_profile)}}" id="img-user" style="width: 150px;height: 150px;" class="rounded" alt="IMG-LOGO">
	</div>
	<div class="col-12 mt-3 mb-3">
		<table class="table table-bordered table-striped table-hover tablle-condensed">
			<tbody>
				<tr>
					<td>Username</td>
					<td>{{ $user->username }}</td>
				</tr>
				<tr>
					<td>Level</td>
					<td>{{ $user->level }}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>{{ $user->status }}</td>
				</tr>
				<tr>
					<td>Created By</td>
					<td>{{ $user->created_by }}</td>
				</tr>
				<tr>
					<td>Created At</td>
					<td>{{ date("d-m-Y h:i:s A", strtotime($user->created_at)) }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>