<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   @foreach($users as $users_row)
        <url>
            <loc>{{ url('/') }}/{{$my_url}}{{ $users_row->username }}</loc>
            <lastmod>{{ Carbon::parse($users_row->created_at)->format('Y-m-d') }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
      
<!-- {{ $users->links() }} -->