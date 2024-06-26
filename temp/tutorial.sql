CREATE TABLE customerservices
(id INT AUTO_INCREMENT PRIMARY KEY,
 name	varchar(200),
 email	varchar(200),
 timeSlot	time,
 serviceType	varchar(200),
 totalAmount INT);

-- ===================================


CREATE TABLE shopservices( Username	varchar(200) PRIMARY KEY,	
	Haircut	int(11),
	Beardcut	int(11),	
	Shaving	int(11),
	Facial	int(11),	
	Haircoloring	int(11),	
	Facemasking	int(11)
);