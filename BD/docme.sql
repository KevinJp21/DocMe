-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla docme.administradores: ~1 rows (aproximadamente)
INSERT INTO `administradores` (`ID_Usu`) VALUES
	(1);

-- Volcando datos para la tabla docme.citas: ~1 rows (aproximadamente)
INSERT INTO `citas` (`ID_Cita`, `FechaCita`, `Motivo`, `Estado`, `ID_Paciente`, `ID_Med`) VALUES
	(1, '2023-11-23 11:16:34', 'Odontologia', 'Reservado', 26, 8);

-- Volcando datos para la tabla docme.consultorios: ~3 rows (aproximadamente)
INSERT INTO `consultorios` (`ID_Con`, `Codigo`, `Desc_Con`, `Disponibilidad`) VALUES
	(3, '7896', 'Consultorio de medicina general', 'Activo'),
	(4, '2345', 'Consultorio de atención pediátrica', 'Activo'),
	(5, '5642', 'Consultorio de odontología', 'Activo');

-- Volcando datos para la tabla docme.especialidad: ~3 rows (aproximadamente)
INSERT INTO `especialidad` (`ID_Esp`, `Codigo_Esp`, `Descripcion`) VALUES
	(1, '5674', 'Medicina general'),
	(2, '5456', 'Pediatria'),
	(3, '5447', 'Odontología');

-- Volcando datos para la tabla docme.medicos: ~6 rows (aproximadamente)
INSERT INTO `medicos` (`ID_Usu`, `ID_Esp`, `ID_Con`, `Estado`) VALUES
	(2, 1, 3, 'Activo'),
	(5, 2, 4, 'Activo'),
	(7, 1, 3, 'Activo'),
	(8, 3, 5, 'Activo'),
	(10, 2, 4, 'Activo'),
	(24, 3, 5, 'Activo');

-- Volcando datos para la tabla docme.pacientes: ~1 rows (aproximadamente)
INSERT INTO `pacientes` (`ID_Usu`) VALUES
	(26);

-- Volcando datos para la tabla docme.roles: ~3 rows (aproximadamente)
INSERT INTO `roles` (`ID_Rol`, `Rol`) VALUES
	(1, 'Administrador'),
	(2, 'Paciente'),
	(3, 'Medico');

-- Volcando datos para la tabla docme.usuarios: ~8 rows (aproximadamente)
INSERT INTO `usuarios` (`ID_Usu`, `Nombre`, `Apellido`, `Correo`, `Password`, `User_Name`, `FechaNac`, `Telefono`, `Identificacion`, `token_recovery_pass`, `Estado`, `ID_Rol`) VALUES
	(1, 'Kevin', 'Julio', 'kevinjp821@gmail.com', 'kevin12', 'KevinJp21', '2003-08-21', '302412534', '1424215215', NULL, 'Activo', 1),
	(2, 'Miguel', 'Jose', 'juan@gmail.com', 'juan12', 'Juan24', '1998-11-12', '324234234', '43423423', NULL, 'Activo', 3),
	(5, 'Fernando', 'Gimenez', 'fer@gmail.com', 'fernando12', 'Fernando12', '1992-11-13', '301242142', '214124124', NULL, 'Activo', 3),
	(7, 'Jose', 'Miguel', 'jose@gmail.com', 'Josemiguel', 'Jose.Miguel', '1989-06-07', '124124214', '124215125', NULL, 'Activo', 3),
	(8, 'Luis', 'Mendoza', 'luis@gmail.com', 'luis12', 'LuisMendoza', '1997-02-04', '4124124214', '214211525', NULL, 'Activo', 3),
	(10, 'Juan', 'Gomez', 'juan23@gmail.com', 'juan12', 'Juan_G23', '2023-11-08', '24214214', '421125215', NULL, 'Activo', 3),
	(24, 'Alfredo', 'Garcia', 'alfredo@gmail.com', 'alfredo12', 'Alfredo_90', '1994-06-08', '302955442', '5345366443', NULL, 'Activo', 3),
	(26, 'Dario', 'Hernandez', 'dario.hernane@gmail.com', 'duvan12', 'Dario54', '2023-11-23', '214124214', '124214214', NULL, 'Activo', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
