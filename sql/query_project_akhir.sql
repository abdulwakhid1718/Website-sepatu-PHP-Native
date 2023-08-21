
-- PUTRI
CREATE VIEW tampil_produk AS 
SELECT * FROM tb_produk WHERE total_stok > 0;

CREATE VIEW tampil_pembayaran AS
SELECT pb.id_pembayaran, ps.id_pesanan, pb.tgl_dibayar, pb.bukti_pembayaran, 
ps.tgl_pesanan, ps.total_harga_pesanan, bb.nama_bank, usr.nama, bb.no_rekening 
FROM tb_pembayaran pb 
INNER JOIN tb_pesanan ps ON pb.id_pesanan = ps.id_pesanan
INNER JOIN tb_bank_bayar bb ON bb.id_bank = ps.id_bank
INNER JOIN tb_users usr ON usr.id_user = ps.id_users;


CREATE VIEW tampil_pesanan AS
SELECT ps.*, bb.nama_bank, bb.no_rekening, u.nama, u.alamat, u.no_telp
FROM tb_pesanan ps 
INNER JOIN tb_bank_bayar bb ON bb.id_bank = ps.id_bank
INNER JOIN tb_users u ON u.id_user = ps.id_users;

CREATE VIEW tampil_keranjang AS 
SELECT k.*, u.nama, u.alamat, u.no_telp, p.nama_produk, p.harga, p.gambar 
FROM tb_keranjang k 
INNER JOIN tb_produk p ON k.id_produk = p.id_produk 
INNER JOIN tb_users u ON k.id_user = u.id_user 

-- PUTRI
CREATE VIEW tampil_produk_terbaru AS 
SELECT id_produk, nama_produk, gambar, harga, deskripsi 
FROM tb_produk WHERE total_stok > 0 LIMIT 4;

-- WAKHID
CREATE VIEW tampil_list_pesanan AS 
SELECT psn.id_pesanan, psn.id_users, psn.tgl_pesanan, psn.total_harga_pesanan, p.nama_produk, dp.ukuran, dp.jumlah, dp.total_harga, psn.status, p.gambar
FROM tb_pesanan psn 
INNER JOIN tb_detail_pesanan dp ON psn.id_pesanan = dp.id_pesanan 
INNER JOIN tb_produk p ON dp.id_produk = p.id_produk;


-- ------------------------------------------------------ PROCEDURE -------------------------------------------------------------

DELIMITER //
CREATE PROCEDURE no_urut()
BEGIN
    DECLARE i INT DEFAULT 1;

    -- Loop menggunakan WHILE
    WHILE i <= 10 DO
        -- Tampilkan nilai i
        SELECT i;
`shoes_store`
        -- Tambahkan 1 ke nilai i
        SET i = i + 1;
    END WHILE;
    
    SELECT i;
END //
DELIMITER ;

-- SINTA
DELIMITER //
CREATE PROCEDURE login(
    IN username VARCHAR(50),
    IN passwordd VARCHAR(255)
)
BEGIN
	DECLARE login INT;
	DECLARE txtnama VARCHAR(255);
	DECLARE txtid_user VARCHAR(11);
	
	SELECT COUNT(*), nama, id_user INTO login, txtnama, txtid_user  FROM tb_users u WHERE u.username = username AND u.password = passwordd;
	IF login < 1 THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Username / Password Salah!!';
	END IF;
	
	SELECT txtnama, txtid_user;
END //
DELIMITER ;

CALL login('admin','admin')
-- END SINTA

