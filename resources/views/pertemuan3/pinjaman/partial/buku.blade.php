<div class="card">
    <div class="card-header">
        <div class="card-title">Detail Buku</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <a href="{{ $buku->image_url }}" data-lightbox="book-image" data-title="{{ $buku->judul }}">
                    <img loading="lazy" id="imagePreview" src="{{ $buku->image_url }}" alt="Image Preview"
                        class="img-fluid">
                </a>
            </div>
            <div class="col-8">
                <h3 class=""><b>{{ $buku->judul }}</b></h3>
                <p class="card-text">Deskripsi : {{ $buku->deskripsi }}</p>
                <p class="card-text">Penulis : {{ $buku->penulis }}</p>
                <p class="card-text">Penerbit : {{ $buku->penerbit }}</p>
                <p class="card-text">Tahun Terbit : {{ $buku->tahun_terbit }}</p>
                <p class="card-text">Jumlah Halaman : {{ $buku->jumlah_halaman }}</p>
                <div>Kategori :
                    @foreach ($buku->kategoris as $kategoris)
                        <span class="badge bg-primary">{{ $kategoris->nama }}</span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
