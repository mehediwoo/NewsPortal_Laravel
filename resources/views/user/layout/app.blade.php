
@php
    $seo = App\Models\seo::first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="meta_author" content="{{ $seo->meta_author }}">
        <meta name="meta_title" content="{{ $seo->meta_title }}">
        <meta name="meta_keyword" content="{{ $seo->meta_keyword }}">
        <meta name="meta_description" content="{{ $seo->meta_description }}">
        <meta name="google_analytics" content="{{ $seo->google_analytics }}">
        <meta name="alexa_analytics" content="{{ $seo->alexa_analytics }}">
        <meta name="google_verification" content="{{ $seo->google_verification }}">
        @yield('meta')
        <title>@yield('title')</title>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('user/assets/img/fav.png') }}">
        <link href="{{ asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/assets/style.css') }}" rel="stylesheet">
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6469e03a58d85b001927b9f4&product=inline-share-buttons&source=platform" data-href="{{ Request::url() }}" async="async"></script>
    </head>
    <body>
        <!-- header-start -->
            @include('user.layout.header')
        <!-- /.header-close -->

        <!-- top-add-start -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <div class="top-add"><img src="{{ asset('user/assets/img/add.jpg') }}" alt="" /></div>
                    </div>
                </div>
            </div>
        </section> <!-- /.top-add-close -->

        <!-- date-start -->
        @include('user.layout.date')
        <!-- /.date-close -->

        <!-- notice-start -->
        @include('user.layout.headline')
        @include('user.layout.notice')

        <!-- Content Section -->
        @yield('content')

		<!-- Footer -->
		@include('user.layout.footer')


		<script src="{{ asset('user/assets/js/jquery.min.j') }}s"></script>
		<script src="{{ asset('user/assets/js/bootstrap.min.j') }}s"></script>
		<script src="{{ asset('user/assets/js/main.js') }}"></script>
		<script src="{{ asset('user/assets/js/owl.carousel.min.j') }}s"></script>
	</body>
</html>
