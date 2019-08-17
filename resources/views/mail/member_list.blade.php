<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}

	.send-mail-success-alert-msg, .send-mail-failure-alert-msg {
		display: none;
	}

	.bigModal {
		position: absolute;
  		left: -80%;
  		top: 50%;
		width: 1080px;
  		/*transform: translate(-50%, -50%);*/*/
	}
/*	.send-mail-success-alert-msg, .send-mail-failure-alert-msg {
	  	width: 80%;
	  	position:fixed; 
	  	top: calc(50% - 25px); // half of width
	  	left: calc(50% - 50px); // half of height
	}

	.ui-screen {
	background-color: black;
	-webkit-transition: background 3s linear;
	-moz-transition: background 3s linear;
	-ms-transition: background 3s linear;
	-o-transition: background 3s linear;
	transition: background 3s linear;
	}
*/

</style>
</head>
<body>

	<!-- UI Page with contact list -->

    <div class="container">
    	<div style="margin: 20px">
    		<p class="send-mail-success-alert-msg alert alert-success"></p>
    		<p class="send-mail-failure-alert-msg alert alert-danger"></p>
    	</div>

    	<div style="margin: 20px">
	    	@foreach(['delete-issue', 'update-issue', 'member-already-exist', 'success'] as $msg_key)
				@if(Session::has($msg_key))
					@if($msg_key == 'success')
						<p class="alert-msg alert alert-success">{{ Session::get($msg_key) }}</p>
					@else
						<p class="alert-msg alert alert-danger">{{ Session::get($msg_key) }}</p>
					@endif
				@endif
			@endforeach
		</div>

		<div class="row">
	        <div class="col-md-4 col-md-offset-4 error">
	            <ul>
	                @foreach($errors->all() as $error)
	                    <li>{{$error}}</li>
	                @endforeach
	            </ul>
	        </div>
	    </div>

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Bulk Mailer</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#mailEmployeeModal" class="btn btn-warning" data-toggle="modal"><i class="material-icons">contact_mail</i> <span>Send Mail</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member_list as $member_ele)
                    
                    <tr>						
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" data-id="{{ $member_ele->id }}" name="options[]" class="sub-checkbox" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><div class="member-name">{{ $member_ele->name }}</div></td>
                        <td><div class="member-email">{{ $member_ele->email }}</div></td>
                        <td style="width: 15%;">
                            <a style="display: inline;" class="edit btn btn-sm"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a style="display: inline;" class="del btn btn-sm"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- UI Page with contact list -->

	<!-- Add Member Modal Popup -->
	
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/add-member" method="POST">
					{!! csrf_field() !!}
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Add Member Modal Popup -->

	<!-- Edit Member Modal Popup -->

	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="edit-modal-form" method="POST" action="">
					{!! csrf_field() !!}
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input id="edit-member-name" name="edit-member-name" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="edit-member-email" name="edit-member-email" type="email" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Member Modal Popup -->

	<!-- Delete Member Modal Popup -->

	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="delete-modal-form" method="POST" action="">
					{!! csrf_field() !!}
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Member Modal Popup -->


	<!-- Mail Member Modal Popup -->

	<div id="mailEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content bigModal">
				<div class="modal-header">						
					<h4 class="modal-title">Send Email</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Subject : </label>
						<input id="mail-subject" name="mail-subject" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Content : </label>
						<textarea rows="2" cols="200" name="summernoteInput" class="summernote"></textarea>
					</div>
					<p>Are you sure you want to emails to selected members?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button id="send-mail" class="btn btn-success">Send</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Mail Member Modal Popup -->

	<!-- javascript -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
	<script type="text/javascript">
	
	$(document).ready(function(){
		// Activate tooltip

		$('[data-toggle="tooltip"]').tooltip();
		
		// Select/Deselect checkboxes

		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});

		// Update popup with user info while update

		$('.edit').click(function() {
			
			var member_id = $(this).parent().siblings().find(".sub-checkbox").attr('data-id');
			var member_name = $(this).parent().siblings().find(".member-name").html();
			var member_email = $(this).parent().siblings().find(".member-email").html();
			
			$('#edit-member-name').val(member_name);
			$('#edit-member-email').val(member_email);

			$('#edit-modal-form').attr('action', '/edit-member/'+member_id);

			$('#editEmployeeModal').modal('show');

		});

		// update the form with required user details while deleting

		$('.del').click(function() {

			var member_id = $(this).parent().siblings().find(".sub-checkbox").attr('data-id');
			
			$('#delete-modal-form').attr('action', '/delete-member/'+member_id);
			
			$('#deleteEmployeeModal').modal('show');
			

		});


		// ajax call for send bulk mail with queue functionality

		$('#send-mail').click(function() {

			var selected_member_id = [];
			var mail_subject = $('#mail-subject').val();
			var mail_content = $('.summernote').summernote('code');

			console.log(mail_subject, mail_content);

			$('input.sub-checkbox:checkbox:checked').each(function(key, val) {
			    selected_member_id.push($(this).attr('data-id'));
			});

			$('#mailEmployeeModal').modal('hide');

			$.ajax({
				type: "POST",
    			url: '{{ url("/send-bulk-mail") }}',
    			headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}', 
               	},
    			data : { 
    				selected_member_id : selected_member_id,
    				mail_subject : mail_subject,
    				mail_content : mail_content
    			},

    			dataType: 'JSON',
    			success: function(data) {
			      
			      // console.log(data.status);

			      if(data.status == 300) {

			      		console.log('entered condition');

				      $('.send-mail-failure-alert-msg').html(data.msg);
				      $('.send-mail-failure-alert-msg').css('display', 'block');
				      $('.send-mail-failure-alert-msg').fadeOut(3000);
			      		console.log('finished condition');

			      } else if(data.status == 200) {

				      $('.send-mail-success-alert-msg').html(data.msg);
				      $('.send-mail-success-alert-msg').css('display', 'block');
				      $('.send-mail-success-alert-msg').fadeOut(3000);

			      }
			    },

			});

		});

		// fade session flash messages that comes from controller

		$('.alert-msg').fadeOut(3000);
		
		// setting summer note with specific wdth

		$('.summernote').summernote({
			height: 200,
		});

	});

	</script>

	<!-- javascript -->

</body>
</html>                                		                            