-- WAKHID
DELIMITER //
CREATE PROCEDURE generate_id(
    IN data_table VARCHAR(50)
)
BEGIN
    DECLARE id INT;
    DECLARE str VARCHAR(255);
    DECLARE panjang_angka_id INT;
    
    IF data_table = 'produk' THEN
    
	    SELECT CAST(SUBSTRING(id_produk, 4, 3) AS INT) INTO id FROM tb_produk ORDER BY id_produk DESC LIMIT 1;
	    
	    SET id = id + 1;
	    SET panjang_angka_id = CHAR_LENGTH(id);
	    
	    IF panjang_angka_id > 2 THEN
		SET str = CONCAT('SPT', id);
	    ELSEIF panjang_angka_id > 1 THEN 
		SET str = CONCAT('SPT0', id);
	    ELSE
		SET str = CONCAT('SPT00', id);
	    END IF;
	    
    ELSEIF data_table = 'pelanggan' THEN 
    
	    SELECT CAST(SUBSTRING(id_user, 4, 3) AS INT) INTO id FROM tb_users ORDER BY id_user DESC LIMIT 1;
	    
	    SET id = id + 1;
	    SET panjang_angka_id = CHAR_LENGTH(id);
	    
	    IF panjang_angka_id > 2 THEN
		SET str = CONCAT('PLG', id);
	    ELSEIF panjang_angka_id > 1 THEN 
		SET str = CONCAT('PLG0', id);
	    ELSE
		SET str = CONCAT('PLG00', id);
	    END IF;
    
    ELSEIF data_table = 'suplier' THEN 
    
	    SELECT CAST(SUBSTRING(id_suplier, 4, 3) AS INT) INTO id FROM tb_suplier ORDER BY id_suplier DESC LIMIT 1;
	    
	    SET id = id + 1;
	    SET panjang_angka_id = CHAR_LENGTH(id);
	    
	    IF panjang_angka_id > 2 THEN
		SET str = CONCAT('SUP', id);
	    ELSEIF panjang_angka_id > 1 THEN 
		SET str = CONCAT('SUP0', id);
	    ELSE
		SET str = CONCAT('SUP00', id);
	    END IF;
	    
    END IF;
    
    SELECT str AS id;
END //
DELIMITER ;
-- END WAKHID


-- AZREL
DELIMITER //
CREATE PROCEDURE show_detail_produk(
    IN id VARCHAR(50)
)
BEGIN
 SELECT * FROM tb_produk p 
 INNER JOIN tb_detail_produk dp ON p.id_produk = dp.id_produk 
 INNER JOIN tb_suplier s ON s.id_suplier = p.id_suplier
 WHERE p.id_produk = id AND dp.stok > 0;
END //
DELIMITER ;


-- AZREL
DELIMITER//
CREATE PROCEDURE dashboard()
BEGIN
    DECLARE jumlah_produk INT;
    DECLARE jumlah_supplier INT;
    DECLARE jumlah_stok INT;
    DECLARE jumlah_user INT;
    DECLARE jumlah_pendapatan INT;    
    DECLARE jumlah_lunas INT;
    DECLARE jumlah_belum_bayar INT;
    DECLARE jumlah_diproses INT;
    DECLARE jumlah_dikirim INT;
    DECLARE jumlah_pesanan_bulan INT;
    DECLARE jumlah_pendapatan_bulan INT;
    
    
    SELECT COUNT(*) INTO jumlah_produk FROM tb_produk;
    SELECT COUNT(*) INTO jumlah_supplier FROM tb_suplier;
    SELECT SUM(total_stok) INTO jumlah_stok FROM tb_produk;
    SELECT COUNT(*) INTO jumlah_user FROM tb_users WHERE id_user NOT LIKE '%ADM%';
    SELECT SUM(total_harga_pesanan) INTO jumlah_pendapatan FROM tb_pesanan;
    SELECT COUNT(*) INTO jumlah_lunas FROM tb_pesanan WHERE STATUS='dibayar';
    SELECT COUNT(*) INTO jumlah_belum_bayar FROM tb_pesanan WHERE STATUS='pending';
    SELECT COUNT(*) INTO jumlah_diproses FROM tb_pesanan WHERE STATUS='diproses';
    SELECT COUNT(*) INTO jumlah_dikirim FROM tb_pesanan WHERE STATUS='sedang dikirim';
    SELECT COUNT(*), SUM(total_harga_pesanan) INTO jumlah_pesanan_bulan, jumlah_pendapatan_bulan FROM tb_pesanan
    WHERE MONTH(tgl_pesanan) = MONTH(CURRENT_DATE()) AND YEAR(tgl_pesanan) = YEAR(CURRENT_DATE()) AND STATUS!='pending';    
    
    SELECT jumlah_produk, jumlah_supplier, jumlah_stok, jumlah_user, jumlah_pendapatan, jumlah_lunas, 
           jumlah_belum_bayar, jumlah_diproses, jumlah_dikirim, jumlah_pesanan_bulan, jumlah_pendapatan_bulan;
