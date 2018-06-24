<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">
    <channel>
        {{ $meta }}
        @foreach($items as $item)
            <item>
                <id>{{ url($item->id) }}</id>
                <title><![CDATA[{{ $item->title }}]]></title>
                <itunes:subtitle><![CDATA[{!! $item->subtitle !!}]]></itunes:subtitle>
                <summary type="html"><![CDATA[{!! $item->summary !!}]]></summary>
                <itunes:summary type="html"><![CDATA[{!! $item->summary !!}]]></itunes:summary>
                <description type="html">
                    <![CDATA[{!! $item->summary !!}]]>
                </description>
                <itunes:author><![CDATA[{{ $item->author }}]]></itunes:author>
                <author>
                    <name> <![CDATA[{{ $item->author }}]]></name>
                    <email>{{$item->email}}</email>
                </author>
                @if(strlen($item->link))
                    <link rel="alternate">{{ $item->link }}</link>
                @endif
                @if(strlen($item->itunes_block))
                    <itunes:block>{{ $item->itunes_block }}</itunes:block>
                @endif
                @if(strlen($item->enclosure))
                    <enclosure>{{ $item->enclosure }}</enclosure>
                @endif
                @if($item->duration)
                    <itunes:duration>{{ $item->duration }}</itunes:duration>
                @endif
                <updated>{{ $item->updated_at->toAtomString() }}</updated>
                <guid isPermaLink="false">{{ $item->guid }}</guid>
                <itunes:explicit>{{ $item->itunes_explicit }}</itunes:explicit>
                <pubDate>{{ $item->published_at->toAtomString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
