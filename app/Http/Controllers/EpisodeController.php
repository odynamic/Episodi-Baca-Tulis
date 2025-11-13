<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    public function index(Story $story)
    {
        $this->authorizeStory($story);
        $episodes = $story->episodes()->latest()->get();
        return view('episodes.index', compact('story', 'episodes'));
    }

    public function create(Story $story)
    {
        $this->authorizeStory($story);
        return view('episodes.create', compact('story'));
    }

    public function store(Request $request, Story $story)
    {
        $this->authorizeStory($story);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['story_id'] = $story->id;

        Episode::create($validated);

        return redirect()
            ->route('stories.show', $story)
            ->with('success', 'Episode berhasil ditambahkan!');
    }

    public function show(Story $story, Episode $episode)
    {
        if ($episode->story_id !== $story->id) {
            abort(404);
        }

        $previous = $story->episodes()
            ->where('id', '<', $episode->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = $story->episodes()
            ->where('id', '>', $episode->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('episodes.show', compact('story', 'episode', 'previous', 'next'));
    }

    public function edit(Story $story, Episode $episode)
    {
        $this->authorizeStory($story);
        return view('episodes.edit', compact('story', 'episode'));
    }

    public function update(Request $request, Story $story, Episode $episode)
    {
        $this->authorizeStory($story);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $episode->update($validated);

        return redirect()
            ->route('stories.show', $story)
            ->with('success', 'Episode berhasil diperbarui!');
    }

    public function destroy(Story $story, Episode $episode)
    {
        $this->authorizeStory($story);

        $episode->delete();

        return redirect()
            ->route('stories.show', $story)
            ->with('success', 'Episode berhasil dihapus.');
    }

    private function authorizeStory(Story $story)
    {
        if ($story->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
