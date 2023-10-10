/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : zapatos

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2011-08-31 17:40:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tblcarrito`
-- ----------------------------
DROP TABLE IF EXISTS `tblcarrito`;
CREATE TABLE `tblcarrito` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `intCantidad` int(11) DEFAULT NULL,
  `intTransaccionEfectuada` int(11) DEFAULT '0',
  PRIMARY KEY (`intContador`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcarrito
-- ----------------------------
INSERT INTO `tblcarrito` VALUES ('1', '2', '1', '1', '0');
INSERT INTO `tblcarrito` VALUES ('2', '2', '9', '1', '0');
INSERT INTO `tblcarrito` VALUES ('3', '2', '7', '1', '0');
INSERT INTO `tblcarrito` VALUES ('4', '2', '1', '1', '0');
INSERT INTO `tblcarrito` VALUES ('5', '2', '7', '1', '0');

-- ----------------------------
-- Table structure for `tblcategoria`
-- ----------------------------
DROP TABLE IF EXISTS `tblcategoria`;
CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strDescripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcategoria
-- ----------------------------
INSERT INTO `tblcategoria` VALUES ('1', 'Botas');
INSERT INTO `tblcategoria` VALUES ('2', 'Sandalias');
INSERT INTO `tblcategoria` VALUES ('3', 'De playa');
INSERT INTO `tblcategoria` VALUES ('4', 'De montaña');

-- ----------------------------
-- Table structure for `tblcompra`
-- ----------------------------
DROP TABLE IF EXISTS `tblcompra`;
CREATE TABLE `tblcompra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `fchCompra` datetime DEFAULT NULL,
  `intTipoPago` int(11) DEFAULT NULL,
  `dblTotal` double DEFAULT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcompra
-- ----------------------------

-- ----------------------------
-- Table structure for `tblproducto`
-- ----------------------------
DROP TABLE IF EXISTS `tblproducto`;
CREATE TABLE `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(100) DEFAULT NULL,
  `strSEO` varchar(100) DEFAULT NULL,
  `dblPrecio` double DEFAULT NULL,
  `intEstado` int(11) DEFAULT NULL,
  `intCategoria` int(11) DEFAULT NULL,
  `strImagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproducto
-- ----------------------------
INSERT INTO `tblproducto` VALUES ('1', 'Bota de Agua', 'bota-de-agua', '20', '1', '1', 'zapato1.jpg');
INSERT INTO `tblproducto` VALUES ('9', 'Zapato Tacon', '987', '897', '1', '1', 'zapato2.jpg');
INSERT INTO `tblproducto` VALUES ('8', 'Zapato standard', 'uih', '87', '1', '1', 'zapato3.jpg');
INSERT INTO `tblproducto` VALUES ('7', 'Tacon Economico', 'bota-de-agua', '34', '1', '1', 'zapato4.jpg');
INSERT INTO `tblproducto` VALUES ('10', 'Zapato azul', '897', '20', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('12', 'Zapato 2', 'sdfsdf', '20', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('13', 'Zapato 2', '234', '12', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('14', 'Zapato 2', '234', '23', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('15', 'Zapato 2', '234', '234', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('16', 'Zapato 2', '234', '23', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('17', 'Zapato 2', '234', '32', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('18', 'Zapato 2', '23', '3', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('19', 'Zapato 2', '423', '2', '1', '1', 'zapato5.jpg');
INSERT INTO `tblproducto` VALUES ('20', 'Zapato 2', '4', '2', '1', '1', 'zapato5.jpg');

-- ----------------------------
-- Table structure for `tblusuario`
-- ----------------------------
DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) DEFAULT NULL,
  `strEmail` varchar(100) DEFAULT NULL,
  `intActivo` int(11) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblusuario
-- ----------------------------
INSERT INTO `tblusuario` VALUES ('1', 'Pepe Luis', 'pepel@gmail.com', '1', null);
INSERT INTO `tblusuario` VALUES ('2', 'Jorge Pepe', 'jorvidu2@gmail.com', '1', 'xxxx');
INSERT INTO `tblusuario` VALUES ('3', 'sdfsdf', 'sdfsdfs@sdfsdf.com', '1', 'wkejhwkjr');

-- ----------------------------
-- Table structure for `tblvariables`
-- ----------------------------
DROP TABLE IF EXISTS `tblvariables`;
CREATE TABLE `tblvariables` (
  `idContador` int(11) NOT NULL AUTO_INCREMENT,
  `intIVA` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContador`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblvariables
-- ----------------------------
INSERT INTO `tblvariables` VALUES ('1', '18');
