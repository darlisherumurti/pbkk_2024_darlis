## Cara menggunakan project ini.     
1 pastikan sudah ada php dan composer terinstall.  
2 clone repo ini
```bash
git clone https://github.com/darlisherumurti/pbkk_2024_darlis pbkk_24
```
3 install dependency
```bash
composer install
```
4 ganti / copy file .env.example menjadi .env.   
5 tambahkan database.sqlite pada folder /database. 
6 jalankan perintah migration
```bash
php artisan migrate
```
7 jalankan perintah 
```bash
php artisan key:generate
```
8 jalankan perintah untuk memulai
```bash
 php artisan serve
``` 
