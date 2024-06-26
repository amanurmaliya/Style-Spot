CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Age int,
    Password varchar(200)
);

-- ============================== CREATE TABLE CUSTOMER ==================================================================================

CREATE TABLE customer (Id int AUTO_INCREMENT PRIMARY KEY, Username varchar(200), Email varchar(200), 
Phone varchar(10), Age int, password varchar(200) );

-- =============================== CREATE TBALE SHOPKEEPER ============================================================================

CREATE TABLE shopkeeper (Id int AUTO_INCREMENT PRIMARY KEY, Username varchar(200), Email varchar(200), Age int, password varchar(200) , Location varchar(200));

==================================

SHOW DATABASE;

================================================================

mysqli_query($conn, "CREATE TABLE `$username` (
                        Currtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        Username VARCHAR(200),
                        Appointmenttime VARCHAR(5),
                        Servicetype VARCHAR(50),
                        Amount INT
                        )") or die("Couldn't Connect..");


-- =================================================================================
-- TIME WALI TABLE 
CREATE TABLE barbartiming(
    name VARCHAR(200) PRIMARY KEY,
    nineone int,
    ninetwo int,
    tenone int,
    tentwo int,
    elevenone int,
    eleventwo int,
    tweleveone int,
    twelevetwo int,
    oneone int,
    onetwo int,
    twoone int,
    twotwo int,
    threeone int,
    threetwo int,
    fourone int,
    fourtwo int,
    fiveone int,
    fivetwo int,
    sixone int,
    sixtwo int
    );

-- =========================================================================================
-- Create the stored procedure to reset timing data
-- THIS IS THE EVENT SCHEDULER SO THAT THE DATABASE MUST BE RESET PER DAY   
DELIMITER //
CREATE PROCEDURE ResetTimingData()
BEGIN
    UPDATE barbartiming SET
    nineone = 0, ninetwo = 0,
    tenone = 0, tentwo = 0,
    elevenone = 0, eleventwo = 0,
    tweleveone = 0, twelevetwo = 0,
    oneone = 0, onetwo = 0,
    twoone = 0, twotwo = 0,
    threeone = 0, threetwo = 0,
    fourone = 0, fourtwo = 0,
    fiveone = 0, fivetwo = 0,
    sixone = 0, sixtwo = 0;
END //
DELIMITER ;

-- Schedule the stored procedure to run at midnight every day
CREATE EVENT IF NOT EXISTS ResetTimingEvent
ON SCHEDULE EVERY 1 DAY
STARTS TIMESTAMP(CURRENT_DATE, '00:00:00')
DO
    CALL ResetTimingData();


-- Restoring the barbar time slots daily
DELIMITER //

CREATE EVENT IF NOT EXISTS reset_table_daily
ON SCHEDULE EVERY 1 DAY
STARTS '2024-05-30 00:00:00'
DO
BEGIN
    UPDATE barbartiming SET nineone = 0, ninetwo = 0, tenone = 0, tentwo = 0, elevenone = 0, eleventwo = 0, tweleveone = 0, twelevetwo = 0, oneone = 0, onetwo = 0, twoone = 0, twotwo = 0, threeone = 0, threetwo = 0, fourone = 0, fourtwo = 0, fiveone = 0, fivetwo = 0, sixone = 0, sixtwo = 0;
END //

DELIMITER ;
    