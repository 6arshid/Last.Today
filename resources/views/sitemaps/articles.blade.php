<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   @foreach($articles as $articles_row)
        <url>
            <loc>{{ url('/') }}/app/articles/{{ $articles_row->article_slug }}</loc>
            <lastmod>{{ Carbon::parse($articles_row->created_at)->format('Y-m-d') }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
      
<!-- {{ $articles->links() }} -->