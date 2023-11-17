# e-shop
Интернет-магазин на Laravel со следующим функционалом:
 - аутенфикация пользователя и регистрация нового пользователя;
 - отображение каталога товаров (с использованием Cache), карточки товара;
 - механизм добавления товара в корзину, оформление заказа;
 - отправка на email пользователя уведомления о заказе (через Queue);
 - просмотр и редактирование личных данных и информации о заказе в личном кабинете пользователя;
- админка (использовались Middleware):
 - управление категориями (просмотр, редактирование и добавление новой);
 - управление товарами (просмотр, редактирование, удаление и добавление новых);
 - управление пользователями (просмотр, назначение прав, редактирование личных данных пользователя);
 - управление заказами (просмотр, редактирование статуса заказа, удаление).
 - В проекте использованы инструменты: Observer, Middleware, Queue, Notifications, Repository, Requests, Cache(Redis).
