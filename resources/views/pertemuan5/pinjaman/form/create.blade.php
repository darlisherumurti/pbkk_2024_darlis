<form action="{{ route('pinjaman.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="username">Username</label>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="text" class="form-control" id="username" value="{{ Auth::user()->name }}" readonly>
    </div>

    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
            value="{{ old('nama_lengkap') }}" required>
        @error('nama_lengkap')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <input type="hidden" name="buku_id" value="{{ $data['buku']->id }}">

    <div class="form-group">
        <label for="buku_title">Buku</label>
        <input type="text" class="form-control" id="buku_title" value="{{ $data['buku']->judul }}" readonly>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea required type="text" class="form-control" rows="3" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman"
                    value="{{ old('tanggal_peminjaman') }}" required>
                @error('tanggal_peminjaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="durasi">Durasi Peminjaman (hari)
                    <span class="return-date" id="returnDateContainer">
                    </span>
                </label>
                <input type="number" class="form-control" id="durasi" name="durasi_peminjaman" min="1"
                    value="{{ old('durasi_peminjaman') }}" required>
                @error('durasi_peminjaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>




    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>

<script>
    document.getElementById('durasi').addEventListener('input', updateReturnDate);

    document.getElementById('tanggal_peminjaman').addEventListener('change', updateReturnDate);

    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        today.setDate(today.getDate());
        const minDate = today.toISOString().split('T')[0]; // Format YYYY-MM-DD
        document.getElementById('tanggal_peminjaman').setAttribute('min', minDate);
        document.getElementById('tanggal_peminjaman').value = minDate;

    });

    function updateReturnDate() {
        const duration = parseInt(document.getElementById('durasi').value, 10);
        const tanggalPeminjaman = document.getElementById('tanggal_peminjaman').value;
        const returnDateContainer = document.getElementById('returnDateContainer');

        if (isNaN(duration) || duration <= 0) {
            returnDateContainer.innerHTML = '';
            return;
        }

        if (!tanggalPeminjaman) {
            returnDateContainer.innerHTML = '';
            return;
        }

        const peminjamanDate = new Date(tanggalPeminjaman);
        if (isNaN(peminjamanDate.getTime())) {
            returnDateContainer.innerHTML = '';
            return;
        }

        const returnDate = new Date(peminjamanDate);
        returnDate.setDate(peminjamanDate.getDate() + duration);

        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const formattedReturnDate = returnDate.toLocaleDateString('id-ID', options);

        returnDateContainer.innerHTML = `: Tanggal Pengembalian: ${formattedReturnDate}`;
    }
</script>
