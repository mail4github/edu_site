<!DOCTYPE html>
<html lang="ru-RU">
	<head prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#">
		{!! Meta::toHtml() !!}
	</head>
	<body>
		<div class="wrapper">
			@yield('header')
			<div class="content">
				@yield('content')
			</div>
			@yield('banner')
			@yield('footer')
		</div>
    </body>
</html>