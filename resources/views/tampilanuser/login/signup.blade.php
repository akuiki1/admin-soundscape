@extends('components.layout')

@section('content')
    <div class="px-4 md:px-0">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-4xl mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Signup
                </h2>
                <p class="mb-4">Buat akun untuk mengakses fitur</p>
            </header>

            <form method="POST" action="/users">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Nama</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="{{ old('name') }}" placeholder="Masukkan Nama" />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ old('email') }}" placeholder="Masukkan Email" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" placeholder="Masukkan Password" />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="inline-block text-lg mb-2">
                        Konfirmasi Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full"
                        name="password_confirmation" placeholder="Masukkan Ulang Password" />

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="phone" class="inline-block text-lg mb-2">Nomor Telepon</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone"
                        value="{{ old('phone') }}" placeholder="Masukkan Nomor Telepon" />

                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">Lokasi</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                        value="{{ old('location') }}" placeholder="Masukkan Lokasi" />

                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="about_me" class="inline-block text-lg mb-2">Tentang Saya</label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="about_me" placeholder="Ceritakan tentang diri Anda">{{ old('about_me') }}</textarea>

                    @error('about_me')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Daftar
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Sudah Punya Akun?
                        <a href="{{ route('login-user') }}" class="text-laravel">Login</a>
                    </p>
                    <p>
                        Anda Admin?
                        <a href="{{ route('login') }}" class="text-laravel">Login Disini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
