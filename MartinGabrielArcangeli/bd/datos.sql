-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2017 a las 00:11:23
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio`
--

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `name`, `description`) VALUES
(1, 'Ingenieria Informatica', 'Descripcion de Ing Infor'),
(2, 'Ingenieria Electronica', 'Descripcion de Ing. Elec'),
(3, 'Tecnicatura en desarrollo web', 'Descripcion desarrollo web');

--
-- Volcado de datos para la tabla `cursadas`
--

INSERT INTO `cursadas` (`id`, `user_id`, `subject_id`, `grade`, `date`) VALUES
(1, 2, 5, 8, NULL),
(2, 2, 6, NULL, NULL),
(3, 3, 7, 7, '2017-04-28');

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `career_id`, `name`, `description`, `hours`) VALUES
(1, 1, 'Materia 1', 'Desc mat 1 ', 2),
(2, 1, 'Materia 2', 'Desc mat 2', 6),
(3, 2, 'Materia 1', 'Desc mat 1', 8),
(4, 2, 'Materia 2', 'Desc Mat 2', 4),
(5, 3, 'Materia 1', 'Desc Mat 1', 10),
(6, 3, 'Materia 2', 'Desc mat 2', 6),
(7, 1, 'Calculo 3', 'Muy complicada', 6);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `name`, `lastname`, `password`, `type`, `status`, `date`) VALUES
(1, 'Admin', 'Juan Roman', 'Riquelme', '$2y$10$1HgjG1GsnEOwrYzAnBefFesmQfxRqeGcQ.UY0vHlMzaylbqNK.oC.', 0, 1, '2017-03-27'),
(2, 'usuario', 'Carlitos', 'Tevez', '$2y$10$zdRLJAq4Dx7G8U.dIbZrn.OhnzodvJY/XBjowdp3VjvM4HaW9C29C', 1, 1, '2017-03-05'),
(3, 'Nuevo_usuario', 'Martin', 'Hertfer', '$2y$10$AZd5x0DAyv8vHon0xFSYve1gdlpyqeegfIcHeJM5OeRJSYpmHG0SW', 1, 1, '2017-04-27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
