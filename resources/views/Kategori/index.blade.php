<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="container m-5 mx-auto">
        {{-- Alert --}}
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning alert-dismissible show fade">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="{{ url('/kategori/tambah') }}" class="btn btn-sm btn-primary">Tambah Data</a>
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
                        @foreach ($kategori as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->nama }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-white border-success text-success dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('beritaEdit', ['id' => $i->id]) }}"
                                                    class="dropdown-item">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter" data-id="{{ $i->id }}"
                                                    data-nama="{{ $i->nama }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kategori->links() }}
            </div>
        </div>
    </div>
    <!-- Modal Hapus-->
    <div class="modal fade exampleModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Kategori </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formHapus">
                        @method('delete')
                        @csrf
                        <p class="modal-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampleModalCenter').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                var nama = button.data('nama')
                var modal = $(this)
                modal.find('.modal-text').text('Yakin ingin menghapus kategori ' + nama + ' ?')
                document.getElementById('formHapus').action = '/kategori/' + id;
            })
        });
    </script>
</x-app-layout>
