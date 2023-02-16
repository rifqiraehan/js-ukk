OrderStatus ()
- id
- status

Order (HasMany OrderItem, BelongsTo OrderStatus)
- id
- user_id
- penjual_id ❌
- total
- order_status_id

OrderItem (BelongsTo Order)
- id
- order_id
- product_id
- sub_total
- quantitiy


======================================================
Tugas
- Buat halaman static order list & order detail 😐
- Perbaiki Seeder User Penjual ❓
- Perbaiki Unsur Kirim Mengirim ✅
- Ubah route /cart/order menjadi /checkout ✅
- Buat Model & Migrasi untuk order, order item, status order 😐
- Definisikan juga relasi terhadap model yang lain ✅
- Buat Seeder untuk data order ✅

