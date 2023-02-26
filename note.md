OrderStatus ()
- id
- status

Order (HasMany OrderItem, BelongsTo OrderStatus)
- id
- user_id
- penjual_id ❌
- total
- order_status_id

OrderItem (BelongsTo Order, BelongsTo Product)
- id
- order_id
- product_id
- sub_total
- quantitiy

Product (HasMany orderItems)

======================================================
Tugas
- Handle ketika user akses url checkout success method get
- buat tampilan daftar pesanan untuk penjual berserta detail pesanan, dan tombol untuk ubah status

menunggu konfirmasi => konfirmasi pesanan | batalkan pesanan
konfirmasi pesanan => pesanan siap
pesanan siap => pesanan selesai
pesanan selesai => tidak ada aksi
pesanan dibatalkan => jangan tampilkan button

=============== TUGAS =========================

- Laporan: Penjual dan Invoice Pembeli ✔
- Filter dan searching pesanan pada Pembeli ✔
- Searching produk pada pembeli ✔
- Menambahkan footer pada penjual dan admin ✔
- Mengganti nama lokasi kantin ✔

<!--
- ERD ✔
- DFD
- Usecase
- Ppt

- Data Seeder
- Title
- Memisahkan tampilan utama pembeli
-->

Error:
- Tidak bisa update user pada halaman admin ✔
- Layout status saat mobile-view ✔