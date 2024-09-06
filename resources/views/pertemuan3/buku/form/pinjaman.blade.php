<form action="{{ route('pinjaman.store', $data['buku']->id) }}" method="post">
    @csrf
    <!-- Nama Asli (non-editable) -->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" value="{{ Auth::user()->name }}" readonly>
    </div>
    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap">
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="buku_id">Buku</label>
        <input hidden type="text" class="form-control" id="buku_id" value="{{ $data['buku']->id }}" readonly>
        <input type="text" class="form-control" value="{{ $data['buku']->judul }}" readonly>
    </div>


    <!-- Alamat -->
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" required></textarea>
    </div>

    <!-- Tujuan -->
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" required>
    </div>

    <!-- Durasi Peminjaman -->
    <div class="form-group">
        <label for="durasi">Durasi Peminjaman (hari)
            <div class="return-date" id="returnDateContainer">
            </div>
        </label>
        <input type="number" class="form-control" id="durasi" min="1" required>
    </div>
    <a href="{{ route('buku.show', $data['buku']->id) }}" class="btn btn-secondary">
        Kembali
    </a>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
<script>
    document.getElementById('durasi').addEventListener('input', function() {
        const duration = parseInt(this.value, 10);
        const returnDateContainer = document.getElementById('returnDateContainer');

        if (isNaN(duration) || duration <= 0) {
            returnDateContainer.innerHTML = '';
            return;
        }

        const today = new Date();
        const returnDate = new Date(today);
        returnDate.setDate(today.getDate() + duration);

        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const formattedReturnDate = returnDate.toLocaleDateString('id-ID', options);

        returnDateContainer.innerHTML = `Tanggal Pengembalian: ${formattedReturnDate}`;
    });
</script>
