<!DOCTYPE html>
<html>
<head>
	<title>Post Page</title>
</head>
<body>
	<h1>Halaman Posts</h1>
	@if(count($posts) > 0)
		<ul>
			@foreach($posts as post)
				<a href="{{ route('post.show', $post['id']) }}"><li>{{ $post['title'] }}</li></a>
			@endforech
		</ul>
	@else
		<p>Tidak ada data</p>
	@endif
</body>
</html>