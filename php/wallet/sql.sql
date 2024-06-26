====================== WALLET DB =================================

-- SHOP KEEPER 
CREATE TABLE shopkeeperwallet
(email VARCHAR(200) PRIMARY KEY,
 amount int,
 dateandtime TIMESTAMP);


-- CUSTOMER 
CREATE TABLE customerwallet (email VARCHAR(200) PRIMARY KEY, amount INT, dateandtime DATETIME, upirefno BIGINT);
-- CREATE TABLE customerwallet (email VARCHAR(200) PRIMARY KEY, amount INT, dateandtime DATETIME, upirefno BIGINT);