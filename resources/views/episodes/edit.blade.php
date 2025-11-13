@extends('layouts.app')

@section('content')
<div class="bg-white rounded-none shadow-sm border-t border-blueSoft/20 p-8 sm:p-12 max-w-4xl mx-auto">

    <h2 class="text-2xl font-bold text-primary mb-6">Edit Episode</h2>

    {{-- Pesan sukses/error --}}
    @if(session('success'))
        <div class="p-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="p-3 bg-red-50 border border-red-200 text-red-700 text-sm rounded-md mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stories.episodes.update', [$story, $episode]) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-primary mb-1">Judul Episode</label>
            <input type="text" name="title" 
                   value="{{ old('title', $episode->title) }}" 
                   class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-accent/50 focus:outline-none" 
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-primary mb-1">Isi Cerita</label>
            <textarea name="content" rows="10"
                      class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-accent/50 focus:outline-none"
                      required>{{ old('content', $episode->content) }}</textarea>
        </div>

        <div class="flex justify-between items-center pt-2">
            <a href="{{ route('stories.show', $story) }}" 
               class="text-sm text-gray-500 hover:text-primary transition">
               Batal
            </a>

            <button type="submit" 
                    class="bg-accent text-white px-5 py-2 rounded-md text-sm hover:opacity-90 transition">
                Update Episode
            </button>
        </div>
    </form>
</div>
@endsection
