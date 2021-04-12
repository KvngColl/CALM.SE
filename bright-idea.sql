/* drop database bright_idea; */
CREATE database bright_idea;
use bright_idea;

create table clientele(
	client_id smallint auto_increment primary key,
    client_email varchar(320),
    client_password varchar(225)
);
create table essentials(
	e_id int auto_increment primary key,
    item_name varchar(100),
    item_category varchar(100),
    item_cost decimal(10,2),
    salary decimal(15,2),
    interest_rate decimal(5,2),
    investment_time timestamp
);