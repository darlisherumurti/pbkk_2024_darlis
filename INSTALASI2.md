1. pastikan sudah ada php, composer dan npm terinstall.
2. clone branch ini

```bash
git clone -b pertemuan6  https://github.com/darlisherumurti/pbkk_2024_darlis <nama folder>
```

3. masuk ke folder

```bash
cd <nama folder>
```

4. install dependency

```bash
composer install
npm install
```

4. ganti atau copy file `.env.example` menjadi `.env`
5. tambahkan `database.sqlite` pada folder `/database`
6. jalankan perintah migration

```bash
php artisan migrate
```

7. jalankan perintah seed

```bash
php artisan db:seed
```

8. jalankan perintah

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
