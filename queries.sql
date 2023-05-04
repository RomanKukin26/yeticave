/* Заполнение таблицы "Категории" */
INSERT INTO categories (character_code, name) VALUES ('boards', 'Доски и лыжи');
INSERT INTO categories (character_code, name) VALUES ('attachment', 'Крепления');
INSERT INTO categories (character_code, name) VALUES ('boots', 'Ботинки');
INSERT INTO categories (character_code, name) VALUES ('clothing', 'Одежда');
INSERT INTO categories (character_code, name) VALUES ('tools', 'Инструменты');
INSERT INTO categories (character_code, name) VALUES ('other', 'Разное');


/* Заполнение таблицы "Пользователи" */
INSERT INTO users (email, user_name, user_password, contacts)
VALUES ('rogergreen@gmail.com', 'Roger Green', 'abcde123', 'Контактов нет');

INSERT INTO users (email, user_name, user_password, contacts)
VALUES ('teddysmth@gmail.com', 'Teddy Smth', 'ted2002y', 'Контактов нет');

INSERT INTO users (email, user_name, user_password, contacts)
VALUES ('mikepetty@gmail.com', 'Mike Petty', 'qwerty123', 'Контактов нет');


/* Заполнение таблицы "Лоты" */
INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2023-03-25', 1, 2, 1);

INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('DC Ply Mens 2016/2017 Snowboard', 'img/lot-2.jpg', 159999, '2023-03-25', 1, 2, 1);

INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('Крепления Union Contact Pro 2015 года размер L/XL', 'img/lot-3.jpg', 8000, '2023-03-25', 1, 2, 2);

INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('Ботинки для сноуборда DC Mutiny Charocal', 'img/lot-4.jpg', 10999, '2023-03-25', 1, 2, 3);

INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('Куртка для сноуборда DC Mutiny Charocal', 'img/lot-5.jpg', 7500, '2023-03-25', 1, 2, 4);

INSERT INTO lots (title, img, start_price, date_finish, user_id, winner_id, category_id)
VALUES ('Маска Oakley Canopy', 'img/lot-6.jpg', 5400, '2023-03-25', 1, 2, 6);


/* Заполнение таблицы "Ставки" */
INSERT INTO bets (price_bet, user_id, lot_id)
VALUES (11000, 3, 1);

INSERT INTO bets (price_bet, user_id, lot_id)
VALUES (12000, 2, 1);


/* Получение списка всех категорий */
SELECT name FROM categories;


/* Получение новых, открытых лотов */
SELECT lots.title, lots.start_price, lots.img, categories.name
FROM lots JOIN categories ON lots.category_id = categories.id;


/* Получение лота по id */
SELECT lots.date_creation, lots.title, lots.lot_description, lots.img, lots.start_price, lots.date_finish, lots.step, categories.name
FROM lots JOIN categories ON lots.category_id = categories.id
WHERE lots.id = 7


/* Обновление названия лота */
UPDATE lots 
SET title = 'Ботинки для сноуборда обычные'
WHERE id = 4;


/* Получение списка ставок для лота по его идентификатору с сортировкой по дате */
SELECT bets.date_bet, bets.price_bet, lots.title, users.user_name
FROM bets
JOIN users ON bets.user_id = users.id
JOIN lots ON bets.lot_id = lots.id
WHERE lots.id = 4
ORDER BY bets.date_bet DESC;