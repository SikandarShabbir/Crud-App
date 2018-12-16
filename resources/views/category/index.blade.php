@extends('layouts.master')
@section('content')

<h1>Hello Categories</h1>
<!-- <div class="container"> -->
	<!-- {{ $categories }} -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Responsive Hover Table</h3>

					<div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<!-- <th>ID</th> -->
								<th>Title</th>
								<th>Description</th>
								<th>Created at</th>
								<th>Updated at</th>
								<th>Action</th>
							</tr>
							<?php foreach ($categories as $category): ?>
								
							<tr>
								<!-- <td>{{$category->id}}</td> -->
								<td>{{$category->title}}</td>
								<td>{{$category->description}}</td>
								<td>{{$category->created_at}}</td>
								<td>{{$category->updated_at}}</td>
								<td>
									<button class="btn btn-primary" data-mytitle = "{{$category->title }}" data-catid="{{$category->id}}" data-mydescription="{{$category->description}}" data-toggle="modal" data-target="#edit">Edit</button>
									<span>/</span>
									<!-- <form action="{{route('categories.destroy',$category->id)}}" method="post" class="form-inline">
										{{method_field('delete') }}
										{{csrf_field()}} -->
									<button class="btn btn-danger" data-toggle="modal" data-target="#delete" id="#delete" data-delete-id="{{$category->id}}">Delete</button>
									<!-- </form> -->
								</td>
								
								<!-- <td><span class="label label-success">Approved</span></td> -->
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>

<!-- </div> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	Create Category
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Create Category</h4>
			</div>
			<form action="{{route('categories.store')}}" method="post" accept-charset="utf-8">
				<div class="modal-body">
					{{csrf_field()}}        	
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control">
					<label for="description">description</label>
					<textarea name="description" id="des" class="form-control" rows="5"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
			</div>
			<form action="{{route('categories.update','test')}}" method="post" accept-charset="utf-8">
				<div class="modal-body">
					{{csrf_field()}}        	
					{{method_field('patch')}}  
					<input type="hidden" name="category_id" id="catid" value="">      	
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control">
					<label for="description">description</label>
					<textarea name="description" id="des" class="form-control" rows="5"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade modal-danger" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Delete Category</h4>
			</div>
			<form action="{{route('categories.destroy','test')}}" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<h3>Do you really want to delete?</h3>
					{{csrf_field()}}        	
					{{method_field('delete')}} 
					<input type="hidden" name="id" id="del-id" value="">       	
					<!-- <label for="title">Title</label> -->
					<!-- <input type="text" name="title" id="title" class="form-control"> -->
					<!-- <label for="description">description</label> -->
					<!-- <textarea name="description" id="des" class="form-control" rows="5"></textarea> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-warning">Delete</button>
				</div>
			</div>
		<!-- </form> -->
	</div>
</div>

@stop