1. pastikan sudah ada php, composer dan npm terinstall.
2. ganti branch

```bash
git checkout -b pertemuan5 origin/pertemuan5
```

4. install dependency (jika perlu)

```bash
composer install
```

4. ganti atau copy file `.env.example` menjadi `.env` jika belum
5. tambahkan `database.sqlite` pada folder `/database` jika tidak ada
6. jalankan perintah migration

```bash
php artisan migrate

```

7. jalankan perintah seed

```bash
php artisan db:seed
```

8. jalankan perintah key:generate jika belum

```bash
php artisan key:generate
```

9. jalankan perintah build (vue & javascript)

```bash
npm run build
```

10. jalankan perintah storage link

```
php artisan storage:link
```

11. jalankan perintah untuk memulai

```bash
 php artisan serve
```
