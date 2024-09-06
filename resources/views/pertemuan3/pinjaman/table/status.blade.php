<h5>
    @if ($status == 'Menunggu Persetujuan')
        <span class="badge badge-warning">{{ $status }}</span>
    @elseif($status == 'Disetujui')
        <span class="badge badge-primary">{{ $status }}</span>
    @elseif($status == 'Ditolak')
        <span class="badge badge-warning">{{ $status }}</span>
    @elseif($status == 'Dikembalikan')
        <span class="badge badge-success">{{ $status }}</span>
    @endif
</h5>

{{-- 'Menunggu Persetujuan', 'Disetujui', 'Ditolak', 'Dikembalikan' --}}
