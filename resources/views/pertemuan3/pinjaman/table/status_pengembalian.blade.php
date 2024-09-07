<h5>
    @if ($status == 'Belum dikembalikan')
        <span class="badge badge-danger">{{ $status }}</span>
    @elseif($status == 'Sudah dikembalikan')
        <span class="badge badge-success">{{ $status }}</span>
    @else
        <span>-</span>
    @endif
</h5>
