-- SQLite
SELECT * 
FROM "pinjamans" 
WHERE "pinjamans"."user_id" = ? 
  AND "pinjamans"."user_id" IS NOT NULL 
  AND (
    "pinjamans"."id" LIKE ? 
    OR "pinjamans"."user_id" LIKE ? 
    OR "pinjamans"."buku_id" LIKE ? 
    OR "pinjamans"."status_persetujuan" LIKE ? 
    OR "pinjamans"."status_pengembalian" LIKE ? 
    OR "pinjamans"."nama_lengkap" LIKE ? 
    OR "pinjamans"."alamat" LIKE ? 
    OR "pinjamans"."keterangan" LIKE ? 
    OR "pinjamans"."durasi_peminjaman" LIKE ? 
    OR "pinjamans"."tanggal_peminjaman" LIKE ? 
    OR "pinjamans"."tanggal_disetujui" LIKE ? 
    OR "pinjamans"."tanggal_pengembalian" LIKE ? 
    OR "pinjamans"."tanggal_dikembalikan" LIKE ?
  ) 
  AND EXISTS (
    SELECT * 
    FROM "buku" 
    WHERE "pinjamans"."buku_id" = "buku"."id" 
      AND "judul" LIKE ?
  )
