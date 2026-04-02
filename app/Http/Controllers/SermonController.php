<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use App\Support\VideoEmbed;
use Inertia\Inertia;
use Inertia\Response;

class SermonController extends Controller
{
    public function index(): Response
    {
        $sermons = Sermon::query()->publishedLatest()->get();

        $latest = $sermons->first();

        $featured = $latest
            ? [
                'title' => $latest->title,
                'description' => $latest->description,
                'slug' => $latest->slug,
                'embedUrl' => VideoEmbed::toEmbedUrl($latest->video_url),
                'posterUrl' => VideoEmbed::posterUrl($latest->video_url),
            ]
            : [
                'title' => 'Latest Sermon',
                'description' => 'Biblical teaching for everyday life. New sermons will appear here when published.',
                'slug' => null,
                'embedUrl' => null,
                'posterUrl' => null,
            ];

        $sermonList = $sermons->skip(1)->values()->map(fn (Sermon $s) => [
            'title' => $s->title,
            'description' => $s->description,
            'slug' => $s->slug,
            'published_at' => $s->published_at?->toIso8601String(),
            'posterUrl' => VideoEmbed::posterUrl($s->video_url),
        ]);

        return Inertia::render('Media', [
            'featured' => $featured,
            'sermons' => $sermonList,
        ]);
    }

    public function show(Sermon $sermon): Response
    {
        return Inertia::render('Media/Show', [
            'sermon' => [
                'title' => $sermon->title,
                'description' => $sermon->description,
                'slug' => $sermon->slug,
                'published_at' => $sermon->published_at?->format('F j, Y'),
            ],
            'embedUrl' => VideoEmbed::toEmbedUrl($sermon->video_url),
        ]);
    }
}
