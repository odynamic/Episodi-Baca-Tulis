<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('user_id', Auth::id())->latest()->get();
        return view('stories.index', compact('stories'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $validated['user_id'] = Auth::id();

        $story = Story::create($validated);

        return redirect()
            ->route('stories.show', $story)
            ->with('success', 'Cerita berhasil dibuat.');
    }

    public function show(Story $story)
    {
        $story->load('episodes');
        return view('stories.show', compact('story'));
    }

    public function edit(Story $story)
    {
        if ($story->user_id !== Auth::id()) abort(403);
        return view('stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        if ($story->user_id !== Auth::id()) abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($story->cover) {
                Storage::disk('public')->delete($story->cover);
            }
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $story->update($validated);

        return redirect()
            ->route('stories.index')
            ->with('success', 'Cerita berhasil diperbarui.');
    }

    public function destroy(Story $story)
    {
        if ($story->user_id !== Auth::id()) abort(403);

        if ($story->cover) {
            Storage::disk('public')->delete($story->cover);
        }

        $story->delete();

        return redirect()
            ->route('stories.index')
            ->with('success', 'Cerita berhasil dihapus.');
    }
}
