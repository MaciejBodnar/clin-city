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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L2HHYEY0W9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-L2HHYEY0W9');
    </script>

    <!-- Google Tag Manager CD <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MVPG2QJ');
    </script>End Google Tag Manager -->
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '810624247129332');
        fbq('track', 'PageView');
    </script><noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=810624247129332&ev=PageView&noscript=1" /></noscript><!-- End Meta Pixel Code -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KZ45JNQ6');
    </script><!-- End Google Tag Manager -->
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
