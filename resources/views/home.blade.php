@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <h2 class="text-xl font-bold text-primary">Beranda</h2>

    @if ($stories->isEmpty())
        <p class="text-blueSoft text-sm text-center py-10">
            Belum ada cerita yang diterbitkan.
        </p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach ($stories as $story)
                <div class="bg-white rounded-xl overflow-hidden border border-blueSoft/20 shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="w-full aspect-[4/5] bg-gray-100 overflow-hidden flex items-center justify-center">
                        @if ($story->cover)
                            <img src="{{ asset('storage/'.$story->cover) }}"
                                 alt="Cover"
                                 class="w-full h-full object-cover object-center">
                        @else
                            <div class="text-blueSoft/60 text-[10px]">No Cover</div>
                        @endif
                    </div>

                    <div class="p-3 flex flex-col flex-grow justify-between">
                        <div>
                            <h3 class="text-[13px] font-semibold text-primary truncate leading-snug">
                                {{ $story->title }}
                            </h3>
                            <p class="text-[10px] text-blueSoft mt-0.5 truncate">
                                oleh {{ $story->user->name }}
                            </p>
                        </div>

                        <a href="{{ route('stories.show', $story->id) }}"
                           class="mt-2 text-[11px] text-accent font-medium hover:opacity-80 transition text-right">
                            Baca →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
