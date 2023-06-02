USE pap;
ALTER TABLE users CHANGE name username VARCHAR(50);
ALTER TABLE user_details ADD FOREIGN KEY (user_id) REFERENCES users(id);
