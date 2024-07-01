<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation=" http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>https://www.astuteanalytica.com</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/industries</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/services</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.7000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/insights</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.7000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/press-release</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/latest-report</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9000</priority>
    </url>
    <url>
        <loc>https://www.astuteanalytica.com/trending-report</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9000</priority>
    </url>

    

    @foreach($category as $data)
    <url>
        <loc>https://www.astuteanalytica.com/industry/{{$data->slug}}</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8000</priority>
    </url>
    @endforeach
    @foreach($report as $data)
    <url>
        <loc>https://www.astuteanalytica.com/industry-report/{{$data->report_slug}}</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9000</priority>
    </url>
    @endforeach
    @foreach($press as $data)
    <url>
        <loc>https://www.astuteanalytica.com/press-release/{{$data->press_relase_slug}}</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8000</priority>
    </url>
    @endforeach
    @foreach($inside as $data)
    <url>
        <loc>https://www.astuteanalytica.com/press-release/{{$data->astute_inside_slug}}</loc>
        <lastmod>{{date('Y-m-d')}}T{{date('h:i:s')}}+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.7000</priority>
    </url>
    @endforeach

</urlset>