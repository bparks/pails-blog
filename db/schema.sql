CREATE TABLE blogs (
	node_id integer not null primary key,
	user_id integer not null,
	summary text not null,
	created_at timestamp default current_timestamp,
	updated_at timestamp /* default current_timestamp */
);