use e_shop;

select 
(select name from products 
where products.id=order_product.product_id) 
as product_name, 
sum(count) as count_product
from order_product group by product_name order by count_product desc
