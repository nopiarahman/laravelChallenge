<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="container m-5">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('/kategori/tambah') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Kategori</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
