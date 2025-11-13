@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    {{-- Bagian atas: cover + info cerita --}}
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-blueSoft/20">
        <div class="flex flex-col md:flex-row gap-5 md:gap-6">

            {{-- Cover --}}
            @if ($story->cover)
                <div class="flex-shrink-0 w-full md:w-52 h-64 rounded-lg overflow-hidden shadow-sm mx-auto md:mx-0">
                    <img src="{{ asset('storage/' . $story->cover) }}" 
                         alt="Cover Cerita" 
                         class="w-full h-full object-cover object-center">
                </div>
            @else
                <div class="flex-shrink-0 w-full md:w-52 h-64 rounded-lg bg-gray-100 flex items-center justify-center text-blueSoft/60 text-sm">
                    Tidak ada cover
                </div>
            @endif

            {{-- Info cerita --}}
            <div class="flex flex-col justify-between flex-1 space-y-3">
                <div>
                    <h1 class="text-xl font-bold text-primary mb-1">{{ $story->title }}</h1>
                    <p class="text-gray-700 leading-relaxed text-sm">
                        {{ $story->description ?? 'Tidak ada deskripsi.' }}
                    </p>
                </div>

                <div class="text-xs text-gray-500 flex flex-wrap justify-between">
                    <p>Dibuat oleh: <span class="font-medium text-primary">{{ $story->user->name ?? 'Anonim' }}</span></p>
                    <p>{{ $story->created_at->translatedFormat('d M Y') }}</p>
                </div>

                @if (Auth::id() === $story->user_id)
                    <div class="flex flex-wrap gap-2 pt-1">
                        <a href="{{ route('stories.episodes.create', $story) }}" 
                           class="bg-primary text-white px-3 py-1.5 rounded-md text-xs hover:bg-blueSoft transition">
                            + Tambah Episode
                        </a>
                        <a href="{{ route('stories.edit', $story) }}" 
                           class="bg-accent text-white px-3 py-1.5 rounded-md text-xs hover:opacity-90 transition">
                            Edit Cerita
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Daftar episode --}}
    <div class="rounded-2xl overflow-hidden border border-blueSoft/20 shadow-sm">
        {{-- Header biru --}}
        <div class="bg-primary text-beige px-5 py-3">
            <h2 class="text-base font-semibold tracking-wide">Daftar Episode</h2>
        </div>

        {{-- Isi daftar --}}
        <div class="bg-white p-4 md:p-5">
            @if ($story->episodes->isEmpty())
                <p class="text-gray-500 text-sm">Belum ada episode untuk cerita ini.</p>
            @else
                <div class="divide-y divide-blueSoft/10">
                    @foreach ($story->episodes as $ep)
                        <a href="{{ route('stories.episodes.show', [$story, $ep]) }}" 
                           class="block py-3 px-1 hover:bg-beige transition rounded-md">
                            <h3 class="font-medium text-primary text-sm">
                                {{ $ep->title }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
