@extends('components.layout')

@section('content')
    <div class="px-4 md:px-0">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-4xl mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Login
                </h2>
                <p class="mb-4">Login untuk mengakses akun Anda</p>
            </header>

            <form method="POST" action="{{ route('user-auth') }}">
                @csrf

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
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Login
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Belum Punya Akun?
                        <a href="{{ route('signup-user') }}" class="text-laravel">Daftar Sekarang</a>
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