END//
DELIMITER ;

CALL dashboard();

-- SEVIN
DELIMITER //
CREATE PROCEDURE tambah_stok(
    IN id_produk VARCHAR(11),
    IN ukuran INT,
    IN stok_tambah INT
)
BEGIN

 UPDATE tb_detail_produk dp SET dp.stok = dp.stok + stok_tambah 
 WHERE dp.id_produk=id_produk AND dp.ukuran = ukuran;

END //
DELIMITER ;


-- PUTRI
DELIMITER //
CREATE PROCEDURE update_user(
    IN id_users VARCHAR(11),
    IN nama VARCHAR(50),
    IN username VARCHAR(50),
    IN passwordd VARCHAR(255),
    IN alamat VARCHAR(100),
    IN email VARCHAR(50),
    IN no_telp VARCHAR(13)
)
BEGIN
    IF (passwordd = '') THEN
	UPDATE tb_users SET nama=nama, username=username, alamat=alamat,
	email=email, no_telp=no_telp WHERE id_user=id_users;
    ELSE
	UPDATE tb_users us SET nama=nama, username=username, PASSWORD=passwordd, alamat=alamat,
	email=email, no_telp=no_telp WHERE id_user=id_users;
    END IF;
END //
DELIMITER ;
-- END PUTRI

-- WAKHID
DELIMITER //
CREATE PROCEDURE tambah_pesanan(
    IN id_pesanann VARCHAR(11),
    IN id_users VARCHAR(11),
    IN id_produk VARCHAR(11),
    IN id_bank INT,
    IN jumlah INT,
    IN ukuran INT
)
BEGIN
    DECLARE harga_produk INT;
    DECLARE total_pesan INT;
    DECLARE cek_id_pesanan VARCHAR(11);
    
    -- ambil dulu harga produknya dan cek apakah id pesanan sudah ada
    SELECT harga INTO harga_produk FROM tb_produk p WHERE p.id_produk = id_produk;
    SELECT id_pesanan INTO cek_id_pesanan FROM tb_pesanan WHERE id_pesanan = id_pesanann;
    
    IF (cek_id_pesanan IS NULL) THEN
        -- masukkan data ke tabel pesanan
        INSERT INTO tb_pesanan (id_pesanan, id_users, id_bank, tgl_pesanan) VALUES (id_pesanann, id_users, id_bank, CURDATE());
    END IF;
    
    -- tambahkan data pesanan detail
    INSERT INTO tb_detail_pesanan (id_detail_pesanan, id_pesanan, id_produk, jumlah, total_harga, ukuran) 
    VALUES (NULL, id_pesanann, id_produk, jumlah, harga_produk * jumlah, ukuran);
    
    SELECT SUM(total_harga) INTO total_pesan FROM tb_detail_pesanan WHERE id_pesanan = id_pesanann;
    
    UPDATE tb_pesanan SET total_harga_pesanan=total_pesan WHERE id_pesanan = id_pesanann;
    
      
END //
DELIMITER ;

CALL tambah_pesanan("1234567890", "PLG001", "SPT003", 2, 40);


