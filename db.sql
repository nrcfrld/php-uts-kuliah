CREATE TABLE `db_mahasiswa`.`mahasiswa` ( `id` INT NOT NULL AUTO_INCREMENT , `nim` INT NOT NULL , `nama` VARCHAR(255) NOT NULL , `alamat` TEXT NOT NULL , `telpon` VARCHAR(15) NOT NULL , `email` VARCHAR(255) NOT NULL , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `jurusan` VARCHAR(255) NOT NULL , `jenjang_studi` VARCHAR(5) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;