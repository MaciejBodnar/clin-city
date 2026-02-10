<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ esc_attr(get_bloginfo('description')) }}">
    <meta name="author" content="{{ esc_attr(get_bloginfo('name')) }}">
    <meta name="keywords" content="clinic, wellness, health, lifestyle">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ esc_attr(get_bloginfo('name')) }}">
    <meta property="og:description" content="{{ esc_attr(get_bloginfo('description')) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ esc_url(home_url('/')) }}">
    @php(do_action('get_header'))
    @php(wp_head())

    <link rel="stylesheet" href="https://use.typekit.net/avj8yvl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())
    style="background-image: url('{{ get_template_directory_uri() }}/resources/images/golden-background-with-palm-tree(1).png'); background-attachment: fixed; background-size: cover; background-position: center;">
    @php(wp_body_open())

    <div id="app">
        @section('header')
            @include('sections.header')
        @show

        <main id="main" class="main">
            @yield('content')
        </main>
        @unless (is_page_template('welcome-page.blade.php'))
            @section('footer')
                @include('sections.footer')
            @show
        @endunless


    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
