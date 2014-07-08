-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. Juli 2014 jam 14:13
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datamodul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `idmodul` int(11) NOT NULL AUTO_INCREMENT,
  `modul` varchar(255) NOT NULL,
  `kirim` int(11) NOT NULL,
  `terima` int(11) NOT NULL,
  `unrepair` int(11) NOT NULL,
  PRIMARY KEY (`idmodul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`idmodul`, `modul`, `kirim`, `terima`, `unrepair`) VALUES
(8, 'FRAME RECTI GAMATRONIC', 0, 0, 0),
(9, 'RIPOTS', 0, 0, 0),
(12, 'FAN HUAWEI', 0, 0, 0),
(13, 'ESMB', 0, 0, 0),
(14, 'EADA', 0, 0, 0),
(15, 'EB52', 0, 0, 0),
(16, 'FOXCVR', 0, 0, 0),
(17, 'RPSU', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `idreport` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `idmodul` varchar(255) NOT NULL,
  `kirim` int(11) NOT NULL,
  `terima` int(11) NOT NULL,
  `unrepair` int(11) NOT NULL,
  `PIC` varchar(255) NOT NULL,
  PRIMARY KEY (`idreport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Trigger `report`
--
DROP TRIGGER IF EXISTS `auto_report_update`;
DELIMITER //
CREATE TRIGGER `auto_report_update` AFTER INSERT ON `report`
 FOR EACH ROW begin
	update modul 
        set kirim=new.kirim + kirim, 
        terima=new.terima + terima, 
        unrepair=new.unrepair + unrepair 
        where idmodul=new.idmodul;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