-- AZREL
DELIMITER //
CREATE PROCEDURE tambah_keranjang(
    IN id_user VARCHAR(11),
    IN id_produk VARCHAR(11),
    IN ukuran INT,
    IN jumlah INT
)
BEGIN
    DECLARE cek_id_produk VARCHAR(11);
    
    -- cek apakah id produk sudah ada
    SELECT id_produk INTO cek_id_produk FROM tb_keranjang k 
    WHERE k.id_produk = id_produk AND k.ukuran = ukuran AND k.id_user = id_user;
    
    IF (cek_id_produk IS NULL) THEN
        -- masukkan data ke tabel pesanan
        INSERT INTO tb_keranjang VALUES('', id_user, id_produk, ukuran, jumlah);
    ELSE 
        UPDATE tb_keranjang k SET k.jumlah = k.jumlah + jumlah 
        WHERE k.id_produk = id_produk AND k.id_user = id_user;
    END IF;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE update_stok_total(
    IN id_produk VARCHAR(11)
)
BEGIN
    DECLARE total_semua_stok INT;
    
    SELECT SUM(stok) INTO total_semua_stok FROM tb_detail_produk dp WHERE dp.id_produk=id_produk;
    
    UPDATE tb_produk p SET p.total_stok=total_semua_stok WHERE p.id_produk=id_produk;
END //
DELIMITER ;


-- WAKHID
DELIMITER //
CREATE PROCEDURE remove_keranjang(
    IN id_produkk VARCHAR(11),
    IN id_userr VARCHAR(11),
    IN ukurann INT
)
BEGIN
    DECLARE jumlah_data INT;
    
    SELECT COUNT(*) INTO jumlah_data FROM tb_keranjang 
    WHERE id_produk = id_produkk AND id_user = id_userr AND ukuran = ukurann;
    
    IF jumlah_data > 0 THEN
        DELETE FROM tb_keranjang WHERE id_produk = id_produkk AND id_user = id_userr AND ukuran = ukurann;
    END IF;
END //
DELIMITER ;


-- -------------------------------------- TRIGGER ----------------------------------------------------

-- SEVIN 
DELIMITER //
CREATE TRIGGER cek_insert_ukuran
BEFORE INSERT ON tb_detail_produk
FOR EACH ROW
BEGIN
    DECLARE id_produk_old VARCHAR(20);
    DECLARE ukuran_old VARCHAR(20);
    
    SET id_produk_old = '';
    SET ukuran_old = '';
    
    SELECT id_produk, ukuran INTO id_produk_old, ukuran_old 
    FROM tb_detail_produk WHERE id_produk = new.id_produk AND ukuran = new.ukuran;
    
   IF (id_produk_old = new.id_produk AND ukuran_old = new.ukuran)  THEN
      SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ukuran Yang Kamu Input Sudah ada!!';
   END IF;
END //
DELIMITER ;
-- END SEVIN -- 

DELIMITER //
CREATE TRIGGER update_pesanan_dibayar
AFTER INSERT ON tb_pembayaran
FOR EACH ROW
BEGIN
    UPDATE tb_pesanan p SET p.status='dibayar' WHERE p.id_pesanan = new.id_pesanan;
END //
DELIMITER ;

-- SINTA
DELIMITER //
CREATE TRIGGER stok_sepatu_kurang
AFTER INSERT ON tb_detail_pesanan
FOR EACH ROW
BEGIN
    UPDATE tb_detail_produk SET stok = stok - new.jumlah WHERE id_produk = new.id_produk AND ukuran = new.ukuran;
END //
DELIMITER ;
-- END SINTA

-- SEVIN
DELIMITER //
CREATE TRIGGER update_semua_stok_insert
AFTER INSERT ON tb_detail_produk
FOR EACH ROW
BEGIN
    CALL update_stok_total(new.id_produk);
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER update_semua_stok_update
AFTER UPDATE ON tb_detail_produk
FOR EACH ROW
BEGIN
    CALL update_stok_total(new.id_produk);
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER update_semua_stok_delete
AFTER DELETE ON tb_detail_produk
FOR EACH ROW
BEGIN
    CALL update_stok_total(old.id_produk);
END //
DELIMITER ;
-- END SEVIN
