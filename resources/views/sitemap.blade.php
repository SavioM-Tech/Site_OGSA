{{-- En-tête XML assemblé en morceaux : la suite « <'.'? » ne doit jamais figurer dans le fichier, certains
     hébergements (LWS) l'interprètent comme une ouverture de code PHP (short_open_tag). --}}
{!! '<'.'?xml version="1.0" encoding="UTF-8"?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach ($urls as $url)
    <url>
        <loc>{{ $url['loc'] }}</loc>
@foreach ($url['alternates'] as $hreflang => $href)
        <xhtml:link rel="alternate" hreflang="{{ $hreflang }}" href="{{ $href }}"/>
@endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $url['alternates']['fr'] }}"/>
        <changefreq>monthly</changefreq>
        <priority>{{ $url['priority'] }}</priority>
    </url>
@endforeach
</urlset>
