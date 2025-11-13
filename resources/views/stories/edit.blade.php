@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-blueSoft/20 p-6 mt-6">
    <h2 class="text-lg font-semibold text-primary mb-5">Edit Cerita</h2>

    @if(session('success'))
        <div class="bg-green-50 border border-green-300 text-green-700 px-4 py-2 rounded-md mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-2 rounded-md mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stories.update', $story) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div>
            <label class="block text-sm font-medium text-blueSoft mb-1">Judul Cerita</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $story->title) }}"
                   required
                   class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">
        </div>

        {{-- Sinopsis --}}
        <div>
            <label class="block text-sm font-medium text-blueSoft mb-1">Sinopsis</label>
            <textarea name="description" rows="4"
                      class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">{{ old('description', $story->description) }}</textarea>
        </div>

        {{-- Cover --}}
        <div>
            <label class="block text-sm font-medium text-blueSoft mb-1">Cover (opsional)</label>
            <input type="file"
                   name="cover"
                   class="block w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">
            @if($story->cover)
                <img src="{{ asset('storage/'.$story->cover) }}" 
                     alt="Cover" 
                     class="w-32 h-32 object-cover mt-2 rounded-lg border border-blueSoft/30">
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex justify-between items-center pt-3">
            <a href="{{ route('stories.index') }}" class="text-sm text-blueSoft hover:text-primary transition">
                ← Kembali
            </a>
            <button type="submit" class="bg-accent text-white px-4 py-2 rounded-lg text-sm hover:opacity-90 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
