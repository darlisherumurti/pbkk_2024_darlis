## Cara menggunakan project ini.     
1. pastikan sudah ada php dan composer terinstall.  
2. clone repo ini
```bash
git clone https://github.com/darlisherumurti/pbkk_2024_darlis <nama folder>
```
3. masuk ke folder dan install dependency
```bash
cd <nama folder>
composer install
```
4. ganti atau copy file `.env.example` menjadi `.env`    
5. tambahkan `database.sqlite` pada folder /database. 
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
9. jalankan perintah untuk memulai
```bash
 php artisan serve
``` 
