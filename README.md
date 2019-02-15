# php_live_inline_grid

## Finish
### Note:
* table must have **id** column as primary key
* table must have **fullname** column for option selectbox label
* table must register **Foreign keys** to other relationship table

I've moved all things to **old folder**, just place the final version at the top folder, include:
* **fetch_data_pg_autogen_selectbox.php** (Process data);
* **t4_selectbox.php** (UI for end user);
* **db** (folder database for PostgreSQL);
* **func** (folder libs and functions).

> http://localhost/php_grid/t4_selectbox.php?tbl=tt_tralua_v2

![alt](D:/sync/websvr/xampp/php_grid/img/t4.png)

## Update 15/02/2019
**foreign_table_name** must have **fullname** column, it's used as label for option of selectbox

```
UPDATE tt_muavu
SET fullname = tenmuavu
```

## Update 14/02/2019
Autogen selectbox from relationship

> https://q2a.dothanhlong.org/?qa=237/postgres-sql-to-list-table-foreign-keys&show=238#a238
```
SELECT
    tc.table_schema, 
    tc.constraint_name, 
    tc.table_name, 
    kcu.column_name, 
    ccu.table_schema AS foreign_table_schema,
    ccu.table_name AS foreign_table_name,
    ccu.column_name AS foreign_column_name 
FROM 
    information_schema.table_constraints AS tc 
    JOIN information_schema.key_column_usage AS kcu
      ON tc.constraint_name = kcu.constraint_name
      AND tc.table_schema = kcu.table_schema
    JOIN information_schema.constraint_column_usage AS ccu
      ON ccu.constraint_name = tc.constraint_name
      AND ccu.table_schema = tc.table_schema
WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name='tt_tralua_v2';
```


## Update 14/02/2019
Add Autogen grid from postgresql table

```
SELECT *
FROM information_schema.columns
WHERE table_schema = 'public'
  AND table_name   = 'sample_data'
```
> https://q2a.dothanhlong.org/?qa=235/postgresql-get-all-column-names

**=>t2 folder**

> http://localhost/php_grid/t2/t3_autogen.php?tbl=sample_data
* t3_autogen.php
* fetch_data_pg_autogen.php

*Todo*
* Make selectbox for relationship table in grid

*Referent*
> https://q2a.dothanhlong.org/?qa=235/postgresql-get-all-column-names

***
## Update 13/02/2019

*Rewrite for PostgreSQL table*

**=>t2 folder**

> http://localhost/php_grid/t2/t2.php

* fetch_data_pg.php
* t2.php
* sample_data.sql

*Inline edit grid for MySQL*

**=>t2 folder**

> http://localhost/php_grid/t2/t1.php

* fetch_data.php
* t1.php
* test.sql

*Todo*
* Rewrite for PostgreSQL Database
* Auto gen grid and process from Database automatically

***
# Start - 12/02/2019

Hello, This repos I make to note what I learn and build a live inline grid data for add, edit, update and delete row from table in database.

> Live Inline CRUD operation of Create, Read, Update and Delete within a area of grid view. Live inline CRUD will add feature like adding new data and make changes in existing data dynamically using jquery with Ajax

First, I based on these link to have basic example. Then from these, I will improve it to use for other DBMS and make it more automatic, easy to use.

* https://www.webslesson.info/2018/08/live-table-add-edit-delete-using-php-with-jsgrid-plugin.html

* http://js-grid.com/getting-started/
