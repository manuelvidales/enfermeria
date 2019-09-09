-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: enfermeria
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `archivo`
--

DROP TABLE IF EXISTS `archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `archivo` (
  `id_archivo` bigint(191) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(191) NOT NULL,
  `fecha_arc` date NOT NULL,
  `nom_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `ubi_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `fk_paciente_archivo` (`id_paciente`),
  CONSTRAINT `fk_paciente_archivo` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `causas_incap`
--

DROP TABLE IF EXISTS `causas_incap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `causas_incap` (
  `id_causas` int(11) NOT NULL AUTO_INCREMENT,
  `causas_incap` text NOT NULL,
  PRIMARY KEY (`id_causas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `consulta` (
  `id_consulta` bigint(191) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(191) NOT NULL,
  `fecha_cons` date NOT NULL,
  `no_cons` int(11) NOT NULL,
  `edad_cons` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `pase_cons` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fum_cons` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `no_evo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_evo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_paciente_consulta` (`id_paciente`),
  CONSTRAINT `fk_paciente_consulta` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `controlsalud`
--

DROP TABLE IF EXISTS `controlsalud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `controlsalud` (
  `id_control` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `fecha_captura` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `tipo_control` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `t_a` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `glucosa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_control`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `controlsalud_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edo_civil`
--

DROP TABLE IF EXISTS `edo_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `edo_civil` (
  `id_edo_civil` int(11) NOT NULL AUTO_INCREMENT,
  `edo_civil` text NOT NULL,
  PRIMARY KEY (`id_edo_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `examenes`
--

DROP TABLE IF EXISTS `examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `examenes` (
  `id_examen` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) DEFAULT NULL,
  `fecha_examen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_examen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `grupo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `resultados` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `lectura` text,
  `registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_examen`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=12579 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grupo_examen`
--

DROP TABLE IF EXISTS `grupo_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grupo_examen` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `incapacidades`
--

DROP TABLE IF EXISTS `incapacidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `incapacidades` (
  `id_incapacidad` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `fecha_inicio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_final` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `causas_incap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_incapacidad`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `incapacidades_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nutricion`
--

DROP TABLE IF EXISTS `nutricion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nutricion` (
  `id_nutricion` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `fecha_captura` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `peso` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `talla` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `cintura` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `imc` decimal(10,2) DEFAULT NULL,
  `gradoobesidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_nutricion`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `nutricion_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `paciente` (
  `id_paciente` bigint(191) NOT NULL AUTO_INCREMENT,
  `fecha_reg` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_emp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex_paci` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `naci_paci` date DEFAULT NULL,
  `edad_paci` text COLLATE utf8mb4_spanish_ci,
  `lugar_paci` text COLLATE utf8mb4_spanish_ci,
  `imss` text COLLATE utf8mb4_spanish_ci,
  `tel_cel` text COLLATE utf8mb4_spanish_ci,
  `tel_cas` text COLLATE utf8mb4_spanish_ci,
  `tipo_sangre` text COLLATE utf8mb4_spanish_ci,
  `tel_otro` text COLLATE utf8mb4_spanish_ci,
  `calle` text COLLATE utf8mb4_spanish_ci,
  `no_ext` text COLLATE utf8mb4_spanish_ci,
  `no_int` text COLLATE utf8mb4_spanish_ci,
  `col` text COLLATE utf8mb4_spanish_ci,
  `mun` text COLLATE utf8mb4_spanish_ci,
  `edo_dir` text COLLATE utf8mb4_spanish_ci,
  `esco` text COLLATE utf8mb4_spanish_ci,
  `ocupa` text COLLATE utf8mb4_spanish_ci,
  `edo_civ` text COLLATE utf8mb4_spanish_ci,
  `comenta` text COLLATE utf8mb4_spanish_ci,
  `reli` text COLLATE utf8mb4_spanish_ci,
  `conocio` text COLLATE utf8mb4_spanish_ci,
  `correo` text COLLATE utf8mb4_spanish_ci,
  `nom_pad` text COLLATE utf8mb4_spanish_ci,
  `ocu_pad` text COLLATE utf8mb4_spanish_ci,
  `edad_pad` text COLLATE utf8mb4_spanish_ci,
  `tel_pad` text COLLATE utf8mb4_spanish_ci,
  `nom_mad` text COLLATE utf8mb4_spanish_ci,
  `ocu_mad` text COLLATE utf8mb4_spanish_ci,
  `edad_mad` text COLLATE utf8mb4_spanish_ci,
  `tel_mad` text COLLATE utf8mb4_spanish_ci,
  `nom_cony` text COLLATE utf8mb4_spanish_ci,
  `ocu_cony` text COLLATE utf8mb4_spanish_ci,
  `edad_cony` text COLLATE utf8mb4_spanish_ci,
  `tel_cony` text COLLATE utf8mb4_spanish_ci,
  `det_hero` text COLLATE utf8mb4_spanish_ci,
  `det_hera` text COLLATE utf8mb4_spanish_ci,
  `det_hijo` text COLLATE utf8mb4_spanish_ci,
  `det_hija` text COLLATE utf8mb4_spanish_ci,
  `alergia` text COLLATE utf8mb4_spanish_ci,
  `sangre` text COLLATE utf8mb4_spanish_ci,
  `nom_cont` text COLLATE utf8mb4_spanish_ci,
  `dir_cont` text COLLATE utf8mb4_spanish_ci,
  `par_cont` text COLLATE utf8mb4_spanish_ci,
  `tel_cont` text COLLATE utf8mb4_spanish_ci,
  `com_cont` text COLLATE utf8mb4_spanish_ci,
  `pase_id` text COLLATE utf8mb4_spanish_ci,
  `pase_tot` text COLLATE utf8mb4_spanish_ci,
  `part_a` text COLLATE utf8mb4_spanish_ci,
  `part_b` text COLLATE utf8mb4_spanish_ci,
  `part_c` text COLLATE utf8mb4_spanish_ci,
  `edo_exp` text COLLATE utf8mb4_spanish_ci,
  `ref_exp` text COLLATE utf8mb4_spanish_ci,
  `hc_peso` text COLLATE utf8mb4_spanish_ci,
  `hc_talla` text COLLATE utf8mb4_spanish_ci,
  `hc_ta` text COLLATE utf8mb4_spanish_ci,
  `hc_fc` text COLLATE utf8mb4_spanish_ci,
  `hc_fr` text COLLATE utf8mb4_spanish_ci,
  `hc_tem` text COLLATE utf8mb4_spanish_ci,
  `hc_fum` text COLLATE utf8mb4_spanish_ci,
  `hc_ant_fam` text COLLATE utf8mb4_spanish_ci,
  `hc_ant_per_no_p` text COLLATE utf8mb4_spanish_ci,
  `hc_ant_per_p` text COLLATE utf8mb4_spanish_ci,
  `hc_pad` text COLLATE utf8mb4_spanish_ci,
  `hc_exp_fis` text COLLATE utf8mb4_spanish_ci,
  `hc_otros` text COLLATE utf8mb4_spanish_ci,
  `hc_rx` text COLLATE utf8mb4_spanish_ci,
  `hc_dx` text COLLATE utf8mb4_spanish_ci,
  `hc_tx` text COLLATE utf8mb4_spanish_ci,
  `diabet_pers` text COLLATE utf8mb4_spanish_ci,
  `hipert_pers` text COLLATE utf8mb4_spanish_ci,
  `hipoto_pers` text COLLATE utf8mb4_spanish_ci,
  `asma_pers` text COLLATE utf8mb4_spanish_ci,
  `hernia_pers` text COLLATE utf8mb4_spanish_ci,
  `renales_pers` text COLLATE utf8mb4_spanish_ci,
  `migrana_pers` text COLLATE utf8mb4_spanish_ci,
  `gastrit_pers` text COLLATE utf8mb4_spanish_ci,
  `alergias_pers` text COLLATE utf8mb4_spanish_ci,
  `fractura_pers` text COLLATE utf8mb4_spanish_ci,
  `nervios_pers` text COLLATE utf8mb4_spanish_ci,
  `convulc_pers` text COLLATE utf8mb4_spanish_ci,
  `paralis_pers` text COLLATE utf8mb4_spanish_ci,
  `tubercul_pers` text COLLATE utf8mb4_spanish_ci,
  `cirugias_pers` text COLLATE utf8mb4_spanish_ci,
  `enfermedad` text COLLATE utf8mb4_spanish_ci,
  `otro_opc_a` text COLLATE utf8mb4_spanish_ci,
  `pers_opc_b` text COLLATE utf8mb4_spanish_ci,
  `pers_opc_c` text COLLATE utf8mb4_spanish_ci,
  `pers_opc_ccual` text COLLATE utf8mb4_spanish_ci,
  `antecedfami` text COLLATE utf8mb4_spanish_ci,
  `antecedfamquien` text COLLATE utf8mb4_spanish_ci,
  `diabet_fam` text COLLATE utf8mb4_spanish_ci,
  `renal_fam` text COLLATE utf8mb4_spanish_ci,
  `corazon_fam` text COLLATE utf8mb4_spanish_ci,
  `nervios_fam` text COLLATE utf8mb4_spanish_ci,
  `cereb_fam` text COLLATE utf8mb4_spanish_ci,
  `hipert_fam` text COLLATE utf8mb4_spanish_ci,
  `hipote_fam` text COLLATE utf8mb4_spanish_ci,
  `padre_vive` text COLLATE utf8mb4_spanish_ci,
  `padre_edad` text COLLATE utf8mb4_spanish_ci,
  `madre_vive` text COLLATE utf8mb4_spanish_ci,
  `madre_edad` text COLLATE utf8mb4_spanish_ci,
  `hermanos` text COLLATE utf8mb4_spanish_ci,
  `hermanos_cant` text COLLATE utf8mb4_spanish_ci,
  `conyu_si` text COLLATE utf8mb4_spanish_ci,
  `conyu_edad` text COLLATE utf8mb4_spanish_ci,
  `conyu_no` text COLLATE utf8mb4_spanish_ci,
  `hijos` text COLLATE utf8mb4_spanish_ci,
  `hijos_cant` text COLLATE utf8mb4_spanish_ci,
  `hijos_no` text COLLATE utf8mb4_spanish_ci,
  `fuma` text COLLATE utf8mb4_spanish_ci,
  `fuma_antes_si` text COLLATE utf8mb4_spanish_ci,
  `fuma_antes_no` text COLLATE utf8mb4_spanish_ci,
  `fuma_empezo` text COLLATE utf8mb4_spanish_ci,
  `fuma_dejo` text COLLATE utf8mb4_spanish_ci,
  `fuma_cant` text COLLATE utf8mb4_spanish_ci,
  `fuma_razon` text COLLATE utf8mb4_spanish_ci,
  `toma` text COLLATE utf8mb4_spanish_ci,
  `toma_inicio` text COLLATE utf8mb4_spanish_ci,
  `tomafrecuencia` text COLLATE utf8mb4_spanish_ci,
  `toma_dia` text COLLATE utf8mb4_spanish_ci,
  `toma_sem` text COLLATE utf8mb4_spanish_ci,
  `toma_quin` text COLLATE utf8mb4_spanish_ci,
  `toma_mens` text COLLATE utf8mb4_spanish_ci,
  `toma_acci_si` text COLLATE utf8mb4_spanish_ci,
  `toma_acci_no` text COLLATE utf8mb4_spanish_ci,
  `toma_acci_com` text COLLATE utf8mb4_spanish_ci,
  `drogas` text COLLATE utf8mb4_spanish_ci,
  `drogas_coment` text COLLATE utf8mb4_spanish_ci,
  `menarca` text COLLATE utf8mb4_spanish_ci,
  `ritmo` text COLLATE utf8mb4_spanish_ci,
  `enferm_glandulas` text COLLATE utf8mb4_spanish_ci,
  `enferm_ovarios` text COLLATE utf8mb4_spanish_ci,
  `enferm_utero` text COLLATE utf8mb4_spanish_ci,
  `embrazo` text COLLATE utf8mb4_spanish_ci,
  `embrazo_sem` text COLLATE utf8mb4_spanish_ci,
  `fecha_regla` text COLLATE utf8mb4_spanish_ci,
  `ginecoobst` text COLLATE utf8mb4_spanish_ci,
  `gesta` text COLLATE utf8mb4_spanish_ci,
  `abortos` text COLLATE utf8mb4_spanish_ci,
  `partos` text COLLATE utf8mb4_spanish_ci,
  `cesarea` text COLLATE utf8mb4_spanish_ci,
  `mastografia` text COLLATE utf8mb4_spanish_ci,
  `papanicolao` text COLLATE utf8mb4_spanish_ci,
  `anticonceptivo` text COLLATE utf8mb4_spanish_ci,
  `anticoncepcual` text COLLATE utf8mb4_spanish_ci,
  `talla` text COLLATE utf8mb4_spanish_ci,
  `cintura` text COLLATE utf8mb4_spanish_ci,
  `peso` text COLLATE utf8mb4_spanish_ci,
  `fc` text COLLATE utf8mb4_spanish_ci,
  `t_a` text COLLATE utf8mb4_spanish_ci,
  `glucemia` text COLLATE utf8mb4_spanish_ci,
  `ojo_dere` text COLLATE utf8mb4_spanish_ci,
  `cataratas` text COLLATE utf8mb4_spanish_ci,
  `ojo_izq` text COLLATE utf8mb4_spanish_ci,
  `pterigion` text COLLATE utf8mb4_spanish_ci,
  `antidop_fecha` text COLLATE utf8mb4_spanish_ci,
  `antidop_res` text COLLATE utf8mb4_spanish_ci,
  `alcohol_fecha` text COLLATE utf8mb4_spanish_ci,
  `alcohol_res` text COLLATE utf8mb4_spanish_ci,
  `prueba_emb_fech` text COLLATE utf8mb4_spanish_ci,
  `prueba_emb_res` text COLLATE utf8mb4_spanish_ci,
  `antidop_observ` text COLLATE utf8mb4_spanish_ci,
  `apto` text COLLATE utf8mb4_spanish_ci,
  `noapto` text COLLATE utf8mb4_spanish_ci,
  `registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `religion` (
  `id_religion` int(11) NOT NULL AUTO_INCREMENT,
  `religion` text NOT NULL,
  PRIMARY KEY (`id_religion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_controlsalud`
--

DROP TABLE IF EXISTS `tipo_controlsalud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_controlsalud` (
  `id_tipocontrol` int(11) NOT NULL AUTO_INCREMENT,
  `tipocontrol` text CHARACTER SET utf8,
  PRIMARY KEY (`id_tipocontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_examen`
--

DROP TABLE IF EXISTS `tipo_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_examen` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipoexamen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id_usuario` bigint(191) NOT NULL AUTO_INCREMENT,
  `tipo_usu` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nom_usu` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `con_usu` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_usu` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `ape_pat` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `ape_mat` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `sex` text COLLATE utf8mb4_spanish_ci,
  `fecha_naci` date DEFAULT NULL,
  `registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-07 11:18:13
