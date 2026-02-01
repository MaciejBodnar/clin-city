<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    <link rel="stylesheet" href="https://use.typekit.net/avj8yvl.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())
    style="background-image: url('{{ get_template_directory_uri() }}/resources/images/golden-background-with-palm-tree(1).png'); background-attachment: fixed; background-size: cover; background-position: center;">
    @php(wp_body_open())

    <div id="app">
        @include('sections.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
