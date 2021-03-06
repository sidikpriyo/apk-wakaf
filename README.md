# Sistem Penggalangan Dana Sosial Menggunakan Payment Gateway

Sistem penggalangan dana sosial untuk pimpinan wilayah muhammadiyah daerah istimewa yogyakarta menggunakan payment gateway sebagai metode pembayaran non-tunai.

User dan password:

```
pengelola@wakaf.id : rahasia
lembaga@wakaf.id : rahasia
donatur@wakaf.id : rahasia
```

## PHP Dependencies

- laravel/laravel
- laravel-frontend-presets/tall
- laravel/breeze
- livewire/livewire
- MedicOneSystems/livewire-datatables

## JS Dependencies

- @tailwindcss/forms
- @tailwindcss/typography
- alpinejs
- autoprefixer
- laravel-mix
- laravel-mix-tailwind
- postcss
- postcss-import
- resolve-url-loader
- sass
- sass-loader
- tailwindcss

## Requirement

- PHP
- Composer
- NPM
- GIT

---

## Cara Mengelola Repositori

Disini akan dijelaskan bagaimana cara menggunakan kode.

### Cara clone repositori (SSH):

Masuk ke command line lalu ketikan `git clone`

```
git clone git@github.com:sidikpriyo/apk-wakaf.git
```

### Cara pindah branch:

Masuk ke command line lalu ketikan `git checkout nama_branch`

```
git checkout dev
```

### Cara mendapatkan pembaruan kode

Masuk ke commandline lalu ketikan `git pull`

```
git pull
```

### Cara menggabungkan kode

Masuk ke command line lalu ketikan `git merge nama_branch`

```
git merge main
```

## Cara Install Library

Disini akan dijelaskan cara install dependensi

### Cara Install PHP Dependensi Menggunakan Composer

Masuk ke command line lalu ketikan `composer install`

```
composer install
```

### Cara Install JS Dependensi Menggunakan NPM

Masuk ke command line lalu ketikan `npm install`

```
npm install
```

### Cara Masuk Mode Development

Masuk ke command line lalu ketikan `npm run dev`

```
npm run dev
```

### Cara Masuk Mode Production

Masuk ke command line lalu ketikan `npm run prod`

```
npm run prod
```

## Cara Install Aplikasi

Disini akan dijelaskan bagaimana cara installasi aplikasi.

### Cara Setup Environment

Silahkan copy contoh file enviroment:

```
cp .env.example .env
```

Lalu buat unik key dengan mengetikan:

```
php artisan key:generate
```

Setelah itu buka file `.env` untuk seting database dll.

### Cara Setup Public Disk

```
php artisan storage:link
```

### Cara Installasi Database

Berikut cara untuk setup database.

```
php artisan migrate
```

Untuk mengembalikan perubahan tabel pada database:

```
php artisan migrate:rollback
```

Untuk menambahkan data inisiasi:

```
php artisan db:seed
```

Untuk menghapus semua tabel dan membuatnya dari awal:

```
php artisan migrate:fresh
```

Untuk membuat tabel dari awal dan menambahkan data inisiasi:

```
php artisan migrate:fresh --seed
```
