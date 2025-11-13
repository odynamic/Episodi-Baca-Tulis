@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-blueSoft/20 p-6 mt-6">
    <h2 class="text-lg font-semibold text-primary mb-5">Buat Cerita Baru</h2>

    {{-- ALERT --}}
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

    <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Judul --}}
        <div>
            <label for="title" class="block text-sm font-medium text-blueSoft mb-1">Judul Cerita</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title') }}"
                required
                class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">
        </div>

        {{-- Sinopsis --}}
        <div>
            <label for="description" class="block text-sm font-medium text-blueSoft mb-1">Sinopsis</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">{{ old('description') }}</textarea>
        </div>

        {{-- Cover --}}
        <div>
            <label for="cover" class="block text-sm font-medium text-blueSoft mb-1">Cover Cerita</label>
            <input
                type="file"
                name="cover"
                id="cover"
                accept="image/*"
                class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-between items-center pt-3">
            <a href="{{ route('stories.index') }}" class="text-sm text-blueSoft hover:text-primary transition">
                ← Kembali
            </a>
            <button
                type="submit"
                class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blueSoft transition">
                Simpan Cerita
            </button>
        </div>
    </form>
</div>
@endsection
