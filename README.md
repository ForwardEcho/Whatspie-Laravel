
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
<img width="1639" height="391" alt="image" src="https://github.com/user-attachments/assets/55f57376-67c2-4336-8d90-f9f2e2135059" />

Kemudian subscribe package, aku ambil versi gratis
<img width="1618" height="854" alt="image" src="https://github.com/user-attachments/assets/5fc3a69b-b79f-4426-96e6-0a42553f3e6e" />

Kemudian masukkan nomor telepon pribadi atau admin perusahaan
<img width="1611" height="468" alt="image" src="https://github.com/user-attachments/assets/0b1c19bf-4b0d-4950-aa0a-2fcbca4d1d08" />

Masukkan kode otp yang dikirim melalui whatsapp
<img width="1612" height="675" alt="image" src="https://github.com/user-attachments/assets/bec5e882-2172-42cf-a3b2-ef7a192c820f" />

Scan **QR Code** agar Whatsapp terhubung dengan Whatspie
<img width="1624" height="465" alt="image" src="https://github.com/user-attachments/assets/babc9bfd-7b5a-4046-b3d7-3134dd96f3e4" />
<img width="1631" height="651" alt="image" src="https://github.com/user-attachments/assets/504e2c54-c07b-46b1-bc81-b2484f87818e" />

Akan muncul notifikasi seperti berikut, jika kalian berhasil menambahkan device
<img width="1618" height="244" alt="image" src="https://github.com/user-attachments/assets/5ee58b7f-54e8-49ba-916f-680af548cc45" />

buka menu profile setting, kemudian copy API Key
<img width="1624" height="741" alt="image" src="https://github.com/user-attachments/assets/ec217dcb-fdef-4fc5-82af-cd95f93dee00" />

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
<img width="1242" height="523" alt="image" src="https://github.com/user-attachments/assets/168d711a-381e-4ccb-812c-3fb21e4530b1" />

| Type     | Description                |
| :------- | :------------------------- |
| `Sender Number` | Registred Device Number |
| `Receiver Number` | Target Number |


