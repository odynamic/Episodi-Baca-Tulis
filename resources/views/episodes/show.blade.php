@extends('layouts.app')

@section('content')
<div class="bg-white rounded-none shadow-sm border-t border-blueSoft/20 p-8 sm:p-12">
    <div class="mb-6 border-b border-blueSoft/20 pb-4">
        <h1 class="text-2xl font-bold text-primary leading-tight">
            {{ $episode->title }}
        </h1>
        <p class="text-sm text-blueSoft mt-1">
            Bagian dari cerita:
            <a href="{{ route('stories.show', $story) }}" class="text-accent font-semibold hover:underline">
               {{ $story->title }}
            </a>
        </p>
    </div>

    <div class="text-gray-700 text-[15px] leading-relaxed space-y-5">
        {!! nl2br(e($episode->content)) !!}
    </div>

    <div class="flex justify-between items-center mt-10 pt-6 border-t border-blueSoft/20 text-sm font-medium">
        @if($previous)
            <a href="{{ route('stories.episodes.show', [$story, $previous]) }}" class="text-primary hover:text-accent transition">
                ← Episode Sebelumnya
            </a>
        @else
            <span></span>
        @endif

        @if($next)
            <a href="{{ route('stories.episodes.show', [$story, $next]) }}" class="text-primary hover:text-accent transition">
                Episode Selanjutnya →
            </a>
        @endif
    </div>

    @if (Auth::id() === $story->user_id)
    <div class="flex justify-end gap-3 mt-10 pt-5 border-t border-blueSoft/20">
        <a href="{{ route('stories.episodes.edit', [$story, $episode]) }}" class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-blueSoft transition">
           Edit Episode
        </a>
        <form action="{{ route('stories.episodes.destroy', [$story, $episode]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus episode ini?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition">
                Hapus
            </button>
        </form>
    </div>
    @endif
</div>
@endsection
