
# Whatspie Laravel
Whatspie adalah sebuah layanan berbasis API (Application Programming Interface) yang memungkinkan pengguna untuk mengintegrasikan fitur pengiriman pesan WhatsApp ke dalam aplikasi atau sistem mereka. Dengan Whatspie, pengembang dapat mengotomatiskan pengiriman pesan WhatsApp, baik untuk kebutuhan notifikasi, pemasaran, atau komunikasi lainnya.

Fitur utama Whatspie:
- Pengiriman Pesan Otomatis: Mendukung pengiriman pesan teks, gambar, dokumen, dan format multimedia lainnya.
- Integrasi Mudah: Dapat diintegrasikan dengan berbagai platform seperti Laravel, Node.js, atau aplikasi berbasis web lainnya.
- Kustomisasi Pesan: Memungkinkan personalisasi pesan sesuai kebutuhan.
- Dukungan API: Menyediakan endpoint API yang dapat diakses dengan autentikasi yang aman.
- Manajemen Kontak: Mendukung pengelolaan kontak untuk keperluan pengiriman pesan massal.

## Kelebihan menggunakan Whatspie:
- Efisiensi Waktu: Menghemat waktu dalam pengiriman pesan ke banyak pengguna sekaligus.
- Skalabilitas: Cocok untuk bisnis kecil hingga besar.
- Integrasi dengan Sistem Lain: Memungkinkan integrasi dengan CRM, ERP, atau aplikasi lainnya.
Jika Anda ingin mempelajari lebih lanjut, silakan kunjungi situs resmi [Whatspie](https://whatspie.com).

## Whatspie Documentation

[Whatspie Documentation](https://docs.whatspie.com)

## Features
- Send Bulk Message

## Clonning Repo

```bash
  git clone https://github.com/ForwardEcho/WhatsPie-Laravel
  cd WhatsPie-Laravel
  cp .env.example .env
```
## Setup API Token Whatspie
Pertama Login/Register akun di [Whatspie](https://app.whatspie.com/login). Lalu pergi ke menu Devices dan tambahkan

![image](https://github.com/user-attachments/assets/050e08bf-a083-49af-aa35-cb04554c6060)

Kemudian subscribe package, aku ambil versi gratis
![image](https://github.com/user-attachments/assets/1c7bc4b9-ed20-4feb-ab94-73304631f749)

Kemudian masukkan nomor telepon pribadi atau admin perusahaan
![image](https://github.com/user-attachments/assets/fd6506ee-67df-4a82-9489-8e52c55b8dbb)

Masukkan kode otp yang dikirim melalui whatsapp
![image](https://github.com/user-attachments/assets/ba98fa65-95ca-44fc-aa02-7e9431a042da)

Scan **QR Code** agar Whatsapp terhubung dengan Whatspie
![image](https://github.com/user-attachments/assets/cfe5737c-c8e4-4822-b134-9b2e2a495e90)
![image](https://github.com/user-attachments/assets/03c43543-665b-4d1e-975f-c2a7f8699322)

Akan muncul notifikasi seperti berikut, jika kalian berhasil menambahkan device
![image](https://github.com/user-attachments/assets/7ced29d1-d031-4626-a9d8-811ea0ae13d5)

buka menu profile setting, kemudian copy API Key
![image](https://github.com/user-attachments/assets/a675b9fa-6f00-450b-bf13-8b532f31effe)

Setup Environment File (.env)
```env
  DB_CONNECTION=mysql
  DB_PORT=3306
  DB_HOST=localhost
  DB_USERNAME=root
  DB_PASSWORD=<password>
  WHATSPIE_TOKEN=<token>
```
Run Locally
```bash
  php artisan key:generate
  php artisan migrate
  php artisan serve
```

jika sudah, coba kirim pesan pada halaman berikut http://localhost:8000/send-message
![image](https://github.com/user-attachments/assets/529c531a-093c-4aad-9a1d-e841c6bb92c8)
| Type     | Description                |
| :------- | :------------------------- |
| `Sender Number` | Registred Device Number |
| `Receiver Number` | Target Number |


