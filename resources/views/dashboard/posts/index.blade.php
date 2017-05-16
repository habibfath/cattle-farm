@extends('dashboard.layouts.master')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('admin.post.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Thumbnails</th>
					<th>Title</th>
					<th>Content</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>

					@foreach ($posts as $post)

						<tr>
							<th>{{ $post->id }}</th>
							<td><img src="/images/{{ $post->image }}" alt="" style="height:70px; width:150px;"></td>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->content), 0, 50) }}{{ strlen(strip_tags($post->content)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>

@stop
