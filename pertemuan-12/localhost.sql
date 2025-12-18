
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
CREATE DATABASE IF NOT EXISTS db_pwd2025 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE db_pwd2025;


CREATE TABLE tbl_tamu (
  cid int(11) NOT NULL,
  cnama varchar(100) DEFAULT NULL,
  cemail varchar(100) DEFAULT NULL,
  cpesan text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO tbl_tamu (cid, cnama, cemail, cpesan) VALUES
(1, 'salsabila rizkiya', '2522500056@mahasiswa.atmaluhur.ac.id', 'beginilah caranya'),
(2, 'fitriani', 'fitriani@gmail.com', 'anjayani'),
(3, 'frizki ', 'frizki@gmail.com', 'wee kemn');



ALTER TABLE tbl_tamu
  ADD PRIMARY KEY (cid);



ALTER TABLE tbl_tamu
  MODIFY cid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
