@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-blueSoft/20 p-6 mt-6" x-data="{ editing: false }">
    
    <div class="text-center mb-6">
        <h1 class="text-lg font-semibold text-primary">Profil Saya</h1>
        <p class="text-sm text-blueSoft">Kelola informasi akun dan kata sandi Anda.</p>
    </div>

    {{-- ALERT --}}
    @if (session('status') === 'profile-updated')
        <div class="bg-green-50 border border-green-300 text-green-700 px-4 py-2 rounded-md mb-4 text-sm">
            Perubahan berhasil disimpan.
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-2 rounded-md mb-4 text-sm">
            Terjadi kesalahan. Periksa kembali input Anda.
        </div>
    @endif

    {{-- TAMPILAN PROFIL --}}
    <div x-show="!editing" class="space-y-4" x-cloak>
        <div>
            <p class="text-sm text-blueSoft">Nama Lengkap</p>
            <p class="font-medium text-primary">{{ $user->name }}</p>
        </div>
        <div>
            <p class="text-sm text-blueSoft">Alamat Email</p>
            <p class="font-medium text-primary">{{ $user->email }}</p>
        </div>

        <div class="pt-4 text-right">
            <button @click="editing = true"
                    class="bg-accent text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition">
                Edit Profil
            </button>
        </div>
    </div>

    {{-- FORM EDIT --}}
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5" x-show="editing" x-cloak>
        @csrf
        @method('PATCH')

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-medium text-blueSoft mb-1">Nama Lengkap</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none @error('name') border-red-400 @enderror">
            @error('name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-blueSoft mb-1">Alamat Email</label>
            <input id="email" type="email" value="{{ $user->email }}" readonly
                   class="w-full border border-blueSoft/20 rounded-lg px-3 py-2 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
        </div>

        <hr class="border-blueSoft/20">

        {{-- Kata Sandi --}}
        <div class="space-y-4">
            <h2 class="text-sm font-semibold text-primary">Ubah Kata Sandi</h2>

            <div>
                <label for="current_password" class="block text-sm font-medium text-blueSoft mb-1">Kata Sandi Lama</label>
                <input id="current_password" name="current_password" type="password" autocomplete="current-password"
                       class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none @error('current_password') border-red-400 @enderror">
                @error('current_password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-blueSoft mb-1">Kata Sandi Baru</label>
                <input id="password" name="password" type="password" autocomplete="new-password"
                       class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-blueSoft mb-1">Konfirmasi Kata Sandi Baru</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                       class="w-full border border-blueSoft/30 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary focus:outline-none">
            </div>
        </div>

        {{-- Tombol --}}
        <div class="pt-5 flex justify-between items-center">
            <button type="button" @click="editing = false"
                    class="text-sm text-blueSoft hover:text-primary transition">
                ← Batal
            </button>
            <button type="submit"
                    class="bg-accent text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
