<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/">
    <channel>
        <title>
            <![CDATA[ Mobile Phone Price in Bangladesh 2024 | mobilekhor.com ]]>
        </title>
        <atom:link href="https://mobilekhor.com/feed" rel="self" type="application/rss+xml" />
        <link>
        <![CDATA[ https://mobilekhor.com/feed ]]>
        </link>
        <description>
            <![CDATA[ mobilekhor.com - find new and latest mobile phone, smartphone, feature phone etc. official and unoffiacal price in Bangladesh 2024. ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now()->toRssString() }}</pubDate>

        @foreach ($posts as $post)
            <item>
                <title>
                    <![CDATA[{{ $post->model_title }}]]>
                </title>
                <link>{{ url('/') }}/model/{{ $post->model_slug }}</link>
                <description>
                    <![CDATA[{!! $post->model_description !!}]]>
                </description>
                <category>{{ $post->mobileBrand->brand_name }}</category>
                <author>
                    <![CDATA[ {!! $post->user->email !!} ({!! $post->user->name !!})]]>
                </author>
                <guid>{{ url('/') }}/model/{{ $post->model_slug }}</guid>
                <media:content url='{!! asset('images/model_images/'. $post->model_image) !!}' medium='image'/>
                <pubDate>{{ $post->published_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
