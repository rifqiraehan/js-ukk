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

