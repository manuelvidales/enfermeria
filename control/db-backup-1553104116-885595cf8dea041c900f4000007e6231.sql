DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id_usuario` bigint(255) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO usuario VALUES("11","Admin","administrador","admin","Administrador","Sistema","Enfermeria","Masculino","2018-01-01","2019-03-05 13:54:00");
INSERT INTO usuario VALUES("12","Usuario","usuario","usuario","Demo","Pat","Mat","Masculino","1990-03-14","2019-03-05 13:54:00");
INSERT INTO usuario VALUES("13","Usuario","rosario","rosario","Maria del Rosario","Cervantes","Garcia","Femenino","1994-02-05","2019-03-08 15:28:41");
INSERT INTO usuario VALUES("14","Usuario","nancy","nancy","Nancy","Diaz","Lopez","Femenino","1994-04-29","2019-03-08 15:29:39");
INSERT INTO usuario VALUES("15","Admin","karen","karenzamorano","Lic. Karen","Zamorano","Santillan","Femenino","1992-09-09","2019-03-09 08:24:14");



DROP TABLE IF EXISTS paciente;

CREATE TABLE `paciente` (
  `id_paciente` bigint(255) NOT NULL AUTO_INCREMENT,
  `fecha_reg` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_emp` text COLLATE utf8mb4_spanish_ci NOT NULL,
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
  `cancer_fam` text COLLATE utf8mb4_spanish_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO paciente VALUES("44","2018-10-10","JAVIER BARRIOS GONZALEZ","Femenino","1980-09-29","38","Baja California","1987-7891","1234567","1234567","A-","","tres","123","2","lomas de jarachina","Reynosa","TAMAULIPAS","","","Casado/a.","","Metodista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","DIABETES - ENF. RENALES - MIGRANA - GASTRITIS - ALERGIAS - TUBERCULOSIS","","Si","No","","Diabetes - Cerebrovasculares","","","","","","","","","SI","45","SI","66","SI","3","SI","33","","SI","1","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("46","2018-10-10","JUAN AUGUSTO SANCHEZ CALTE","Masculino","1980-10-22","37","Colima","","1234567","1234567","","","ddddd","123","2","lomas","reynosa","Baja California","","","Comprometido/a.","","ApÃ³stolica","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","","","","","","","","","","","DIABETES - GASTRITIS - CIRUGIAS","","Si","No","","Diabetes - Enf.corazaron","","","","","","","","","SI","33","Fallecido","","SI","2","SI","22","","SI","1","","si","si","","1990","1991","3","personal","si","desde los 20 aÃ±os","Quincenal","","","","","no","","","no","","prueba de captura","prueba de captura","no","si","no","si","","2019-03-12","Parto - Cesarea","","","","","si","no","160","72","75","88","132/91","138","2.5","NO","1.5","No","2019-03-09","Negativo","2019-03-12","Negativo","2019-03-14","Negativo","prueba de captura","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("48","2018-10-10","EDGAR BAUTISTA CRUZ","Masculino","1990-12-29","27","Durango","","1234567","1234567","","","tres","123","2","lomas","reynosa","Baja California","","","Divorciado/a.","","Bautista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","","","","","","MIGRANA","","","","","","","TUBERCULOSIS","CIRUGIAS","DIABETES - GASTRITIS - FRACTURA - TUBERCULOSIS","","Si","No","","Cancer - Diabetes - Enf. Renales - Cerebrovasculares - Hipertension","","diabetes","enf. Renales","","","CEREBROVASCULARES","HIPERTENSION","HIPOTENSION","SI","43","Fallecido","","SI","45","SI","45","","SI","23","","no","si","","89","89","89","89","no","ninguno","","Diario","","Quincenal","","si","","ninguno","si","","ninguno","ninguno","si","si","no","no","3","2018-10-03","","","Aborto","Parto","Cesarea","si","si","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-10-03","ninguno","2018-10-04","ninguno","2018-09-10","ninguno","ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("50","2018-10-10","SEVERIANO ARTEAGA HUERTA","Femenino","1978-10-10","40","Chiapas","76677","1234567","1234567","","","tres","123","2","lomas","Aguascalientes","AGUASCALIENTES","","","Divorciado/a.","","Bautista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","","","","HERNIA","","MIGRANA","","","FRACTURA","","","PARALISIS","TUBERCULOSIS","","","ninguno","Si","Si","ninguno","","","diabetes","","","","CEREBROVASCULARES","HIPERTENSION","HIPOTENSION","SI","43","Fallecido","","SI","45","SI","45","","SI","23","","si","","no","12","1","1","ninguno","no","ninguno","","Diario","","Quincenal","","si","","ninguno","si","","ninguno","ninguno","si","no","no","si","ninguno","2018-06-13","","Gesta","Aborto","Parto","Cesarea","si","","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-10-01","ninguno","2018-08-30","ninguno","2018-09-06","ninguno","ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("51","2018-10-10","JOSE RAFAEL CANO CANTU","Masculino","1980-10-23","37","Chihuahua","","1234567","1234567","","","ddddd","123","2","sdfghjk","sdfghj","Baja California","","","Comprometido/a.","","Bautista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Inactivo","","","","","","","","","","","","","","","","","","DIABETES","","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","TUBERCULOSIS","CIRUGIAS","","ninguno","Si","Si","ninguno","","cancer","","enf. Renales","enf. corazaron","Nervios","CEREBROVASCULARES","HIPERTENSION","HIPOTENSION","Fallecido","","SI","54","SI","45","","","NO","","","NO","si","","no","3","1999","2","ninguno","no","ninguno","","Diario","Semanal","Quincenal","Mensual","","no","ninguno","no","","ninguno","ninguno","si","si","si","si","3","2018-10-10","","Gesta","Aborto","","Cesarea","no","si","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-10-03","ninguno","2018-10-06","ninguno","2018-10-07","ninguno","ninguno","SI","SI","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("52","2018-10-11","ABEL CHAVEZ PARRA","Femenino","1980-10-10","38","Baja California","","1234567","1234567","","","tres","123","2","lomas","reynosa","Baja California","","","Comprometido/a.","","Cristiana","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","d564321bhh","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","","","","ENF. RENALES","","GASTRITIS","","","NERVIOS","","","TUBERCULOSIS","CIRUGIAS","","","Si","No","ninguno","","cancer","diabetes","enf. Renales","enf. corazaron","Nervios","","HIPERTENSION","HIPOTENSION","SI","43","","","NO","45","","","NO","SI","23","","no","","","2012","2012","3","ninguno","no","ninguno","","","","","","si","","ninguno","no","","ninguno","ninguno","si","si","si","si","ninguno","2018-10-01","","Gesta","Aborto","Parto","Cesarea","si","si","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-10-11","ninguno","2018-10-11","ninguno","2018-10-11","ninguno","ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("53","2018-10-11","ALFONSO FRAIRE CASTILLO","Masculino","1990-04-30","28","Colima","","1234567","1234567","","","ddddd","123","2","lomas","reynosa","Baja California","","","Comprometido/a.","","Judia","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","","","","formulariodemo","Si","Si","formulariodemo","","cancer","diabetes","enf. Renales","enf. corazaron","Nervios","CEREBROVASCULARES","HIPERTENSION","HIPOTENSION","SI","43","Fallecido","","SI","45","SI","45","","SI","23","","si","si","","1234","123","123","formulariodemo","si","formulariodemo","","Diario","","Quincenal","Mensual","","no","formulariodemo","si","","formulariodemo","formulariodemo","si","si","si","no","formulariodemo","2018-10-11","","Gesta","Aborto","Parto","Cesarea","si","no","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-10-02","formulariodemo","2018-10-06","formulariodemo","2018-10-09","formulariodemo","formulariodemo","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("54","2018-10-01","CANDELARIO ESCOBEDO VELA","Masculino","2000-11-27","17","Baja California Su","","1234567","1234567","","","ddddd","123","2","lomas","reynosa","Baja California Su","","","Comprometido/a.","","Bautista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","TUBERCULOSIS","CIRUGIAS",""," ninguno","Si","Si","ninguno","","cancer","diabetes","enf. Renales","enf. corazaron","Nervios","CEREBROVASCULARES","HIPERTENSION","HIPOTENSION","SI","43","Fallecido","","SI","45","","","NO","","","NO","si","","no","1990","1990","8","ninguno","si","ninguno","","Diario","","Quincenal","Mensual","si","","ninguno","si","","ninguno","ninguno","si","no","si","no","ninguno","2018-06-30","","Gesta","Aborto","Parto","Cesarea","si","no","34","56","78","88","67","45","1.5","5.0","2.1","34","2018-08-06","ninguno","2018-08-09","ninguno","2018-10-08","ninguno","ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("55","2018-10-18","ALAN MAE DIAZ MARTINEZ","Masculino","1980-10-10","38","Baja California Su","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Tamaulipas","","","Casado/a.","","Budista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654321","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","TUBERCULOSIS","CIRUGIAS","","Ninguno","Si","No","ninguno","","Cancer","Diabetes","Enf. Renales","Enf. corazaron","Nervios","Cerebrovasculares","Hipertension","Hipotension","SI","65","SI","66","SI","2","SI","35","","SI","5","","si","si","","1990","1991","3","ninguno","si","des Ayer","","Diario","","Quincenal","","si","","ninguno","no","ninguno","ninguno","ninguno","si","no","si","si","5","2018-10-02","","Gesta","Aborto","Parto","Cesarea","si","si","65","66","70","88","76","67","1.5","no","1.9","no","2018-10-04","ninguno","2018-10-03","ninguno","2018-10-07","ninguno","ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("56","2018-11-06","GENARO RENDON REYES","Masculino","1980-11-06","38","México","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Baja California","","","Divorciado/a.","","Bautista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654321","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","TUBERCULOSIS","CIRUGIAS","","ningunoq","Si","Si","ninguno","","Cancer","Diabetes","Enf. Renales","Enf. corazaron","","Cerebrovasculares","Hipertension","Hipotension","SI","45","SI","66","SI","3","SI","33","","SI","5","","no","si","","1990","1991","3","niguna","no","ninguno","","Diario","Semanal","Quincenal","Mensual","si","","ninguno","no","ninguno","ninguno","ninguno","si","no","si","no","3 semanas","2018-10-29","","Gesta","Aborto","Parto","Cesarea","si","si","","","","","","","1.5","no","1.9","no","2018-10-31","Negativo","2018-11-03","Negativo","2018-10-28","positivo","Ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("57","2018-11-06","JEHU RUEDA DE LEON ALAMILLA","Femenino","1980-11-06","38","México","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","1234","Jarachinas","Reynosa","Baja California","","","Sin estado civil","","Sin relligion","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654333","","","","","","","Inactivo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","NERVIOS","CONVULCIONES","PARALISIS","TUBERCULOSIS","CIRUGIAS","","ningunoq","Si","Si","ninguno","","Cancer","Diabetes","Enf. Renales","Enf. corazaron","Nervios","Cerebrovasculares","Hipertension","Hipotension","SI","45","SI","66","SI","3","SI","33","","SI","5","","no","si","","1990","1991","3","niguna","no","ninguno","","Diario","Semanal","Quincenal","Mensual","si","","ninguno","no","ninguno","ninguno","ninguno","si","no","si","no","3 semanas","2018-10-29","","Gesta","Aborto","Parto","Cesarea","si","si","","","","","","","1.5","no","1.9","no","2018-10-31","Negativo","2018-11-03","Negativo","2018-10-28","positivo","Ninguno","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("59","2018-11-06","JOSE ALFREDO CORPUS CANTU","Masculino","1985-02-05","33","Aguascalientes","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","1234","Jarachinas","Reynosa","Morelos","","","Divorciado/a.","","Judia","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654333","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","DIABETES-HIPERTENSION-HIPOTENSION-ASMA-HERNIA","ninguno","Si","No","ninguno","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("60","2018-11-06","JUAN LUIS FLORES TORRES","Masculino","1978-06-15","40","Ciudad de México","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Baja California","","","Comprometido/a.","","Budista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654321","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","DIABETES-HIPERTENSION-HIPOTENSION","niugno","Si","No","nada","","","","","","","","","","","","","","","","","","","","","","si","no","","1899","1990","19","ninguno","si","ninguno","Diario - Semanal","","","","","no","","nada","si","nada","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("61","2018-11-06","CESAR AMADOR GARCIA","Masculino","1979-03-22","39","Chiapas","","1234567890","987654321","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Baja California","","","Divorciado/a.","","Espiritualista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654321","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","DIABETES-HIPERTENSION-HIPOTENSION-ASMA-HERNIA","ninguno","Si","No","ninugno","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("62","2018-11-07","EDIEL GUERRERO ALARCON","Masculino","1975-09-23","43","Jalisco","","1234567","1234567","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Hidalgo","","","Divorciado/a.","","Luteriano","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654333","","","","","","","Activo","","","","","","","","","","","","","","","","","","DIABETES","HIPERTENSION","HIPOTENSION","ASMA","HERNIA","ENF. RENALES","MIGRANA","GASTRITIS","ALERGIAS","FRACTURA","","","PARALISIS","TUBERCULOSIS","CIRUGIAS","DIABETES-HIPERTENSION-HIPOTENSION-ASMA-HERNIA","","","","","","Cancer","","Enf. Renales","Enf. corazaron","","Cerebrovasculares","Hipertension","Hipotension","SI","45","SI","46","SI","2","SI","35","","","","NO","no","","no","","","0","ninguna","si","desde hace 10 anos","","","","Quincenal","","","no","ninguno","no","","","","no","si","no","si","no","","","Gesta","","","Cesarea","si","si","55","65","50","33","23","23","1.5","no","1.9","no","2018-11-07","negativo","2018-11-07","positivo","2018-11-07","negativo","","NO","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("64","2018-11-08","ADAN HERNANDEZ GUTIERREZ","Masculino","1976-09-18","42","Coahuila","","1234567890","1234567","","","Av. Industrial Rio San Juan","123","321","Jarachinas","Reynosa","Tamaulipas","","","Divorciado/a.","","Budista","","","","","","","","","","","","","","","","","","","","","ninguno","","ninguno","0987654321","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","DIABETES - HIPERTENSION - HIPOTENSION - ASMA - HERNIA - ENF. RENALES - MIGRANA - GASTRITIS - ALERGIAS - FRACTURA - NERVIOS - CONVULCIONES - PARALISIS - TUBERCULOSIS - CIRUGIAS","niguno","Si","No","","Cancer - Diabetes - Cerebrovasculares - Hipertension - Hipotension","","","","","","","","","SI","45","SI","46","SI","3","SI","33","","SI","1","","si","no","","1990","1989","9","ninguna","si","desde ayer","Semanal - Quincenal","","","","","no","","nada","no","ninugna","ninguno","Ninguno","si","si","no","si","3","2018-11-03","Gesta - Aborto - Parto","","","","","si","no","65","65","70","88","76","67","1.5","no","1.9","no","2018-11-01","negativo","2018-11-03","positivo","2018-11-06","negativo","nada","SI","NO","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("65","2019-01-23","ARMANDO REYES CANTU","Masculino","1983-02-08","35","Morelos","","123456789","9238723","","","Av. industrial","12","2","jarachina","Reynosa","Nayarit","","","Divorciado/a.","","Ortodoxa","","","","","","","","","","","","","","","","","","","","","sin nombre","","hermano","1234567890","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 13:56:21");
INSERT INTO paciente VALUES("66","2019-03-05","CESAR GIL PINEDA","Femenino","1981-01-28","38","Baja California","1987-7891","1234567890","1234567890","","","rio san juan","s/n","s/n","jarachina","reynosa","Aguascalientes","","","Sin estado civil","","Sin relligion","","","","","","","","","","","","","","","","","","","","","Juan Perez","","hijo","9876543","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-05 14:12:43");
INSERT INTO paciente VALUES("69","2019-03-08","ANGEL GUALBERTO GARZA MORIN","Masculino","1976-03-30","42","Tamaulipas","1987-7891","1234567890","1234567890","","","rio san juan","s/n","s/n","Centro","Camargo","TAMAULIPAS","","","Casado/a.","","Luteriano","","","","","","","","","","","","","","","","","","","","","Juan Perez","","hijo","9876543","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-08 15:35:09");
INSERT INTO paciente VALUES("71","2019-03-01","ABIGAIL MEJIA CASTILLO","Femenino","1995-08-06","23","Tamaulipas","NA","8999670072","N/A","O +","","Irapuato","8023","8023","Campestre","Reynosa","TAMAULIPAS","","","Soltero/a.","","CatÃ³lica","","","","","","","","","","","","","","","","","","","","","Enerique Mejia Garcia ","","Padre","8999670072","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","Si","Si","HIERRO","","","","","","","","","","SI","45","SI","44","SI","2","NO","","","NO","","","no","","","","","","","no","","","","","","","no","","","no","","12 AÃ‘OS","Irregular","no","no","no","no","","2019-02-24","","","","","","no","no","1.49cm","n/a","49kg","76","128/80mmhg","","20/10","Neg","20/13","Neg","2019-03-01","Negativo","","","2019-03-01","Negativo","","","","2019-03-14 11:04:13");
INSERT INTO paciente VALUES("72","2017-06-19","ABRAHAM MARTINEZ DE AVILA","Masculino","1986-07-12","32","Coahuila","3204863417","N/A","N/A","N/A","","sinaloa","687","687","Rodriguez","Reynosa","TAMAULIPAS","","","Soltero/a.","","Sin religion","","","","","","","","","","","","","","","","","","","","","Maria de Carmen de Avila","","Madre","8992301994","","","","","","","Activo","2019-03-16 09:25:21","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-16 10:25:18");
INSERT INTO paciente VALUES("73","2019-02-01","AARON GARZA GARCIA","Masculino","2019-07-01","25","Tamaulipas","9099329535","8993445381","N/A","N/A","","cuarta","513","513","las cumbres","Reynosa","TAMAULIPAS","","","Soltero/a.","","Cristiana","","","","","","","","","","","","","","","","","","","","","Artemio Garza Garcia","","Padre","8993553179","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","Si","No","","","","","","","","","","","SI","55","Fallecido","","SI","2","NO","","","NO","","","no","no","","","","","","no","","","","","","","no","","","no","","","","","","","","","","","","","","","","","1.65","N/A","141","78","126/96mm/hg","83","20/20","Neg","20/13","neg","2019-02-01","negativo","","","","","","SI","","2019-03-16 10:58:15");
INSERT INTO paciente VALUES("74","2018-04-24","FRANCISCO JAVIER HERNANDEZ GUTIERREZ","Masculino","1987-02-01","32","San Luis PotosÃ­","9048708854","9564367817","","A +","","PUNTA HUESO DE BALLENA","152","152","PUERTA DEL SOL","Reynosa","TAMAULIPAS","","","Casado/a.","","Sin religion","","","","","","","","","","","","","","","","","","","","","YESSIKA RAYON ALVAREZ","","ESPOSA ","8992881547","","","","","","","Activo","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","HIPERTENSION","","No","Si","CAPTOPRIL","Diabetes","","","","","","","","","Fallecido","","","47","","3","","28","","","2","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2019-03-19 10:08:51");
INSERT INTO paciente VALUES("75","2017-07-18","RUBEN TOVAR GONZALEZ","Masculino","1986-09-26","32","Tamaulipas","9038600087","8994238773","N/A","O +","","2da","147","147","Pedro J Mendez","Ciudad Madero","TAMAULIPAS","","","Soltero/a.","","Cristiana","","","","","","","","","","","","","","","","","","","","","Leticia Gonzalez Castilla","","Madre","8994457004","","","","","","","Activo","2019-03-19 09:38:03","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","No","No","n/a","","","","","","","","","","SI","60","SI","58","SI","4","NO","","","NO","","","no","no","","","","","","no","","","","","","","no","","","no","","","","","","","","","","","","","","","","","1.70","94.9","89","74","129/91mmhg","n/a","20/10","Neg","20/15","Neg","","","","","","","","","","2019-03-19 10:38:01");



DROP TABLE IF EXISTS consulta;

CREATE TABLE `consulta` (
  `id_consulta` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(255) NOT NULL,
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




DROP TABLE IF EXISTS archivo;

CREATE TABLE `archivo` (
  `id_archivo` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(255) NOT NULL,
  `fecha_arc` date NOT NULL,
  `nom_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `ubi_arc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `fk_paciente_archivo` (`id_paciente`),
  CONSTRAINT `fk_paciente_archivo` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO archivo VALUES("1","44","2018-10-17","prueba 1","4","44_17-10-2018 24_Reporte_ (1).pdf");
INSERT INTO archivo VALUES("2","44","2018-10-17","foto 1","1","44_17-10-2018 59_masculino-001.png");
INSERT INTO archivo VALUES("3","44","2018-10-17","examen octubre2018","1","44_17-10-2018 39_exam-md.png");
INSERT INTO archivo VALUES("4","46","2018-10-17","examen octubre2018","4","46_17-10-2018 17_Reporte_ (2).pdf");
INSERT INTO archivo VALUES("5","46","2018-10-17","prueba 1","1","46_17-10-2018 29_exam-01.png");
INSERT INTO archivo VALUES("6","46","2018-10-17","foto 1","1","46_17-10-2018 55_profile-male-avatar.jpg");
INSERT INTO archivo VALUES("7","48","2018-10-17","foto 1","1","48_17-10-2018 12_profile-male-avatar-002.jpg");
INSERT INTO archivo VALUES("8","54","2018-10-17","foto 1","1","54_17-10-2018 43_profile-male-avatar-002.jpg");
INSERT INTO archivo VALUES("9","54","2018-10-17","examen octubre2018","1","54_17-10-2018 58_exam-md.png");
INSERT INTO archivo VALUES("10","54","2018-10-17","prueba 1","4","54_17-10-2018 28_Reporte_.pdf");
INSERT INTO archivo VALUES("11","55","2018-10-18","foto 1","1","55_18-10-2018 06_profile-male-avatar-002.jpg");
INSERT INTO archivo VALUES("12","55","2018-10-18","examen octubre2018","4","55_18-10-2018 33_Reporte_ (5).pdf");
INSERT INTO archivo VALUES("14","52","2018-11-03","imagen prueba","1","52_03-11-2018 20_vector-analisis.jpg");
INSERT INTO archivo VALUES("15","52","2018-11-03","documento anexo1","4","52_03-11-2018 28_Reporte_ (4).pdf");
INSERT INTO archivo VALUES("16","56","2018-11-17","foto 1","1","56_17-11-2018 48_profile-male-avatar.jpg");
INSERT INTO archivo VALUES("17","64","2018-11-17","portada","1","64_17-11-2018 41_background-web2.jpg");
INSERT INTO archivo VALUES("19","65","2019-01-23","documento1","4","65_23-01-2019 51_CheckListPC.pdf");
INSERT INTO archivo VALUES("20","65","2019-01-23","documento1","1","65_23-01-2019 54_profile-male-avatar-002.jpg");
INSERT INTO archivo VALUES("22","71","2019-03-16","drogas pre-empleo","4","71_16-03-2019 17_Abigail Mejia.pdf");
INSERT INTO archivo VALUES("23","73","2019-03-16","drogas pre-empleo","4","73_16-03-2019 00_aaron garcia.pdf");
INSERT INTO archivo VALUES("24","72","2019-03-16","droga","4","72_16-03-2019 17_Abraham Martinez.pdf");
INSERT INTO archivo VALUES("25","72","2019-03-16","drogas","4","72_16-03-2019 41_Abraham Mtz.pdf");
INSERT INTO archivo VALUES("26","72","2019-03-16","droga","4","72_16-03-2019 09_abraham Mtz de Av.pdf");



DROP TABLE IF EXISTS religion;

CREATE TABLE `religion` (
  `id_religion` int(11) NOT NULL AUTO_INCREMENT,
  `religion` text NOT NULL,
  PRIMARY KEY (`id_religion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO religion VALUES("1","Católica");
INSERT INTO religion VALUES("2","Apóstolica");
INSERT INTO religion VALUES("3","Romana");
INSERT INTO religion VALUES("4","Pentecosté");
INSERT INTO religion VALUES("5","Bautista");
INSERT INTO religion VALUES("6","Presbiteriana");
INSERT INTO religion VALUES("7","Espiritualista");
INSERT INTO religion VALUES("8","Ortodoxa");
INSERT INTO religion VALUES("9","Luteriano");
INSERT INTO religion VALUES("10","Judia");
INSERT INTO religion VALUES("11","Budista");
INSERT INTO religion VALUES("12","Metodista");
INSERT INTO religion VALUES("13","Luz del mundo");
INSERT INTO religion VALUES("14","Cristiana");
INSERT INTO religion VALUES("15","Nuevas expresiones");
INSERT INTO religion VALUES("16","Hindú");
INSERT INTO religion VALUES("17","Islámica");
INSERT INTO religion VALUES("18","Anglicana");
INSERT INTO religion VALUES("19","Mormones");
INSERT INTO religion VALUES("20","Ejercito de salvación");



DROP TABLE IF EXISTS edo_civil;

CREATE TABLE `edo_civil` (
  `id_edo_civil` int(11) NOT NULL AUTO_INCREMENT,
  `edo_civil` text NOT NULL,
  PRIMARY KEY (`id_edo_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO edo_civil VALUES("1","Soltero/a.");
INSERT INTO edo_civil VALUES("2","Comprometido/a.");
INSERT INTO edo_civil VALUES("3","Casado/a.");
INSERT INTO edo_civil VALUES("4","Divorciado/a.");
INSERT INTO edo_civil VALUES("5","Viudo/a.");



DROP TABLE IF EXISTS causas_incap;

CREATE TABLE `causas_incap` (
  `id_causas` int(11) NOT NULL AUTO_INCREMENT,
  `causas_incap` text NOT NULL,
  PRIMARY KEY (`id_causas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO causas_incap VALUES("1","Acidente en Trabajo");
INSERT INTO causas_incap VALUES("2","Enfermedad");
INSERT INTO causas_incap VALUES("3","Embrazo");
INSERT INTO causas_incap VALUES("4","Accidente externo");
INSERT INTO causas_incap VALUES("5","Familiar");



DROP TABLE IF EXISTS controlsalud;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO controlsalud VALUES("1","46","2018-11-12","Diabetes Mellitus","132/91mmhg fc 85","138mg/dl ");
INSERT INTO controlsalud VALUES("2","46","2018-11-13","Hipertension","130/87mmhg fc 86","NA");
INSERT INTO controlsalud VALUES("3","44","2018-11-13","Sin selecion","132/91mmhg fc 85","138mg/dl ");
INSERT INTO controlsalud VALUES("4","44","2019-01-22","Hipertension","136/86mmhg fc 80","N/A");



DROP TABLE IF EXISTS examenes;

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

INSERT INTO examenes VALUES("5","46","2018-11-09","Antidoping","Lado Americano","negativo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("6","46","2018-11-07","Antialcohol","Local","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("7","44","2018-11-10","Antialcohol","Foraneo","Negativo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("8","44","2018-11-12","Examen Fisico","Administrativo","130/78 mm/hg fc 69","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("9","50","2018-11-12","Examen Fisico","Administrativo","154/86mmhg fc 73 ","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("10","48","2018-11-09","Examen Fisico","Administrativo","131/88mmhg fc 88","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("11","48","2018-11-12","Examen Fisico","Administrativo","122/88mmhg fc 110","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("12","44","2018-12-10","Antialcohol","Local","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("13","44","2018-12-19","Antialcohol","Local","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("14","44","2018-12-26","Antialcohol","Local","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("15","52","2018-12-11","Antialcohol","Foraneo","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("16","52","2018-12-20","Antialcohol","Foraneo","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("17","52","2018-12-28","Antialcohol","Foraneo","positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("18","60","2018-12-12","Antialcohol","Foraneo","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("19","57","2018-12-17","Antialcohol","Local","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("20","62","2018-12-21","Antialcohol","Local","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("21","62","2019-01-04","Antialcohol","Foraneo","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("22","64","2019-01-07","Antialcohol","Foraneo","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("23","59","2019-01-03","Antialcohol","Foraneo","Positivo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("24","60","2019-01-04","Antialcohol","Foraneo","Negativo","","2019-03-05 13:57:09");
INSERT INTO examenes VALUES("25","44","2019-03-14","Antialcohol","Administrativo","Negativo","prueba","2019-03-14 09:30:08");
INSERT INTO examenes VALUES("26","44","2019-03-14","Examen Fisico","Foraneo","Negativo","prueba","2019-03-14 09:30:54");
INSERT INTO examenes VALUES("27","48","2019-03-15","Antialcohol","Local","Negativo","NA","2019-03-15 12:02:55");
INSERT INTO examenes VALUES("28","48","2019-03-15","Antidoping","Local","Negativo","N/A","2019-03-15 12:03:15");
INSERT INTO examenes VALUES("29","71","2019-03-01","Antidoping","Administrativo","Negativo","Negativo","2019-03-16 10:29:26");
INSERT INTO examenes VALUES("30","71","2019-03-08","Antialcohol","Administrativo","Negativo",".000","2019-03-16 10:46:36");
INSERT INTO examenes VALUES("31","71","2019-03-09","Antialcohol","Administrativo","Negativo",".000","2019-03-16 10:46:54");
INSERT INTO examenes VALUES("32","71","2019-03-11","Antialcohol","Administrativo","Negativo",".000","2019-03-16 10:47:21");
INSERT INTO examenes VALUES("33","71","2019-03-14","Antialcohol","Administrativo","Negativo",".000","2019-03-16 10:47:39");
INSERT INTO examenes VALUES("34","73","2019-02-01","Antidoping","Administrativo","Negativo","negativo","2019-03-16 11:04:39");
INSERT INTO examenes VALUES("35","73","2019-02-15","Antialcohol","Administrativo","Negativo",".000","2019-03-16 11:08:05");
INSERT INTO examenes VALUES("36","73","2019-03-02","Antialcohol","Administrativo","Negativo",".000","2019-03-16 11:09:25");
INSERT INTO examenes VALUES("37","73","2019-03-11","Antialcohol","Administrativo","Negativo",".000","2019-03-16 11:09:50");
INSERT INTO examenes VALUES("38","73","2019-03-14","Antialcohol","Administrativo","Negativo",".000","2019-03-16 11:11:04");
INSERT INTO examenes VALUES("39","72","2019-01-04","Antidoping","Mantenimiento","Negativo","Negativo","2019-03-16 11:33:20");
INSERT INTO examenes VALUES("40","72","2019-01-04","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:33:47");
INSERT INTO examenes VALUES("41","72","2019-01-11","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:34:08");
INSERT INTO examenes VALUES("42","72","2019-01-12","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:34:37");
INSERT INTO examenes VALUES("43","72","2019-01-14","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:35:13");
INSERT INTO examenes VALUES("44","72","2019-01-18","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:35:43");
INSERT INTO examenes VALUES("45","72","2019-01-19","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:36:24");
INSERT INTO examenes VALUES("46","72","2019-01-21","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:37:06");
INSERT INTO examenes VALUES("47","72","2019-01-25","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:37:26");
INSERT INTO examenes VALUES("48","72","2019-01-26","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:37:48");
INSERT INTO examenes VALUES("49","72","2019-01-28","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:38:08");
INSERT INTO examenes VALUES("50","72","2019-02-01","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:38:33");
INSERT INTO examenes VALUES("51","72","2019-02-02","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:38:55");
INSERT INTO examenes VALUES("52","72","2019-02-08","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:39:17");
INSERT INTO examenes VALUES("53","72","2019-02-09","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:39:36");
INSERT INTO examenes VALUES("54","72","2019-02-11","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:39:58");
INSERT INTO examenes VALUES("55","72","2019-02-15","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:40:19");
INSERT INTO examenes VALUES("56","72","2019-02-16","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:40:42");
INSERT INTO examenes VALUES("57","72","2019-02-22","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:41:00");
INSERT INTO examenes VALUES("58","72","2019-02-25","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:41:38");
INSERT INTO examenes VALUES("59","72","2019-03-01","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:42:04");
INSERT INTO examenes VALUES("60","72","2019-03-02","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:42:21");
INSERT INTO examenes VALUES("61","72","2019-03-07","Antidoping","Mantenimiento","Negativo","Negativo","2019-03-16 11:43:26");
INSERT INTO examenes VALUES("62","72","2019-03-08","Antialcohol","Mantenimiento","Negativo","Negativo","2019-03-16 11:43:51");
INSERT INTO examenes VALUES("63","72","2019-03-11","Antialcohol","Mantenimiento","Negativo",".000","2019-03-16 11:45:20");
INSERT INTO examenes VALUES("64","72","2019-03-12","Antidoping","Mantenimiento","Negativo","Negativo","2019-03-16 11:45:48");
INSERT INTO examenes VALUES("65","75","2019-01-03","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:38:28");
INSERT INTO examenes VALUES("66","75","2019-03-11","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:38:48");
INSERT INTO examenes VALUES("67","75","2019-03-21","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:39:05");
INSERT INTO examenes VALUES("68","75","2019-02-02","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:39:30");
INSERT INTO examenes VALUES("69","75","2019-02-05","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:39:49");
INSERT INTO examenes VALUES("70","75","2019-02-09","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:40:08");
INSERT INTO examenes VALUES("71","75","2019-02-15","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:41:48");
INSERT INTO examenes VALUES("72","75","2019-02-25","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:42:08");
INSERT INTO examenes VALUES("73","75","2019-02-11","Antialcohol","Transfer","Negativo",".000","2019-03-19 16:43:15");



DROP TABLE IF EXISTS grupo_examen;

CREATE TABLE `grupo_examen` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO grupo_examen VALUES("1","Lado Americano");
INSERT INTO grupo_examen VALUES("2","Local");
INSERT INTO grupo_examen VALUES("3","Foraneo");
INSERT INTO grupo_examen VALUES("4","Administrativo");
INSERT INTO grupo_examen VALUES("5","Mantenimiento");
INSERT INTO grupo_examen VALUES("6","Transfer");



DROP TABLE IF EXISTS incapacidades;

CREATE TABLE `incapacidades` (
  `id_incapacidad` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `fecha_inicio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_final` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `causas_incap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_incapacidad`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `incapacidades_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

INSERT INTO incapacidades VALUES("1","44","2018-11-03","2018-11-03","Enfermedad","Prueba incapacidad 01");
INSERT INTO incapacidades VALUES("2","46","2018-11-06","2018-11-07","Acidente en Trabajo","prueba 02");
INSERT INTO incapacidades VALUES("3","44","2018-11-03","2018-11-05","Embrazo","Prueba 03");
INSERT INTO incapacidades VALUES("4","44","2018-11-12","2018-11-16","Accidente externo","Prueba 04");
INSERT INTO incapacidades VALUES("5","46","2018-11-03","2018-11-05","Familiar","Prueba 05");
INSERT INTO incapacidades VALUES("6","46","2018-11-08","2018-11-11","Accidente externo","Prueba 06");
INSERT INTO incapacidades VALUES("7","44","2018-11-03","2018-11-03","Acidente en Trabajo","prueba 06");
INSERT INTO incapacidades VALUES("8","46","2018-11-03","2018-11-03","Embrazo","prueba 07");
INSERT INTO incapacidades VALUES("9","44","2018-11-05","2018-11-05","Familiar","Esta es una prueba de captura de informacion");
INSERT INTO incapacidades VALUES("10","48","2018-11-05","2018-11-07","Accidente externo","descripcion de prueba");
INSERT INTO incapacidades VALUES("11","48","2018-11-07","2018-11-09","Acidente en Trabajo","Breve descripcion de la causa de la incapacidad");
INSERT INTO incapacidades VALUES("12","48","2018-11-05","2018-11-05","Enfermedad","Prueba de captura desde un Tablet 10 pg.");
INSERT INTO incapacidades VALUES("13","46","2018-11-10","2018-11-14","Embrazo","ninugna");
INSERT INTO incapacidades VALUES("14","48","2018-11-10","2018-11-11","Enfermedad","prueba guardar desde el formulario");
INSERT INTO incapacidades VALUES("15","48","2018-11-10","2018-11-10","Enfermedad","envio guardar form");
INSERT INTO incapacidades VALUES("16","48","2018-11-10","2018-11-10","Enfermedad","otra desde Form");
INSERT INTO incapacidades VALUES("17","48","2018-11-10","2018-11-10","Embrazo","cuatra prueba desde form y ctrl");
INSERT INTO incapacidades VALUES("18","48","2018-11-10","2018-11-10","Sin Causas","quinta desde form");
INSERT INTO incapacidades VALUES("19","50","2018-11-10","2018-11-10","Accidente externo","prueba desde form scritp y ctrl");
INSERT INTO incapacidades VALUES("20","50","2018-11-10","2018-11-12","Acidente en Trabajo","prueba con solo form y ctrl");
INSERT INTO incapacidades VALUES("21","50","2018-11-10","2018-11-13","Acidente en Trabajo","prueba como estaba");
INSERT INTO incapacidades VALUES("22","50","2018-11-14","2018-11-15","Embrazo","prueba sin script");
INSERT INTO incapacidades VALUES("23","50","2018-11-10","2018-11-14","Accidente externo","otra prueba con form y ctrl");
INSERT INTO incapacidades VALUES("24","50","2018-11-10","2018-11-10","Enfermedad","prueba");
INSERT INTO incapacidades VALUES("25","51","2018-11-10","2018-11-10","Accidente externo","primera");
INSERT INTO incapacidades VALUES("26","51","2018-11-11","2018-11-11","Acidente en Trabajo","segunda");
INSERT INTO incapacidades VALUES("27","51","2018-11-13","2018-11-14","Embrazo","tercera");
INSERT INTO incapacidades VALUES("28","51","2018-11-10","2018-11-10","Enfermedad","cuarta");
INSERT INTO incapacidades VALUES("29","51","2018-11-10","2018-11-10","Familiar","Quinta como estaba");
INSERT INTO incapacidades VALUES("30","51","2018-11-10","2018-11-10","Accidente externo","ultima");
INSERT INTO incapacidades VALUES("31","52","2018-11-10","2018-11-10","Accidente externo","prueba");
INSERT INTO incapacidades VALUES("32","52","2018-11-10","2018-11-10","Embrazo","otra");
INSERT INTO incapacidades VALUES("33","52","2018-11-10","2018-11-10","Enfermedad","cambiando ruta");
INSERT INTO incapacidades VALUES("34","51","2018-11-10","2018-11-10","Accidente externo","ahora si ");
INSERT INTO incapacidades VALUES("35","53","2018-11-10","2018-11-10","Accidente externo","ya quedo se guarda y regresa a incapacidad");
INSERT INTO incapacidades VALUES("36","53","2018-11-10","2018-11-10","Accidente externo","otra vez");
INSERT INTO incapacidades VALUES("37","53","2018-11-10","2018-11-10","Sin Causas","nuevamente");
INSERT INTO incapacidades VALUES("38","44","2019-03-14","2019-03-19","Enfermedad","prueba");
INSERT INTO incapacidades VALUES("39","44","2019-03-14","2019-03-14","Accidente externo","ssdas");
INSERT INTO incapacidades VALUES("40","46","2019-03-14","2019-03-16","Enfermedad","prueba");
INSERT INTO incapacidades VALUES("41","61","2019-03-14","2019-03-15","Accidente externo","wssed");
INSERT INTO incapacidades VALUES("42","69","2019-03-14","2019-03-16","Acidente en Trabajo","sasfasfasf");
INSERT INTO incapacidades VALUES("43","65","2019-03-14","2019-03-15","Enfermedad","asdfasfaf");
INSERT INTO incapacidades VALUES("44","56","2019-03-14","2019-03-16","Enfermedad","rgsds");
INSERT INTO incapacidades VALUES("45","46","2019-03-14","2019-03-15","Familiar","wrewre");



DROP TABLE IF EXISTS nutricion;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO nutricion VALUES("1","46","2018-11-13","63","162","65","24.00","NORMAL");
INSERT INTO nutricion VALUES("2","44","2018-11-13","75","165","73","28.00","OBESIDAD I");
INSERT INTO nutricion VALUES("3","48","2018-11-14","134","172","128","45.00","OBESIDAD III");
INSERT INTO nutricion VALUES("4","44","2019-03-05","75","165","73","28.00","OBESIDAD I");
INSERT INTO nutricion VALUES("5","44","2019-03-06","75","165","77","27.55","OBESIDAD I");
INSERT INTO nutricion VALUES("6","44","2019-03-06","67","170","62","23.18","NORMAL");
INSERT INTO nutricion VALUES("7","46","2019-03-06","60","160","63","23.44","NORMAL");
INSERT INTO nutricion VALUES("8","48","2019-03-06","70","180","72","21.60","NORMAL");
INSERT INTO nutricion VALUES("9","44","2019-03-14","60","166","67","21.77","NORMAL");
INSERT INTO nutricion VALUES("10","48","2019-03-15","76","165","66","27.92","OBESIDAD I");
INSERT INTO nutricion VALUES("11","71","2019-03-16","49","1.49","N/A","22.27","NORMAL");
INSERT INTO nutricion VALUES("12","73","2019-03-16","141kg","1.65","N/A","1410000.00","OBESIDAD III");
INSERT INTO nutricion VALUES("13","75","2019-03-19","89","174","94.9","29.40","OBESIDAD I");



DROP TABLE IF EXISTS tipo_controlsalud;

CREATE TABLE `tipo_controlsalud` (
  `id_tipocontrol` int(11) NOT NULL AUTO_INCREMENT,
  `tipocontrol` text CHARACTER SET utf8,
  PRIMARY KEY (`id_tipocontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_controlsalud VALUES("1","Diabetes Mellitus");
INSERT INTO tipo_controlsalud VALUES("2","Hipertension");
INSERT INTO tipo_controlsalud VALUES("3","Prevención");



DROP TABLE IF EXISTS tipo_examen;

CREATE TABLE `tipo_examen` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipoexamen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_examen VALUES("1","Antialcohol","");
INSERT INTO tipo_examen VALUES("2","Antidoping","");
INSERT INTO tipo_examen VALUES("3","Examen Fisico","");



