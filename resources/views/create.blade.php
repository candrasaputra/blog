<!DOCTYPE html>
<html>
<head>
	<title>Halaman Create Post</title>
</head>
<body>
	<h1>Halaman Create Post</h1>

	<form action="{{ route('post.store') }}" method="post">
		{{ csrf_field() }}
		<label>Title</label>
		<input type="text" name="title">
		<br/>
		<label>Body</label>
		<textarea name="body"></textarea>
		<br/>
		<button type="submit">Simpan</button>
	</form>
</body>
</html>