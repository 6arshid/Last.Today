<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   @foreach($searchs as $searchs_row)
        <url>
            <loc>{{ url('/') }}/app/search/{{ $searchs_row->search_query }}</loc>
            <lastmod>{{ Carbon::parse($searchs_row->created_at)->format('Y-m-d') }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
      
