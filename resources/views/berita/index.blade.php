<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita') }}
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
                <a href="{{ url('/berita/tambah') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Kategori</td>
                            <td>Judul</td>
                            <td>Foto</td>
                            <td>Deskripsi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->kategori->nama }}</td>
                                <td>{{ $i->judul }}</td>
                                <td><img src="{{ Storage::url($i->foto) }}" alt="" width="100px"></td>
                                <td>{{ Str::limit($i->deskripsi, 70, '..... ') }}</td>
                                <td><a href="{{ route('beritaEdit', ['id' => $i->id]) }}"
                                        class="btn btn-sm btn-white text-success border-success"> <i
                                            class="fas fa-pen    "></i>
                                        Edit</a>
                                    <button type="button" class="btn btn-sm btn-white text-danger border-danger"
                                        data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                                        data-id="{{ $i->id }}" data-judul="{{ $i->judul }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $berita->links() }}
            </div>
        </div>
    </div>
    <!-- Modal Hapus-->
    <div class="modal fade exampleModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Berita </h5>
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
                var judul = button.data('judul')
                var modal = $(this)
                modal.find('.modal-text').text('Yakin ingin menghapus berita ' + judul + ' ?')
                document.getElementById('formHapus').action = '/berita/' + id;
            })
        });
    </script>
</x-app-layout>
