<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="container m-5">
        <div class="card">
            <div class="card-header">
                Edit Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('kategoriUpdate', ['id' => $id->id]) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" value="{{ $id->nama }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/kategori" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
