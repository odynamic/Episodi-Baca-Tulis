@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-primary">Cerita Saya</h2>
        <a href="{{ route('stories.create') }}" 
           class="bg-accent text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition">
            + Tambah Cerita
        </a>
    </div>

    @if ($stories->isEmpty())
        <p class="text-blueSoft text-sm text-center py-10">
            Belum ada cerita. Yuk, buat cerita pertamamu!
        </p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach ($stories as $story)
                <div class="bg-white rounded-xl overflow-hidden border border-blueSoft/20 shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="w-full aspect-[4/5] bg-gray-100 overflow-hidden flex items-center justify-center">
                        @if ($story->cover)
                            <img src="{{ asset('storage/' . $story->cover) }}" 
                                 alt="{{ $story->title }}" 
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
                                {{ $story->description ?? 'Tanpa deskripsi' }}
                            </p>
                        </div>

                        <div class="mt-2 flex justify-between items-center text-[11px]">
                            <a href="{{ route('stories.show', $story) }}" class="text-accent font-medium hover:opacity-80 transition">
                                Buka →
                            </a>
                            <form action="{{ route('stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Hapus cerita ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
