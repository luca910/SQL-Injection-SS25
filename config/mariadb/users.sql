-- Inserting data into the 'login' table in the 'Eis' database
insert into app.login (
    -- Column names
    id, lid, user, mail, pwd, created, uuid, mail_verified, admin, bestellungBearbeiten, bestellungLoeschen,
    bestellungAufgeben, bestellungAbrufen, bestellStatus, bestellungAnlegen, standorteAbrufen, standorteAnlegen, standorteBearbeiten,
    standorteLoeschen, sortenAbrufen, sortenErstellen, sortenBearbeiten)
values
    -- Admin user data
    (0, 0, 'admin', 'admin@admin.de', '$2y$10$as82uVw8adgtzkEerp/Z2uzuYSKeCU4GQLBgYL8EeErB48c4CP1t6','2024-05-28 08:58:49', '7fd972f7-1cd0-11ef-a5f3-0242ac150002', 0, 1, 1,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
    -- Regular user data
    (1, 0, 'labor', 'labor@labor.de', '$2y$10$kk9YGa4PLOaWgSbnlL/FyuIq.7k8jP66neIdJzb0OWbB8mV1hRIpW','2024-05-28 08:59:40', '9e8110d0-1cd0-11ef-a5f3-0242ac150002', 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1),
    (2, 0, 'F0', 'F0@F0.de', '$2y$10$l9H.Xf19fTMGI847vqd8EeMi81tUaXeNqaCJYe4QPjaMxDzqPFIAm', '2024-06-08 22:28:07','61374409-25e6-11ef-a840-0242ac140003', 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0),
    (3, 1, 'F1', 'F1@F1.de', '$2y$10$bTEskz9xaJKtPvPrllO0cep33H2PBCruAaeXunrwLJPW1bEYgbfiO', '2024-06-08 22:28:39','7405a2ef-25e6-11ef-a840-0242ac140003', 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0),
    (4, 2, 'F2', 'F2@F2.de', '$2y$10$uxxm/a70HfUocnhhv/416.BWtZvmxkuE3bHYt5r0betigzaAF7PTS', '2024-06-08 22:28:54','7d387fa4-25e6-11ef-a840-0242ac140003', 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0),
    (5, 3, 'F3', 'F3@F3.de', '$2y$10$HVzFVlpWy8B0TPrFJuHxPeuXWvrTwPz7WvWtPhPnSd6FUuM3lPg3W', '2024-06-08 22:29:12','87e15776-25e6-11ef-a840-0242ac140003', 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0);