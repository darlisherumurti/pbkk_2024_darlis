<table id="peminjamanTable" class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Buku</th>
        <th>Username</th>
        <th>Status Persetujuan</th>
        <th>Status Pengembalian</th>
        <th>Tanggal Peminjaman</th>
        <th>Durasi Peminjaman</th>
        <th>
            Aksi
        </th>
    </tr>
    @foreach ($pinjaman as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>
                <a href="{{ route('buku.show', $p->buku->id) }}">{{ Str::limit($p->buku->judul, 18, '...') }}</a>
            </td>
            <td>{{ Str::limit($p->user->name, 16, '...') }}</td>
            <td>
                @include('pertemuan3.pinjaman.table.persetujuan', [
                    'status' => $p->status_persetujuan,
                ])
            </td>
            <td>@include('pertemuan3.pinjaman.table.pengembalian', [
                'status' => $p->status_pengembalian,
            ])
            </td>
            <td>{{ $p->tanggal_peminjaman }}</td>
            <td>{{ $p->durasi_peminjaman }} Hari</td>
            <td>
                <div class="d-flex">
                    @if (request()->is('pertemuan3/pinjaman/me'))
                        <a href="{{ route('pinjaman.show', $p->id) }}" class="btn btn-sm mr-2 btn-primary">Detail</a>
                    @elseif(request()->is('pertemuan3/pinjaman/list'))
                        @role('admin|petugas')
                            <a href="{{ route('pinjaman.detail', $p->id) }}" class="btn btn-sm mr-2 btn-primary">Detail</a>
                        @endrole
                    @endif
                    @role('admin|petugas')
                        @if ($p->status_persetujuan == 'Menunggu Persetujuan')
                            <form class="actionForm" action="{{ route('pinjaman.setujui', $p->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm mr-2 btn-success">Setujui</button>
                            </form>
                            <form class="actionForm" action="{{ route('pinjaman.tolak', $p->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm mr-2 btn-danger">Tolak</button>
                            </form>
                        @endif
                    @endrole
                </div>
            </td>

        </tr>
    @endforeach
</table>

{{-- scripts --}}
@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#peminjamanTable').DataTable({
                responsive: true
                paging: true,
                searching: true,
                ordering: true,
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@endpush
@role('admin|petugas')
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.actionForm').forEach(form => {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent the form from submitting immediately

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Submit the form
                                form.submit();
                            }
                        });
                    });
                });
            })
        </script>
    @endpush
@endrole
