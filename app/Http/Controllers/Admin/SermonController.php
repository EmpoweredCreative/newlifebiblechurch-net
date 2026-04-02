<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSermonRequest;
use App\Http\Requests\Admin\UpdateSermonRequest;
use App\Models\Sermon;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SermonController extends Controller
{
    public function index(): Response
    {
        $sermons = Sermon::query()->publishedLatest()->get();

        return Inertia::render('Admin/Sermons/Index', [
            'sermons' => $sermons->map(fn (Sermon $s) => [
                'id' => $s->id,
                'title' => $s->title,
                'slug' => $s->slug,
                'published_at' => $s->published_at?->toIso8601String(),
                'updated_at' => $s->updated_at->toIso8601String(),
            ]),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Sermons/Create');
    }

    public function store(StoreSermonRequest $request): RedirectResponse
    {
        Sermon::query()->create($request->validated());

        return redirect()->route('admin.sermons.index')->with('success', 'Message published.');
    }

    public function edit(Sermon $sermon): Response
    {
        return Inertia::render('Admin/Sermons/Edit', [
            'sermon' => [
                'id' => $sermon->id,
                'title' => $sermon->title,
                'description' => $sermon->description,
                'video_url' => $sermon->video_url,
                'published_at' => $sermon->published_at?->format('Y-m-d\TH:i'),
            ],
        ]);
    }

    public function update(UpdateSermonRequest $request, Sermon $sermon): RedirectResponse
    {
        $sermon->update($request->validated());

        return redirect()->route('admin.sermons.index')->with('success', 'Message updated.');
    }

    public function destroy(Sermon $sermon): RedirectResponse
    {
        $sermon->delete();

        return redirect()->route('admin.sermons.index')->with('success', 'Message removed.');
    }
}
