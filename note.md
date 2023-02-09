User (HasMany Cart)
- id

Product (HasMany Cart)
- id

(item di dalam cart)
Cart (BelongsTo User, BelongsTo Product)
- id
- user_id
- product_id
- qty


=======

Order (HasMany OrderItem)
- id
- user_id
- is_paid
- penjual_id
- total

OrderItem (BelongsTo Order)
- id
- order_id
- product_id
- sub_total
- qty