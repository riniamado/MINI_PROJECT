-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 09:09 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `me_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `abt_hospital`
--

CREATE TABLE IF NOT EXISTS `abt_hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `abt` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `abt_hospital`
--

INSERT INTO `abt_hospital` (`id`, `h_id`, `logo`, `pic`, `abt`, `st`) VALUES
(1, 'kims', '1.jpg', '1.jpg', 'KIMS mission of â€˜Care with Courtesy, Compassion and Competence, â€˜ is rooted deeply in the belief that if quality care is not delivered to each and every patient, then care has not been delivered at all.<br />\r\nKIMS has invested immensely in the area of quality and safe patient care. KIMS in 2006 successfully completed both National Accreditation Board for Hospitals (NABH) and Australian Council on Healthcare Standards International (ACHSI) accreditation thus becoming the first hospital in India with both National & International accreditations. KIMS laboratory is accredited by National Accreditation Board for Testing and Calibration of Laboratories (NABL) and the Blood Bank and Radiology accredited by NABH.<br />\r\nCurrently, the Group has 7 internationally accredited centres and 5 nationally accredited facilities in India.<br />\r\nThe key quality parameters that are regularly monitored at KIMS include antibiotic prophylaxis for elective surgeries, infection control statistics on SSI, BSI, UTI, VAP etc, patient falls, bed sores, thrombophlebitis, average waiting time for a patient, their â€œdoor-to-needleâ€ time, re â€“ admissions in a month after discharge and staff response time for emergencies on a daily basis. This round-the- clock monitoring of activities are recorded and documented, so that it can be used to benchmark, and ensure continuous improvement in our service standards.', 1),
(2, 'ah101', '2.jpg', '2.jpg', 'The leading tertiary care hospital in Asia. Ananthapuri Hospitals is the best in its field owing to its remarkable panel of eminent doctors. They include some of the most highly experienced, skilled and distinguished medical practitioners in the country. Combined with a state-of-the-art infrastructure, world class equipment and dedicated staff, Ananthapuri undoubtedly ushers a new world of health and healing in the capital city of Kerala.<br />\r\nAnanthapuri Hospitals & Research Institute has some of the most eminent doctors in the country â€“highly experienced, skilled and distinguished in their respective fields of expertise. Your healthcare needs are safe in their hands.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admit_doc_des`
--

CREATE TABLE IF NOT EXISTS `admit_doc_des` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admit_id` varchar(50) NOT NULL,
  `enq_id` varchar(50) NOT NULL,
  `bar_code` varchar(150) NOT NULL,
  `dr` date NOT NULL,
  `doc_des` text NOT NULL,
  `add_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admit_doc_des`
--

INSERT INTO `admit_doc_des` (`id`, `admit_id`, `enq_id`, `bar_code`, `dr`, `doc_des`, `add_by`) VALUES
(1, '1', '4', '6965010-12-101-415', '2016-11-16', 'good improvement is listed. continue with same medicine..', 'radhika@gmail.com'),
(2, '1', '4', '6965010-12-101-415', '2016-11-17', 'Very slow Improvement is monitored. become well soon.', 'radhika@gmail.com'),
(3, '1', '4', '6965010-12-101-415', '2016-11-18', 'great improvement', 'radhika@gmail.com'),
(4, '2', '6', '6965010-12-101-415', '2016-11-19', 'on observation', 'anantha_staf2@gmail.com'),
(5, '3', '20', '691601-50-25-267', '2017-01-11', 'need more rest', 'radhika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admit_entry`
--

CREATE TABLE IF NOT EXISTS `admit_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` varchar(200) NOT NULL,
  `doc_id` varchar(200) NOT NULL,
  `enq_num` varchar(50) NOT NULL,
  `bar_code` varchar(100) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admit_entry`
--

INSERT INTO `admit_entry` (`id`, `hid`, `doc_id`, `enq_num`, `bar_code`, `st`) VALUES
(1, 'kims', 'vl@gmail.com', '4', '6965010-12-101-415', 1),
(2, 'ah101', 'sudha101', '6', '6965010-12-101-415', 0),
(3, 'kims', 'oaj@gmaol.com', '20', '691601-50-25-267', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admit_medicine`
--

CREATE TABLE IF NOT EXISTS `admit_medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admit_id` varchar(50) NOT NULL,
  `enq_id` varchar(50) NOT NULL,
  `bar_code` varchar(100) NOT NULL,
  `dt` date NOT NULL,
  `mdcn` varchar(100) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `add_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admit_medicine`
--

INSERT INTO `admit_medicine` (`id`, `admit_id`, `enq_id`, `bar_code`, `dt`, `mdcn`, `descr`, `add_by`) VALUES
(1, '1', '4', '6965010-12-101-415', '2016-11-16', '1', '1-0-1', 'radhika@gmail.com'),
(2, '1', '4', '6965010-12-101-415', '2016-11-17', '6', '1-1-1', 'radhika@gmail.com'),
(3, '1', '4', '6965010-12-101-415', '2016-11-17', '7', '0-0-1', 'radhika@gmail.com'),
(4, '1', '4', '6965010-12-101-415', '2016-11-18', '4', '1-1-1', 'radhika@gmail.com'),
(5, '1', '4', '6965010-12-101-415', '2016-11-18', '6', '0-0-1', 'radhika@gmail.com'),
(6, '1', '4', '6965010-12-101-415', '2016-11-18', '7', '0-0-1', 'radhika@gmail.com'),
(7, '2', '6', '6965010-12-101-415', '2016-11-19', '3', '1-0-1', 'anantha_staf2@gmail.com'),
(8, '2', '6', '6965010-12-101-415', '2016-11-19', '7', '1-1-1', 'anantha_staf2@gmail.com'),
(9, '2', '6', '6965010-12-101-415', '2016-11-19', '6', '1-0-1', 'anantha_staf2@gmail.com'),
(10, '3', '20', '691601-50-25-267', '2017-01-11', '4', '1-1-1', 'radhika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admit_report`
--

CREATE TABLE IF NOT EXISTS `admit_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admit_id` varchar(50) NOT NULL,
  `enq_id` varchar(50) NOT NULL,
  `bar_code` varchar(150) NOT NULL,
  `dt` date NOT NULL,
  `tst_typ` varchar(50) NOT NULL,
  `rport` varchar(50) NOT NULL,
  `f_typ` varchar(10) NOT NULL,
  `add_by` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admit_report`
--

INSERT INTO `admit_report` (`id`, `admit_id`, `enq_id`, `bar_code`, `dt`, `tst_typ`, `rport`, `f_typ`, `add_by`) VALUES
(1, '1', '4', '6965010-12-101-415', '2016-11-18', '3', '1.PNG', '1', 'radhika@gmail.com'),
(2, '1', '4', '6965010-12-101-415', '2016-11-18', '4', '2.jpg', '1', 'radhika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` varchar(200) NOT NULL,
  `doc_id` varchar(200) NOT NULL,
  `bar_code` varchar(150) NOT NULL,
  `dt` date NOT NULL,
  `tokn` varchar(25) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `hid`, `doc_id`, `bar_code`, `dt`, `tokn`, `st`) VALUES
(1, 'kims', 'sp@gmail.com', '695101-12-123-947', '2016-12-04', '1', 0),
(2, 'kims', 'sp1@gmail.com', '695101-12-123-947', '2016-12-05', '1', 0),
(3, 'kims', 'sp@gmail.com', '6965010-12-101-415', '2016-12-06', '1', 0),
(4, 'kims', 'pj@gmail.com', '6965010-12-101-415', '2016-12-04', '1', 1),
(5, 'kims', 'pj@gmail.com', '695101-12-123-947', '2016-12-04', '2', 1),
(6, 'kims', 'sp@gmail.com', '695101-12-123-947', '2016-12-02', '1', 0),
(7, 'kims', 'vijay@gmail.com', '695101-12-123-947', '2016-12-19', '1', 0),
(8, 'kims', 'vijay@gmail.com', '695101-12-123-947', '2017-01-03', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cit_data`
--

CREATE TABLE IF NOT EXISTS `cit_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `did` varchar(10) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `vid` varchar(10) NOT NULL,
  `ward_num` varchar(50) NOT NULL,
  `hse_num` varchar(50) NOT NULL,
  `addr` text NOT NULL,
  `postal_pin` varchar(6) NOT NULL,
  `con` varchar(15) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `bgp` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `physic` varchar(25) NOT NULL,
  `physic_desc` text NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cit_data`
--

INSERT INTO `cit_data` (`id`, `nme`, `sid`, `did`, `tid`, `vid`, `ward_num`, `hse_num`, `addr`, `postal_pin`, `con`, `pic`, `bgp`, `dob`, `physic`, `physic_desc`, `bar_code`, `password`, `st`) VALUES
(1, 'Biju Kurup', '18', '280', '1', '1', '12', '101', 'Ushas\r\nPulimath Post\r\nKilimanoor', '695612', '99568548546', '695612-12-101-755.jpg', 'O+ve', '1985-10-13', 'Normal', 'Nil', '695612-12-101-755', 'O6Ptx71Gk', 0),
(2, 'Binu Kurup', '18', '280', '1', '1', '12', '101', 'Ushas<br />Pulimath Post<br />Kilimanoor', '695612', '9446563002', '695612-12-101-382.jpg', 'AB+ve', '1996-08-10', 'Normal', 'Nil', '695612-12-101-382', '5c9Le4BaX', 0),
(3, 'Shradha Vimal', '18', '280', '1', '1', '12', '102', 's s bhavan<br />\r\nVellayambalam<br />\r\nTrivandrum', '696501', '9446563002', '6965010-12-101-415.jpg', 'O+ve', '1995-10-27', 'Normal', '', '6965010-12-101-415', 'R5b7ycH5I', 0),
(4, 'Gouri V R', '18', '280', '1', '1', '12', '123', 'Gouri Bhavan<br />\r\nChirayinkeezhu<br />\r\nAttingal', '695101', '9465874521', '695101-12-123-947.jpg', 'O+ve', '1996-07-23', 'Normal', '', '695101-12-123-947', 'xT45ABy9a', 0),
(5, 'Akhil K Maniyan', '18', '280', '1', '1', '15', '100', 'Geetha Bhavan<br />\r\nPothencode<br />\r\nTrivandrum', '695584', '9544508649', '695584-15-100-537.jpg', 'AB+ve', '1995-06-05', 'Normal', '', '695584-15-100-537', 'Mb6O6c1sZ', 0),
(6, 'Sreeraj S Nair', '18', '280', '1', '1', '12', '101', 'Gokulam<br />\r\nRamachanvila<br />\r\nAttingal', '695101', '9809576772', '695101-12-101-142.jpg', 'O+ve', '1995-01-14', 'Normal', '', '695101-12-101-142', 'b8KWp1t9Q', 0),
(7, 'Jeniga.N', '31', '505', '15', '3', '19', '73/1', 'CSI Church Street<br />\r\nKattuputhoor<br />\r\nAlakiypandipuram Post', '629851', '9629201092', '629851-19-73/1-359.jpg', 'O+ve', '1995-04-20', '', '', '629851-19-73/1-359', '9ohU71DOg', 0),
(9, 'vimal', '31', '505', '15', '3', '15', '100', 'vimal bhavan<br />\r\nkulathoor', '695101', '9446563005', '695101-15-100-189.jpg', 'O+ve', '1996-06-04', 'Normal', '', '695101-15-100-189', 'zAP6w54Ur', 0),
(10, 'Keerthi B U', '18', '280', '1', '1', '5', '356', 'BK Nivas<br />\r\nOlippunada<br />\r\nNaruvamoodu<br />\r\nTrivandrum', '695528', '9895717296', '695528-5-356-886.jpg', 'O+ve', '1996-09-14', 'Normal', '', '695528-5-356-886', 'zPx9c82EJ', 0),
(11, 'Jazeena A', '18', '280', '1', '1', '50', '25', 'Thiruvathira<br />\r\nChonamchira<br />\r\nPerinadu PO', '691601', '9847072674', '691601-50-25-267.jpg', 'O+ve', '1995-12-23', 'Normal', '', '691601-50-25-267', 'm2F3S4Twb', 0),
(12, 'Saranya M S', '18', '280', '1', '1', '16', '102', 'Saranya thamalam<br />\r\nPoojappura<br />\r\ntrivandrum', '695012', '9447242195', '695012-16-102-056.jpg', 'O+ve', '1995-02-15', 'Normal', '', '695012-16-102-056', '2XFvoU6n5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `death_certificate`
--

CREATE TABLE IF NOT EXISTS `death_certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` varchar(100) NOT NULL,
  `stf_id` varchar(150) NOT NULL,
  `bar_code` varchar(100) NOT NULL,
  `dt` date NOT NULL,
  `rson` varchar(100) NOT NULL,
  `dses` varchar(100) NOT NULL,
  `trtmnt_by` varchar(150) NOT NULL,
  `durtion` varchar(100) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `death_certificate`
--

INSERT INTO `death_certificate` (`id`, `vid`, `stf_id`, `bar_code`, `dt`, `rson`, `dses`, `trtmnt_by`, `durtion`, `st`) VALUES
(1, '1', 'v101', '695612-12-101-382', '2016-12-15', '2', 'Allergy', 'kims', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_data`
--

CREATE TABLE IF NOT EXISTS `department_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nme` varchar(250) NOT NULL,
  `des` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `department_data`
--

INSERT INTO `department_data` (`id`, `dep_nme`, `des`, `st`) VALUES
(1, 'Cardiology', 'Cardiology is a branch of medicine dealing with disorders of the heart as well as parts of the circulatory system. The field includes medical diagnosis and treatment of congenital heart defects, coronary artery disease, heart failure, valvular heart disease and electrophysiology. Physicians who specialize in this field of medicine are called cardiologists, a specialty of internal medicine. Pediatric cardiologists are pediatricians who specialize in cardiology. Physicians who specialize in cardiac surgery are called cardiothoracic surgeons or cardiac surgeons, a specialty of general surgery.<br />\r\n<br />\r\nAlthough the cardiovascular system is inextricably linked to blood, cardiology is relatively unconcerned with hematology and its diseases. Some obvious exceptions that affect the function of the heart would be blood tests (electrolyte disturbances, troponins), decreased oxygen carrying capacity (anemia, hypovolemic shock), and coagulopathies.', 1),
(2, 'Ear nose and throat (ENT).', 'The ENT department provides care for patients with a variety of problems, including:<br />\r\n<br />\r\n1. general ear, nose and throat diseases<br />\r\n2. neck lumps<br />\r\n3. cancers of the head and neck area<br />\r\n4. tear duct problems<br />\r\n5. facial skin lesions<br />\r\n6. balance and hearing disorders<br />\r\n7. snoring and sleep apnoea<br />\r\n8. ENT allergy problems<br />\r\n9. salivary gland diseases<br />\r\n10. voice disorders.', 1),
(3, 'Haematology', 'Haematology services work closely with the hospital laboratory. These doctors treat blood diseases and malignancies linked to the blood, with both new referrals and emergency admissions being seen.', 1),
(4, 'Nephrology', 'This department monitors and assesses patients with kidney (renal) problems.<br />\r\n<br />\r\nNephrologists (kidney specialists) will liaise with the transplant team in cases of kidney transplants.<br />\r\n<br />\r\nThey also supervise the dialysis day unit for people who are waiting for a kidney transplant or who are unable to have a transplant for any reason.', 1),
(5, 'Neurology', 'This unit deals with disorders of the nervous system, including the brain and spinal cord. It''s run by doctors who specialise in this area (neurologists) and their staff.<br />\r\n<br />\r\nThere are also paediatric neurologists who treat children. Neurologists may also be involved in clinical research and clinical trials.<br />\r\n<br />\r\nSpecialist nurses (epilepsy, multiple sclerosis) liaise with patients, consultants and GPs to help with any problems that may occur between outpatient appointments.', 1),
(6, 'General Medicine', 'general medicine (in Commonwealth nations) is the medical specialty dealing with the prevention, diagnosis, and treatment of adult diseases. Physicians specializing in internal medicine are called internists, or physicians (without a modifier) in Commonwealth nations.', 1),
(7, 'Respiratory Medicine', 'Respiratory Medicine offers clinical and research-oriented resources for pulmonologists and other practitioners and researchers interested in respiratory care.', 1),
(8, 'Endocrinology', 'the branch of physiology and medicine concerned with endocrine glands and hormones.', 1),
(9, 'OR-THO', 'The medical specialty concerned with correction of deformities or functional impairments of the skeletal system', 1),
(10, 'Paediatrics', 'Pediatrics (also spelled paediatrics or pÃ¦diatrics) is the branch of medicine that deals with the medical care of infants, children, and adolescents, and the age limit usually ranges from birth up to 18 years of age (in some places until completion of secondary education, and until age 21 in the United States).', 1),
(11, 'Ophthalmology', 'The branch of medicine concerned with the study and treatment of disorders and diseases of the eye.', 1),
(12, 'Gynaecology', 'The branch of physiology and medicine which deals with the functions and diseases specific to women and girls, especially those affecting the reproductive system.', 1),
(13, 'Dental', 'Branch of medicine relating to the teeth.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disease_data`
--

CREATE TABLE IF NOT EXISTS `disease_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(100) NOT NULL,
  `deseas` varchar(250) NOT NULL,
  `descr` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `disease_data`
--

INSERT INTO `disease_data` (`id`, `dep`, `deseas`, `descr`, `st`) VALUES
(1, '1', 'Heart attack', 'A heart attack (myocardial infarction) occurs when the heartâ€™s supply of blood is stopped.  A heart attack need not be fatal, especially if you receive medical attention and treatment to deal with the blockage soon after you have your heart attack.  But you are likely to be left with a damaged heart post heart attack.<br />\r\n<br />\r\nA heart attack manifests as severe central chest pain, which may also radiate to the left arm, shoulder or jaw. Severe shortness of breath, sweating and feeling faint are common additional symptoms.<br />\r\n<br />\r\nIf you are a woman, however, your experience of heart attack may differ. Rather than acute chest pain you may have difficulty breathing, be very, very tired and have pain in your shoulder, jaw, or upper back pain.', 1),
(2, '1', 'Aneurysm', 'A balloon-like bulge in an artery. If a bulge stretches the artery too far, the vessel can burst. Aneurysms can form in arteries of all sizes, but the most serious are those that affect the large blood vessel that carries blood from the heart to other parts of the body (the aorta), the heartâ€™s pumping chamber (ventricle), and arteries that supply blood to the brain. ', 1),
(3, '1', 'Angina', ' A type of chest discomfort caused by inadequate blood flow to the heart. It may be experienced as tightness, heavy pressure, squeezing pain, or crushing chest pain. The most common cause of angina is coronary artery disease, narrowing or blockage of the arteries that supply blood to the heart.', 1),
(4, '1', 'Arrhythmia', 'Any disorder of heart rate or rhythm. Examples of arrhythmias are tachycardia (faster-than-normal heartbeat) and bradycardia (slower-than-normal heartbeat).', 1),
(5, '1', 'Atherosclerosis', 'The buildup of fatty deposits (plaques) in the arteries. The narrowing and stiffening of arteries due to plaque buildup can interfere with blood flow, causing pain in oxygen-starved organs. If a plaque in a coronary artery ruptures, it can cause heart attack or stroke.', 1),
(6, '1', 'Atrial fibrillation', ' A heart rhythm disorder in which the upper chambers of the heart (atria) contract rapidly and in a disorganized manner. Atrial fibrillation increases the risk of blood clots that can block the flow of blood to the brain, lungs, or other organs.', 1),
(7, '1', 'Bradycardia', 'An abnormally slow heart rate. Bradycardia may have no symptoms or may cause heart palpitations, shortness of breath, fatigue, and fainting.', 1),
(8, '1', 'Cardiomyopathy', 'A disease of the heart muscle in which the muscle tone is damaged and the heartâ€™s ability to pump blood is impaired. The most common type is dilated cardiomyopathy, in which one or more of the heartâ€™s chambers is enlarged and its pumping becomes less forceful. Other types include hypertrophic cardiomyopathy, in which the walls of the heart muscle thicken, and restrictive cardiomyopathy, in which the heart muscle becomes more rigid.', 1),
(9, '1', 'Chest pain', 'Discomfort or pain along the front of the body between the neck and upper abdomen. Chest pain may be a symptom of a heart attack or coronary artery disease, but it may also occur due to asthma, pneumonia, muscle strain, anxiety, or digestive problems (e.g., heartburn, ulcers, or gallstones).', 1),
(10, '1', 'Claudication', 'Claudication is pain in the calf or thigh muscle that occurs with exercise and is relieved by rest. The pain is caused by poor blood flow due to narrowing or blockages affecting the arteries that carry blood to the legs. Claudication is the most common symptom in people who have peripheral artery disease.', 1),
(11, '1', 'Congestive heart failure', 'A condition in which the heart is weak and has lost some ability to pump blood. Symptoms include shortness of breath, persistent coughing or wheezing, fatigue, and swelling in the feet, ankles, legs, or abdomen. ', 1),
(12, '1', 'Coronary artery disease (CAD)', 'Narrowing and hardening of the arteries that supply blood to the heart due to the buildup of plaque in the artery wall. CAD is the most common type of heart disease. The reduced blood flow to the heart can cause angina (chest pain) and heart attack and can contribute to heart failure and arrhythmias.', 1),
(13, '1', 'Heart murmur', 'A rasping, whooshing, or blowing sound produced by turbulent blood flow through the heart valves or near the heart. Murmurs are most often caused by defective heart valves. <br />\r\n', 1),
(14, '1', 'High cholesterol', 'A total cholesterol level above 240 mg/dL is considered high cholesterol. Total cholesterol between 200 and 239 is considered borderline high. High cholesterol increases your risk of heart disease. Diet and medication can bring down cholesterol levels and reduce heart disease risk.', 1),
(15, '1', 'Hypertension (high blood pressure)', 'Normal blood pressure is below 120/80 mm Hg. Blood pressure of 120 to 139 systolic (the top number in a reading) or 80 to 89 diastolic (the bottom number) is considered prehypertension. Blood pressure above 139 mm Hg systolic or above 89 mm Hg diastolic is considered high blood pressure. High blood pressure increases the risk of heart attack, stroke, and kidney disease. ', 1),
(16, '1', 'Peripheral artery disease (PAD)', ' Peripheral artery disease is atherosclerosis (narrowing or blockage of arteries due to the buildup of fatty deposits) affecting the arteries that supply blood to the legs and feet.', 1),
(17, '1', 'Congenital heart disease', 'Abnormalities in the heartâ€™s structure and function that are caused by disordered or abnormal heart development before birth. While some abnormalities never cause any problems, many of these defects need to be followed carefully and require treatment (medication or surgery). The most common congenital heart defect is a ventricular septal defect, a hole in the wall that separates the left and right ventricles of the heart.', 1),
(18, '1', 'Syncope (fainting)', 'A temporary loss of consciousness due to a drop in blood flow to the brain. The episode is brief and is followed by a rapid and complete recovery. Syncope may be caused by a sudden drop in blood pressure, extreme emotional states, severe pain, certain medications, abnormal heart rhythms, or other reasons.', 1),
(19, '2', 'Tonsillitis', 'When the tonsils become inflamed for long periods of time, they may have to be surgically removed; this procedure is called a "tonsillectomy." Though tonsillitis used to be treated with tonsillectomy frequently, it is no longer the practice and is now only done in specific instances.', 1),
(20, '2', 'Ear Infections', 'Ear infections occur when germs enter the ear and become trapped there. Symptoms of ear infections include:<br />\r\npain<br />\r\nhearing loss<br />\r\nbalance problems<br />\r\nrecent upper respiratory infections<br />\r\ndrainage from the ear (perforation of the tympanic membrane)', 1),
(21, '2', 'Sinus Infections', 'Sinuses are cavities in the skull that surround the eyes and nose and are responsible for vocal resonance. Sinusitis occurs when these cavities become infected by a bacteria or virus. Symptoms of sinusitis include:<br />\r\n<br />\r\n<br />\r\ndifficulty breathing<br />\r\nheadache<br />\r\nrunny nose<br />\r\nsneezing and coughing<br />\r\nbad breath<br />\r\npain around the eyes or across the bridge of the nose<br />\r\ntoothaches', 1),
(22, '2', 'Sleep Apnea', 'Sleep apnea is a brief cessation of breathing while asleep. It can occur in both adults and children. Common causes of sleep apnea include:<br />\r\n<br />\r\nbeing overweight<br />\r\nenlarged tonsils or other structures in the nose and throat<br />\r\nhaving a naturally shorter airway than usual<br />\r\nSymptoms of sleep apnea include:<br />\r\n<br />\r\nsnoring<br />\r\nwitnessed episodes of snoring and gasping during sleep<br />\r\nwaking up feeling unrested<br />\r\nheadaches<br />\r\nfatigue<br />\r\ndepression<br />\r\nwaking up with a very dry or sore throat<br />\r\nwaking up several times during the night', 1),
(23, '6', 'Fever', 'An abnormally high body temperature, usually accompanied by shivering, headache, and in severe instances, delirium.', 1),
(24, '6', 'Chronic Cough', 'A chronic cough is a cough that lasts eight weeks or longer in adults, or four weeks in children. A chronic cough is more than just an annoyance. A chronic cough can interrupt your sleep and leave you feeling exhausted. Severe cases of chronic cough can cause vomiting, lightheadedness and even rib fractures.', 1),
(25, '6', 'Cold', 'A common infection in which the mucous membrane of the nose and throat becomes inflamed, typically causing running at the nose, sneezing, and a sore throat.', 1),
(26, '6', 'Allergy', 'A condition in which the immune system reacts abnormally to a foreign substance.', 1),
(27, '6', 'Pain', 'Pain is a feeling triggered in the nervous system. You may feel it as a prick, tingle, sting, burn, or ache. Read about the causes and what can help.', 1),
(28, '5', 'Epilepsy', 'Epilepsy is a group of neurological disorders characterized by epileptic seizures. Epileptic seizures are episodes that can vary from brief and nearly undetectable to long periods of vigorous shaking. In epilepsy, seizures tend to recur, and have no immediate underlying cause while seizures that occur due to a specific cause are not deemed to represent epilepsy. The cause of most cases of epilepsy is unknown, although some people develop epilepsy as the result of brain injury, stroke, brain tumor, and drug and alcohol misuse.', 1),
(31, '5', 'Multiple Sclerosis', 'Multiple sclerosis (MS), also known as disseminated sclerosis or encephalomyelitis disseminata, is an inflammatory disease in which the insulating covers of nerve cells in the brain and spinal cord are damaged. MS is a disease in which your immune system attacks the protective sheath (myelin) that covers your nerves. Myelin damage disrupts communication between your brain and the rest of your body. Ultimately, the nerves themselves may deteriorate, a process that''s currently irreversible.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `DistCode` int(11) NOT NULL AUTO_INCREMENT,
  `StCode` int(11) DEFAULT NULL,
  `DistrictName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`DistCode`),
  KEY `StCode` (`StCode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=651 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistCode`, `StCode`, `DistrictName`) VALUES
(1, 1, 'North and Middle Andama'),
(2, 1, 'South Andama'),
(3, 1, 'Nicobar'),
(4, 2, 'Anantapur'),
(5, 2, 'Chittoor'),
(6, 2, 'East Godavari'),
(7, 2, 'Guntur'),
(8, 2, 'Krishna'),
(9, 2, 'Kurnool'),
(10, 2, 'Prakasam'),
(11, 2, 'Srikakulam'),
(12, 2, 'Sri Potti Sri Ramulu Nellore'),
(13, 2, 'Vishakhapatnam'),
(14, 2, 'Vizianagaram'),
(15, 2, 'West Godavari'),
(16, 2, 'Cudappah'),
(17, 3, 'Anjaw'),
(18, 3, 'Changlang'),
(19, 3, 'East Siang'),
(20, 3, 'East Kameng'),
(21, 3, 'Kurung Kumey'),
(22, 3, 'Lohit'),
(23, 3, 'Lower Dibang Valley'),
(24, 3, 'Lower Subansiri'),
(25, 3, 'Papum Pare'),
(26, 3, 'Tawang'),
(27, 3, 'Tirap'),
(28, 3, 'Dibang Valley'),
(29, 3, 'Upper Siang'),
(30, 3, 'Upper Subansiri'),
(31, 3, 'West Kameng'),
(32, 3, 'West Siang'),
(33, 4, 'Baksa'),
(34, 4, 'Barpeta'),
(35, 4, 'Bongaigao'),
(36, 4, 'Cachar'),
(37, 4, 'Chirang'),
(38, 4, 'Darrang'),
(39, 4, 'Dhemaji'),
(40, 4, 'Dima Hasao'),
(41, 4, 'Dhubri'),
(42, 4, 'Dibrugarh'),
(43, 4, 'Goalpara'),
(44, 4, 'Golaghat'),
(45, 4, 'Hailakandi'),
(46, 4, 'Jorhat'),
(47, 4, 'Kamrup'),
(48, 4, 'Kamrup Metropolita'),
(49, 4, 'Karbi Anglong'),
(50, 4, 'Karimganj'),
(51, 4, 'Kokrajhar'),
(52, 4, 'Lakhimpur'),
(53, 4, 'Morigao'),
(54, 4, 'Nagao'),
(55, 4, 'Nalbari'),
(56, 4, 'Sivasagar'),
(57, 4, 'Sonitpur'),
(58, 4, 'Tinsukia'),
(59, 4, 'Udalguri'),
(60, 5, 'Araria'),
(61, 5, 'Arwal'),
(62, 5, 'Aurangabad'),
(63, 5, 'Banka'),
(64, 5, 'Begusarai'),
(65, 5, 'Bhagalpur'),
(66, 5, 'Bhojpur'),
(67, 5, 'Buxar'),
(68, 5, 'Darbhanga'),
(69, 5, 'East Champara'),
(70, 5, 'Gaya'),
(71, 5, 'Gopalganj'),
(72, 5, 'Jamui'),
(73, 5, 'Jehanabad'),
(74, 5, 'Kaimur'),
(75, 5, 'Katihar'),
(76, 5, 'Khagaria'),
(77, 5, 'Kishanganj'),
(78, 5, 'Lakhisarai'),
(79, 5, 'Madhepura'),
(80, 5, 'Madhubani'),
(81, 5, 'Munger'),
(82, 5, 'Muzaffarpur'),
(83, 5, 'Nalanda'),
(84, 5, 'Nawada'),
(85, 5, 'Patna'),
(86, 5, 'Purnia'),
(87, 5, 'Rohtas'),
(88, 5, 'Saharsa'),
(89, 5, 'Samastipur'),
(90, 5, 'Sara'),
(91, 5, 'Sheikhpura'),
(92, 5, 'Sheohar'),
(93, 5, 'Sitamarhi'),
(94, 5, 'Siwa'),
(95, 5, 'Supaul'),
(96, 5, 'Vaishali'),
(97, 5, 'West Champara'),
(98, 6, 'Chandigarh'),
(99, 7, 'Bastar'),
(100, 7, 'Bijapur'),
(101, 7, 'Bilaspur'),
(102, 7, 'Dantewada'),
(103, 7, 'Dhamtari'),
(104, 7, 'Durg'),
(105, 7, 'Jashpur'),
(106, 7, 'Janjgir-Champa'),
(107, 7, 'Korba'),
(108, 7, 'Koriya'),
(109, 7, 'Kanker'),
(110, 7, 'Kabirdham (formerly Kawardha);'),
(111, 7, 'Mahasamund'),
(112, 7, 'Narayanpur'),
(113, 7, 'Raigarh'),
(114, 7, 'Rajnandgao'),
(115, 7, 'Raipur'),
(116, 7, 'Surajpur'),
(117, 8, 'Dadra and Nagar Haveli'),
(118, 9, 'Dama'),
(119, 9, 'Diu'),
(120, 10, 'Central Delhi'),
(121, 10, 'East Delhi'),
(122, 10, 'New Delhi'),
(123, 10, 'North Delhi'),
(124, 10, 'North East Delhi'),
(125, 10, 'North West Delhi'),
(126, 10, 'South Delhi'),
(127, 10, 'South West Delhi'),
(128, 10, 'West Delhi'),
(129, 11, 'North Goa'),
(130, 11, 'South Goa'),
(131, 12, 'Ahmedabad'),
(132, 12, 'Amreli'),
(133, 12, 'Anand'),
(134, 12, 'Aravalli'),
(135, 12, 'Banaskantha'),
(136, 12, 'Bharuch'),
(137, 12, 'Bhavnagar'),
(138, 12, 'Dahod'),
(139, 12, 'Dang'),
(140, 12, 'Gandhinagar'),
(141, 12, 'Jamnagar'),
(142, 12, 'Junagadh'),
(143, 12, 'Kutch'),
(144, 12, 'Kheda'),
(145, 12, 'Mehsana'),
(146, 12, 'Narmada'),
(147, 12, 'Navsari'),
(148, 12, 'Pata'),
(149, 12, 'Panchmahal'),
(150, 12, 'Porbandar'),
(151, 12, 'Rajkot'),
(152, 12, 'Sabarkantha'),
(153, 12, 'Surendranagar'),
(154, 12, 'Surat'),
(155, 12, 'Tapi'),
(156, 12, 'Vadodara'),
(157, 12, 'Valsad'),
(158, 13, 'Ambala'),
(159, 13, 'Bhiwani'),
(160, 13, 'Faridabad'),
(161, 13, 'Fatehabad'),
(162, 13, 'Gurgao'),
(163, 13, 'Hissar'),
(164, 13, 'Jhajjar'),
(165, 13, 'Jind'),
(166, 13, 'Karnal'),
(167, 13, 'Kaithal'),
(168, 13, 'Kurukshetra'),
(169, 13, 'Mahendragarh'),
(170, 13, 'Mewat'),
(171, 13, 'Palwal'),
(172, 13, 'Panchkula'),
(173, 13, 'Panipat'),
(174, 13, 'Rewari'),
(175, 13, 'Rohtak'),
(176, 13, 'Sirsa'),
(177, 13, 'Sonipat'),
(178, 13, 'Yamuna Nagar'),
(179, 14, 'Bilaspur'),
(180, 14, 'Chamba'),
(181, 14, 'Hamirpur'),
(182, 14, 'Kangra'),
(183, 14, 'Kinnaur'),
(184, 14, 'Kullu'),
(185, 14, 'Lahaul and Spiti'),
(186, 14, 'Mandi'),
(187, 14, 'Shimla'),
(188, 14, 'Sirmaur'),
(189, 14, 'Sola'),
(190, 14, 'Una'),
(191, 15, 'Anantnag'),
(192, 15, 'Badgam'),
(193, 15, 'Bandipora'),
(194, 15, 'Baramulla'),
(195, 15, 'Doda'),
(196, 15, 'Ganderbal'),
(197, 15, 'Jammu'),
(198, 15, 'Kargil'),
(199, 15, 'Kathua'),
(200, 15, 'Kishtwar'),
(202, 15, 'Kupwara'),
(203, 15, 'Kulgam'),
(204, 15, 'Leh'),
(205, 15, 'Poonch'),
(206, 15, 'Pulwama'),
(207, 15, 'Rajouri'),
(208, 15, 'Ramba'),
(209, 15, 'Reasi'),
(210, 15, 'Samba'),
(211, 15, 'Shopia'),
(212, 15, 'Srinagar'),
(213, 15, 'Udhampur'),
(214, 16, 'Bokaro'),
(215, 16, 'Chatra'),
(216, 16, 'Deoghar'),
(217, 16, 'Dhanbad'),
(218, 16, 'Dumka'),
(219, 16, 'East Singhbhum'),
(220, 16, 'Garhwa'),
(221, 16, 'Giridih'),
(222, 16, 'Godda'),
(223, 16, 'Gumla'),
(224, 16, 'Hazaribag'),
(225, 16, 'Jamtara'),
(226, 16, 'Khunti'),
(227, 16, 'Koderma'),
(228, 16, 'Latehar'),
(229, 16, 'Lohardaga'),
(230, 16, 'Pakur'),
(231, 16, 'Palamu'),
(232, 16, 'Ramgarh'),
(233, 16, 'Ranchi'),
(234, 16, 'Sahibganj'),
(235, 16, 'Seraikela Kharsawa'),
(236, 16, 'Simdega'),
(237, 16, 'West Singhbhum'),
(238, 17, 'Bagalkot'),
(239, 17, 'Bangalore Rural'),
(240, 17, 'Bangalore Urba'),
(241, 17, 'Belgaum'),
(242, 17, 'Bellary'),
(243, 17, 'Bidar'),
(244, 17, 'Bijapur'),
(245, 17, 'Chamarajnagar'),
(246, 17, 'Chikkamagaluru'),
(247, 17, 'Chikkaballapur'),
(248, 17, 'Chitradurga'),
(249, 17, 'Davanagere'),
(250, 17, 'Dharwad'),
(251, 17, 'Dakshina Kannada'),
(252, 17, 'Gadag'),
(253, 17, 'Gulbarga'),
(254, 17, 'Hassa'),
(255, 17, 'Haveri'),
(256, 17, 'Kodagu'),
(257, 17, 'Kolar'),
(258, 17, 'Koppal'),
(259, 17, 'Mandya'),
(260, 17, 'Mysore'),
(261, 17, 'Raichur'),
(262, 17, 'Shimoga'),
(263, 17, 'Tumkur'),
(264, 17, 'Udupi'),
(265, 17, 'Uttara Kannada'),
(266, 17, 'Ramanagara'),
(267, 17, 'Yadgir'),
(268, 18, 'Alappuzha'),
(269, 18, 'Ernakulam'),
(270, 18, 'Idukki'),
(271, 18, 'Kannur'),
(272, 18, 'Kasaragod'),
(273, 18, 'Kollam'),
(274, 18, 'Kottayam'),
(275, 18, 'Kozhikode'),
(276, 18, 'Malappuram'),
(277, 18, 'Palakkad'),
(278, 18, 'Pathanamthitta'),
(279, 18, 'Thrissur'),
(280, 18, 'Thiruvananthapuram'),
(281, 18, 'Wayanad'),
(282, 19, 'Lakshadweep'),
(283, 20, 'Agar'),
(284, 20, 'Alirajpur'),
(285, 20, 'Anuppur'),
(286, 20, 'Ashok Nagar'),
(287, 20, 'Balaghat'),
(288, 20, 'Barwani'),
(289, 20, 'Betul'),
(290, 20, 'Bhind'),
(291, 20, 'Bhopal'),
(292, 20, 'Burhanpur'),
(293, 20, 'Chhatarpur'),
(294, 20, 'Chhindwara'),
(295, 20, 'Damoh'),
(296, 20, 'Datia'),
(297, 20, 'Dewas'),
(298, 20, 'Dhar'),
(299, 20, 'Dindori'),
(300, 20, 'Guna'),
(301, 20, 'Gwalior'),
(302, 20, 'Harda'),
(303, 20, 'Hoshangabad'),
(304, 20, 'Indore'),
(305, 20, 'Jabalpur'),
(306, 20, 'Jhabua'),
(307, 20, 'Katni'),
(308, 20, 'Khandwa (East Nimar);'),
(309, 20, 'Khargone (West Nimar);'),
(310, 20, 'Mandla'),
(311, 20, 'Mandsaur'),
(312, 20, 'Morena'),
(313, 20, 'Narsinghpur'),
(314, 20, 'Neemuch'),
(315, 20, 'Panna'),
(316, 20, 'Raise'),
(317, 20, 'Rajgarh'),
(318, 20, 'Ratlam'),
(319, 20, 'Rewa'),
(320, 20, 'Sagar'),
(321, 20, 'Satna'),
(322, 20, 'Sehore'),
(323, 20, 'Seoni'),
(324, 20, 'Shahdol'),
(325, 20, 'Shajapur'),
(326, 20, 'Sheopur'),
(327, 20, 'Shivpuri'),
(328, 20, 'Sidhi'),
(329, 20, 'Singrauli'),
(330, 20, 'Tikamgarh'),
(331, 20, 'Ujjai'),
(332, 20, 'Umaria'),
(333, 20, 'Vidisha'),
(334, 21, 'Ahmednagar'),
(335, 21, 'Akola'),
(336, 21, 'Amravati'),
(337, 21, 'Aurangabad'),
(338, 21, 'Beed'),
(339, 21, 'Bhandara'),
(340, 21, 'Buldhana'),
(341, 21, 'Chandrapur'),
(342, 21, 'Dhule'),
(343, 21, 'Gadchiroli'),
(344, 21, 'Gondia'),
(345, 21, 'Hingoli'),
(346, 21, 'Jalgao'),
(347, 21, 'Jalna'),
(348, 21, 'Kolhapur'),
(349, 21, 'Latur'),
(350, 21, 'Mumbai City'),
(351, 21, 'Mumbai suburba'),
(352, 21, 'Nanded'),
(353, 21, 'Nandurbar'),
(354, 21, 'Nagpur'),
(355, 21, 'Nashik'),
(356, 21, 'Osmanabad'),
(357, 21, 'Parbhani'),
(358, 21, 'Pune'),
(359, 21, 'Raigad'),
(360, 21, 'Ratnagiri'),
(361, 21, 'Sangli'),
(362, 21, 'Satara'),
(363, 21, 'Sindhudurg'),
(364, 21, 'Solapur'),
(365, 21, 'Thane'),
(366, 21, 'Wardha'),
(367, 21, 'Washim'),
(368, 21, 'Yavatmal'),
(369, 22, 'Bishnupur'),
(370, 22, 'Churachandpur'),
(371, 22, 'Chandel'),
(372, 22, 'Imphal East'),
(373, 22, 'Senapati'),
(374, 22, 'Tamenglong'),
(375, 22, 'Thoubal'),
(376, 22, 'Ukhrul'),
(377, 22, 'Imphal West'),
(378, 23, 'East Garo Hills'),
(379, 23, 'East Khasi Hills'),
(380, 23, 'Jaintia Hills'),
(381, 23, 'Ri Bhoi'),
(382, 23, 'South Garo Hills'),
(383, 23, 'West Garo Hills'),
(384, 23, 'West Khasi Hills'),
(385, 24, 'Aizawl'),
(386, 24, 'Champhai'),
(387, 24, 'Kolasib'),
(388, 24, 'Lawngtlai'),
(389, 24, 'Lunglei'),
(390, 24, 'Mamit'),
(391, 24, 'Saiha'),
(392, 24, 'Serchhip'),
(393, 25, 'Dimapur'),
(394, 25, 'Kiphire'),
(395, 25, 'Kohima'),
(396, 25, 'Longleng'),
(397, 25, 'Mokokchung'),
(398, 25, 'Mo'),
(399, 25, 'Pere'),
(400, 25, 'Phek'),
(401, 25, 'Tuensang'),
(402, 25, 'Wokha'),
(403, 25, 'Zunheboto'),
(404, 26, 'Angul'),
(405, 26, 'Boudh (Bauda);'),
(406, 26, 'Bhadrak'),
(407, 26, 'Balangir'),
(408, 26, 'Bargarh (Baragarh);'),
(409, 26, 'Balasore'),
(410, 26, 'Cuttack'),
(411, 26, 'Debagarh (Deogarh);'),
(412, 26, 'Dhenkanal'),
(413, 26, 'Ganjam'),
(414, 26, 'Gajapati'),
(415, 26, 'Jharsuguda'),
(416, 26, 'Jajpur'),
(417, 26, 'Jagatsinghpur'),
(418, 26, 'Khordha'),
(419, 26, 'Kendujhar (Keonjhar);'),
(420, 26, 'Kalahandi'),
(421, 26, 'Kandhamal'),
(422, 26, 'Koraput'),
(423, 26, 'Kendrapara'),
(424, 26, 'Malkangiri'),
(425, 26, 'Mayurbhanj'),
(426, 26, 'Nabarangpur'),
(427, 26, 'Nuapada'),
(428, 26, 'Nayagarh'),
(429, 26, 'Puri'),
(430, 26, 'Rayagada'),
(431, 26, 'Sambalpur'),
(432, 26, 'Subarnapur (Sonepur);'),
(433, 26, 'Sundergarh'),
(434, 27, 'Karaikal'),
(435, 27, 'Mahe'),
(436, 27, 'Pondicherry'),
(437, 27, 'Yanam'),
(438, 28, 'Amritsar'),
(439, 28, 'Barnala'),
(440, 28, 'Bathinda'),
(441, 28, 'Firozpur'),
(442, 28, 'Faridkot'),
(443, 28, 'Fatehgarh Sahib'),
(444, 28, 'Fazilka'),
(445, 28, 'Gurdaspur'),
(446, 28, 'Hoshiarpur'),
(447, 28, 'Jalandhar'),
(448, 28, 'Kapurthala'),
(449, 28, 'Ludhiana'),
(450, 28, 'Mansa'),
(451, 28, 'Moga'),
(452, 28, 'Sri Muktsar Sahib'),
(453, 28, 'Pathankot'),
(454, 28, 'Patiala'),
(455, 28, 'Rupnagar'),
(456, 28, 'Ajitgarh (Mohali);'),
(457, 28, 'Sangrur'),
(458, 28, 'Shahid Bhagat Singh Nagar'),
(459, 28, 'Tarn Tara'),
(460, 29, 'Ajmer'),
(461, 29, 'Alwar'),
(462, 29, 'Bikaner'),
(463, 29, 'Barmer'),
(464, 29, 'Banswara'),
(465, 29, 'Bharatpur'),
(466, 29, 'Bara'),
(467, 29, 'Bundi'),
(468, 29, 'Bhilwara'),
(469, 29, 'Churu'),
(470, 29, 'Chittorgarh'),
(471, 29, 'Dausa'),
(472, 29, 'Dholpur'),
(473, 29, 'Dungapur'),
(474, 29, 'Ganganagar'),
(475, 29, 'Hanumangarh'),
(476, 29, 'Jhunjhunu'),
(477, 29, 'Jalore'),
(478, 29, 'Jodhpur'),
(479, 29, 'Jaipur'),
(480, 29, 'Jaisalmer'),
(481, 29, 'Jhalawar'),
(482, 29, 'Karauli'),
(483, 29, 'Kota'),
(484, 29, 'Nagaur'),
(485, 29, 'Pali'),
(486, 29, 'Pratapgarh'),
(487, 29, 'Rajsamand'),
(488, 29, 'Sikar'),
(489, 29, 'Sawai Madhopur'),
(490, 29, 'Sirohi'),
(491, 29, 'Tonk'),
(492, 29, 'Udaipur'),
(493, 30, 'East Sikkim'),
(494, 30, 'North Sikkim'),
(495, 30, 'South Sikkim'),
(496, 30, 'West Sikkim'),
(497, 31, 'Ariyalur'),
(498, 31, 'Chennai'),
(499, 31, 'Coimbatore'),
(500, 31, 'Cuddalore'),
(501, 31, 'Dharmapuri'),
(502, 31, 'Dindigul'),
(503, 31, 'Erode'),
(504, 31, 'Kanchipuram'),
(505, 31, 'Kanyakumari'),
(506, 31, 'Karur'),
(507, 31, 'Krishnagiri'),
(508, 31, 'Madurai'),
(509, 31, 'Nagapattinam'),
(510, 31, 'Nilgiris'),
(511, 31, 'Namakkal'),
(512, 31, 'Perambalur'),
(513, 31, 'Pudukkottai'),
(514, 31, 'Ramanathapuram'),
(515, 31, 'Salem'),
(516, 31, 'Sivaganga'),
(517, 31, 'Tirupur'),
(518, 31, 'Tiruchirappalli'),
(519, 31, 'Theni'),
(520, 31, 'Tirunelveli'),
(521, 31, 'Thanjavur'),
(522, 31, 'Thoothukudi'),
(523, 31, 'Tiruvallur'),
(524, 31, 'Tiruvarur'),
(525, 31, 'Tiruvannamalai'),
(526, 31, 'Vellore'),
(527, 31, 'Viluppuram'),
(528, 31, 'Virudhunagar'),
(529, 32, 'Adilabad'),
(530, 32, 'Hyderabad'),
(531, 32, 'Karimnagar'),
(532, 32, 'Khammam'),
(533, 32, 'Mahbubnagar'),
(534, 32, 'Medak'),
(535, 32, 'Nalgonda'),
(536, 32, 'Nizamabad'),
(537, 32, 'Ranga Reddy'),
(538, 32, 'Warangal'),
(539, 33, 'Dhalai'),
(540, 33, 'North Tripura'),
(541, 33, 'South Tripura'),
(542, 33, 'Khowai'),
(543, 33, 'West Tripura'),
(544, 35, 'Agra'),
(545, 35, 'Aligarh'),
(546, 35, 'Allahabad'),
(547, 35, 'Ambedkar Nagar'),
(548, 35, 'Auraiya'),
(549, 35, 'Azamgarh'),
(550, 35, 'Bagpat'),
(551, 35, 'Bahraich'),
(552, 35, 'Ballia'),
(553, 35, 'Balrampur'),
(554, 35, 'Banda'),
(555, 35, 'Barabanki'),
(556, 35, 'Bareilly'),
(557, 35, 'Basti'),
(558, 35, 'Bijnor'),
(559, 35, 'Budau'),
(560, 35, 'Bulandshahr'),
(561, 35, 'Chandauli'),
(562, 35, 'Amethi (Chhatrapati Shahuji Maharaj Nagar)'),
(563, 35, 'Chitrakoot'),
(564, 35, 'Deoria'),
(565, 35, 'Etah'),
(566, 35, 'Etawah'),
(567, 35, 'Faizabad'),
(568, 35, 'Farrukhabad'),
(569, 35, 'Fatehpur'),
(570, 35, 'Firozabad'),
(571, 35, 'Gautam Buddh Nagar'),
(572, 35, 'Ghaziabad'),
(573, 35, 'Ghazipur'),
(574, 35, 'Gonda'),
(575, 35, 'Gorakhpur'),
(576, 35, 'Hamirpur'),
(577, 35, 'Hardoi'),
(578, 35, 'Hathras (Mahamaya Nagar);'),
(579, 35, 'Jalau'),
(580, 35, 'Jaunpur'),
(581, 35, 'Jhansi'),
(582, 35, 'Jyotiba Phule Nagar'),
(583, 35, 'Kannauj'),
(584, 35, 'Kanpur Dehat (Ramabai Nagar);'),
(585, 35, 'Kanpur Nagar'),
(586, 35, 'Kanshi Ram Nagar'),
(587, 35, 'Kaushambi'),
(588, 35, 'Kushinagar'),
(589, 35, 'Lakhimpur Kheri'),
(590, 35, 'Lalitpur'),
(591, 35, 'Lucknow'),
(592, 35, 'Maharajganj'),
(593, 35, 'Mahoba'),
(594, 35, 'Mainpuri'),
(595, 35, 'Mathura'),
(596, 35, 'Mau'),
(597, 35, 'Meerut'),
(598, 35, 'Mirzapur'),
(599, 35, 'Moradabad'),
(600, 35, 'Muzaffarnagar'),
(601, 35, 'Panchsheel Nagar (Hapur);'),
(602, 35, 'Pilibhit'),
(603, 35, 'Pratapgarh'),
(604, 35, 'Raebareli'),
(605, 35, 'Rampur'),
(606, 35, 'Saharanpur'),
(607, 35, 'Sambhal(Bheem Nagar);'),
(608, 35, 'Sant Kabir Nagar'),
(609, 35, 'Sant Ravidas Nagar'),
(610, 35, 'Shahjahanpur'),
(611, 35, 'Shamli'),
(612, 35, 'Shravasti'),
(613, 35, 'Siddharthnagar'),
(614, 35, 'Sitapur'),
(615, 35, 'Sonbhadra'),
(616, 35, 'Sultanpur'),
(617, 35, 'Unnao'),
(618, 35, 'Varanasi'),
(619, 34, 'Almora'),
(620, 34, 'Bageshwar'),
(621, 34, 'Chamoli'),
(622, 34, 'Champawat'),
(623, 34, 'Dehradu'),
(624, 34, 'Haridwar'),
(625, 34, 'Nainital'),
(626, 34, 'Pauri Garhwal'),
(627, 34, 'Pithoragarh'),
(628, 34, 'Rudraprayag'),
(629, 34, 'Tehri Garhwal'),
(630, 34, 'Udham Singh Nagar'),
(631, 34, 'Uttarkashi'),
(632, 36, 'Bankura'),
(633, 36, 'Bardhama'),
(634, 36, 'Birbhum'),
(635, 36, 'Cooch Behar'),
(636, 36, 'Dakshin Dinajpur'),
(637, 36, 'Darjeeling'),
(638, 36, 'Hooghly'),
(639, 36, 'Howrah'),
(640, 36, 'Jalpaiguri'),
(641, 36, 'Kolkata'),
(642, 36, 'Maldah'),
(643, 36, 'Murshidabad'),
(644, 36, 'Nadia'),
(645, 36, 'North 24 Parganas'),
(646, 36, 'Paschim Medinipur'),
(647, 36, 'Purba Medinipur'),
(648, 36, 'Purulia'),
(649, 36, 'South 24 Parganas'),
(650, 36, 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `doc_data`
--

CREATE TABLE IF NOT EXISTS `doc_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(250) NOT NULL,
  `nme` varchar(250) NOT NULL,
  `em` varchar(250) NOT NULL,
  `con` varchar(30) NOT NULL,
  `fp` text NOT NULL,
  `dep` varchar(250) NOT NULL,
  `desig` varchar(250) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `quali` text NOT NULL,
  `conslt` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `doc_data`
--

INSERT INTO `doc_data` (`id`, `h_id`, `nme`, `em`, `con`, `fp`, `dep`, `desig`, `pic`, `quali`, `conslt`, `st`) VALUES
(1, 'kims', 'DR. PETER K JOSEPH', 'pj@gmail.com', '04713041400', 'KIMS Hospital\r\nTrivandrum', '1', 'Sr. Consultant', '1.jpg', 'MD, MRCP ( London), D. Card. ( London), FCCP ( London)', 'Mon, Tue, Fri 9.30 am to 3.30 pm | Sat 9.00 am to 1.00 pm', 1),
(2, 'kims', 'Dr. Shanthala K Prabhu', 'sp@gmail.com', '04713041400', 'KIMS trivandrum\r\nKerala', '1', 'Sr. Consultant', '2.jpg', 'MD, MRCP ( London)', 'Tue & Thu | 9:30 am â€“ 1:30 pm', 1),
(3, 'kims', 'Dr. Shaji Palangdan', 'sp1@gmail.com', '04713041400', 'KIMS Hospital\r\nTrivandrum', '1', 'Consultant', '3.jpg', 'MBBS in Government Medical College, Trivandrum, India. 1993-1998', 'Monday â€“ Saturday, 9.00am - 5.00pm', 1),
(4, 'kims', 'Dr. G Vijayaraghavan', 'vijay@gmail.com', '04713041400', 'KIMS Hospital\r\nTrivandrum', '1', 'Vice Chairman & Director-Medical Services', '4.jpg', 'Echo and Doppler echocardiography.,', 'Mon to Fri | 10.00 am to 4.00 pm', 1),
(5, 'kims', 'Dr. Oommen Aju Jacob', 'oaj@gmaol.com', '04713041400', 'KIMS Hospital\r\nTribandrum', '13', 'Hon. Sr. Consultant', '5.jpg', 'Not Listed', 'On Call', 1),
(6, 'kims', 'Dr. Salil Kumar K', 'sk@gmail.com', '04713041400', 'KIMS Hospital\r\nTrivandrum', '2', 'Hon. Sr. Consultant', '6.jpg', 'Not Listed', 'Wed & Sun | 9.30 am to 2.00 pm', 1),
(7, 'kims', 'Dr. Vidyalekshmi R', 'vv@gmail.com', '04713041400', 'KIMS Hospital \r\nTrivandrum', '12', 'Consultant', '7.jpg', 'Not Listed', 'Mon, Wed & Thu | 9:00 am to 1.30 pm', 1),
(8, 'kims', 'Dr. Vijayalekshmi N', 'vl@gmail.com', '04713041400', 'Kims Hospital\r\nTrivandrum', '6', 'Hon. Sr. Consultant', '8.jpg', 'Not Listed', 'Mon, Tue & Thu | 10.30 am to 2.00 pm || Sat | 9.30 am to 2.00 pm', 1),
(9, 'kims', 'Dr. Gopinatha Menon', 'gm@gmail.com', '04713041400', 'KIMS Hospital\r\nTrivandrum', '6', 'Co - ordinator - Internal Medicine', '9.jpg', 'MD from KMC, Mangalore in 1992', 'Mon to Fri | 12.00 noon to 4.00 pm', 1),
(10, 'kims', 'Dr. Suresh Chandran C J', 'sc@gmail.com', '04713041400', 'KIMS Hospital \r\nTrivandrum', '5', 'Chief Coordinator', '10.jpg', 'DM (Neurology), KEM Hospital Mumbai, MD (Medicine) AIIMS New Delhi, MBBS Govt Medical College Trivandrum', 'Mon & Thurs 10.00am â€“ 4.00pm, Tues & Fri | 10.00am3.00pm Saturday 10.00am to 2.30pm', 1),
(11, 'kims', 'Dr. Ashok V P', 'avp@gmail.com', '04713041400', 'KIMS@gmail.com', '5', 'Associate Consultant', '11.jpg', 'DM Nuerology, MD Medicine, MBBS', 'Mon, Tues, Thurs, Fri & Sat 10.00am5.00pm', 1),
(12, 'ah101', 'Prof.Dr.Sudha.P', 'sudha101', '94465562541', 'Ananthapuri\r\nTrivandrum', '6', 'Head of the Department', '12.jpg', 'MD(Gen Med)', 'All days 09:00 to 12:00 | Saturday 05:00 to 07:00', 1),
(13, 'ah101', 'Dr.Madhusudanan.S', 'madhu@gmail.com', '94465562542', 'Ananthapuri\r\nTrivandrum', '6', 'Head of the Department', '13.jpg', 'MD(Gen Med)', 'Saturday 07:00 to 04:00', 1),
(14, 'kims', 'DR. MEERA R', 'meera@gmail.com', '9995874123', 'meera@gmail.com.jpg', '1', 'Consultant', '14.jpg', 'MD', 'Mon, Tue, Thu & Sat | 9.30 am to 3.00 pm', 1),
(15, 'kims', 'DR. PADMAJA N P', 'padma@gmail.com', '9995874126', 'padma@gmail.com.jpg', '1', 'Sr. Consultant', '15.jpg', 'MD', 'Mon, Tue, Thu, & Fri | 10.00 am to 3.00 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fitnes`
--

CREATE TABLE IF NOT EXISTS `fitnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(100) NOT NULL,
  `doc_id` varchar(100) NOT NULL,
  `nme` varchar(200) NOT NULL,
  `fnme` varchar(200) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `con` varchar(30) NOT NULL,
  `mark` varchar(250) NOT NULL,
  `dt` date NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fitnes`
--

INSERT INTO `fitnes` (`id`, `h_id`, `doc_id`, `nme`, `fnme`, `addr`, `con`, `mark`, `dt`, `st`) VALUES
(1, 'kims', 'meera@gmail.com', 'Gireesh Kumar', 'Anil Kumar', 'Kedaram, Kilimanoor Post,Kilimanoor', '9446563002', 'Black Mole on the left hand', '2017-03-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_disease_data`
--

CREATE TABLE IF NOT EXISTS `hospital_disease_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` varchar(50) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `titl` varchar(250) NOT NULL,
  `descrt` text NOT NULL,
  `fil` varchar(100) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hospital_disease_data`
--

INSERT INTO `hospital_disease_data` (`id`, `hid`, `dep`, `titl`, `descrt`, `fil`, `st`) VALUES
(1, 'kims', '5', 'Epilepsy', 'Epilepsy is a group of neurological disorders characterized by epileptic seizures. Epileptic seizures are episodes that can vary from brief and nearly undetectable to long periods of vigorous shaking. In epilepsy, seizures tend to recur, and have no immediate underlying cause while seizures that occur due to a specific cause are not deemed to represent epilepsy. The cause of most cases of epilepsy is unknown, although some people develop epilepsy as the result of brain injury, stroke, brain tumor, and drug and alcohol misuse.', '1.pdf', 1),
(2, 'kims', '5', 'Multiple Sclerosis', 'Multiple sclerosis (MS), also known as disseminated sclerosis or encephalomyelitis disseminata, is an inflammatory disease in which the insulating covers of nerve cells in the brain and spinal cord are damaged. MS is a disease in which your immune system attacks the protective sheath (myelin) that covers your nerves. Myelin damage disrupts communication between your brain and the rest of your body. Ultimately, the nerves themselves may deteriorate, a process that''s currently irreversible.', '2.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hos_dep`
--

CREATE TABLE IF NOT EXISTS `hos_dep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(250) NOT NULL,
  `dep_id` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `hos_dep`
--

INSERT INTO `hos_dep` (`id`, `h_id`, `dep_id`, `st`) VALUES
(1, 'kims', '1', 1),
(2, 'kims', '2', 1),
(3, 'kims', '5', 1),
(4, 'kims', '6', 1),
(5, 'kims', '12', 1),
(6, 'kims', '13', 1),
(7, 'kims', '9', 1),
(8, 'ah101', '1', 1),
(9, 'ah101', '2', 1),
(10, 'ah101', '5', 1),
(11, 'ah101', '6', 1),
(12, 'ah101', '12', 1),
(13, 'ah101', '9', 1),
(14, 'kmc', '1', 1),
(15, 'kmc', '2', 1),
(16, 'kims', '3', 1),
(17, 'mmh', '1', 1),
(18, 'mmh', '2', 1),
(19, 'mmh', '9', 1),
(20, 'kmc', '5', 1),
(21, 'kmc', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `labtest_data`
--

CREATE TABLE IF NOT EXISTS `labtest_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tst_nme` varchar(250) NOT NULL,
  `tst_cnt` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `labtest_data`
--

INSERT INTO `labtest_data` (`id`, `tst_nme`, `tst_cnt`, `st`) VALUES
(1, 'Blood Cultures (Bacteriology)', 'Bloodstream Infection, Sepsis, Neonatal Sepsis, Infective endocarditis, Prosthetic valve endocarditis (PVE), Bacteraemia\r\nThe Blood Culture system can also be used for small volumes of sterile fluid to aid the recovery of fastidious organisms, for example but not limited to Vitreous aspirates, Joint Fluids (Prosthetic and Natural), Cardiac pacemaker site aspirates, Stem Cell fluids. The FAN (green top) bottle contains a charcoal neutralising agent and is suitable for PD fluids.', 1),
(2, 'Blood transfusion tests', 'Here is a list of the blood transfusion tests carried out by the Haematology department, together with specimen requirements and the estimated time it will take to produce a result.\r\nThe results availability times given here represent the time generally required to produce a result following receipt of the sample in the laboratory. Sample transport times are not included.', 1),
(3, 'Blood count tests', 'Here is a list of the blood count tests carried out by the Haematology department, together with specimen requirements and the estimated time it will take to produce a result.\r\nThe results availability times given here represent the time generally required to produce a result following receipt of the sample in the laboratory. Sample transport times are not included.', 1),
(4, 'Urines (Bacteriology)', 'Urinary tract infection (UTI) results from the presence and multiplication of microorganisms in one or more structures of the urinary tract with associated tissue invasion. This can give rise to a wide variety of clinical syndromes. These include acute and chronic pyelonephritis (kidney and renal pelvis), cystitis (bladder), urethritis (urethra), epididymitis (epididymis) and prostatitis (prostate gland). Infection may spread to surrounding tissues (eg perinephric abscess) or to the bloodstream.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_report`
--

CREATE TABLE IF NOT EXISTS `lab_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_id` varchar(200) NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `dt` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `descr` text NOT NULL,
  `file_typ` varchar(50) NOT NULL,
  `attach_data` varchar(250) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicin_data`
--

CREATE TABLE IF NOT EXISTS `medicin_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(50) NOT NULL,
  `medicin_nme` varchar(200) NOT NULL,
  `amt` int(10) NOT NULL,
  `medicin_typ` varchar(100) NOT NULL,
  `descr` varchar(250) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `medicin_data`
--

INSERT INTO `medicin_data` (`id`, `dep`, `medicin_nme`, `amt`, `medicin_typ`, `descr`, `st`) VALUES
(1, '6', 'Aspirin', 50, 'Tablet', 'Aspirin is an analgesic and antipyretic, prescribed for pain, heart attack and fever. The drug decreases the substances that cause pain and inflammation.', 1),
(2, '6', 'Docosanol', 2, 'Tablet', 'Docosanol is a saturated fatty alcohol, prescribed for cold sores or fever blisters.', 1),
(3, '6', 'Ketoprofen', 1, 'Tablet', 'Ketoprofen is a non-steroidal anti-inflammatory agent (NSAID), prescribed for mild to moderate pain, fever', 1),
(4, '6', 'Paracetamol', 2, 'Tablet', 'Paracetamol (acetaminophen) is a pain reliever and a fever reducer. The exact mechanism of action of is not known.', 1),
(5, '6', 'Advil', 2, 'Tablet', 'Advil (ibuprofen) is a nonsteroidal anti-inflammatory drug (NSAID). Ibuprofen works by reducing hormones that cause inflammation and pain in the body.', 1),
(6, '6', 'Ecpirin', 1, 'Tablet', 'Aspirin is a salicylate (sa-LIS-il-ate). It works by reducing substances in the body that cause pain, fever, and inflammation.', 1),
(7, '6', 'Dolono', 1, 'Tablet', 'Acetaminophen is used to treat minor aches and pain and to reduce fever. It may also help treat pain from mild forms of arthritis.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_patient`
--

CREATE TABLE IF NOT EXISTS `new_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(250) NOT NULL,
  `bar_code` varchar(250) NOT NULL,
  `info_todoc` text NOT NULL,
  `deses` text NOT NULL,
  `doc_descp` text NOT NULL,
  `tmp` varchar(20) NOT NULL,
  `wight` varchar(20) NOT NULL,
  `bp` varchar(50) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `doc` varchar(250) NOT NULL,
  `dt1` date NOT NULL,
  `dt2` date NOT NULL,
  `mnth` varchar(200) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `new_patient`
--

INSERT INTO `new_patient` (`id`, `h_id`, `bar_code`, `info_todoc`, `deses`, `doc_descp`, `tmp`, `wight`, `bp`, `dep`, `doc`, `dt1`, `dt2`, `mnth`, `st`) VALUES
(1, 'kims', '695612-12-101-382', 'Body pain and heavy headache.', 'Fever', 'Nothing serious. need to tale rest.', '101', '75', '85-95', '6', 'gm@gmail.com', '2016-11-08', '0000-00-00', '', 1),
(2, 'kims', '695612-12-101-755', 'Cold, Fever, Body Pain', 'Fever', 'Provide Medicine, Need Good Rest', '101', '80', '95-105', '6', 'gm@gmail.com', '2016-11-08', '0000-00-00', '2016-11', 1),
(3, 'kims', '6965010-12-101-415', 'head ache', 'Multiple Sclerosis', 'need rest.', '102', '50', '100-125', '5', 'avp@gmail.com', '2016-11-12', '0000-00-00', '2016-11', 1),
(4, 'kims', '6965010-12-101-415', 'Head ache, Feaver', 'Allergy', 'Need to admit here', '103', '50', '100-125', '6', 'vl@gmail.com', '2016-11-15', '2016-11-18', '2016-11', 2),
(5, 'kims', '695101-12-123-947', 'Feaver, Headach, ', 'Allergy', 'take rest', '101', '52', '95-101', '6', 'vl@gmail.com', '2016-11-17', '0000-00-00', '2016-11', 1),
(6, 'ah101', '6965010-12-101-415', 'Head ache, Fever, ', 'Allergy', 'Need to observe the patient', '102', '52', '100-125', '6', 'sudha101', '2016-11-19', '0000-00-00', '2016-11', 2),
(9, 'kims', '695584-15-100-537', 'fever', 'Fever', 'need rest', '102', '75', '100-125', '6', 'vl@gmail.com', '2016-11-25', '0000-00-00', '2016-11', 1),
(10, 'kims', '695584-15-100-537', 'fever', 'Fever', 'need rest', '100', '50', '100-125', '6', 'vl@gmail.com', '2016-11-30', '0000-00-00', '2016-11', 1),
(11, 'kims', '695612-12-101-382', 'headache', 'Fever', 'take rest', '99', '52', '100-125', '6', 'vl@gmail.com', '2016-12-01', '0000-00-00', '2016-12', 1),
(12, 'kims', '695101-12-123-947', 'fever', '', '', '', '', '', '6', 'vl@gmail.com', '2016-12-01', '0000-00-00', '2016-12', 0),
(13, 'kims', '695584-15-100-537', 'test', 'Allergy', 'need rest', '103', '50', '100-125', '6', 'vl@gmail.com', '2016-12-03', '0000-00-00', '2016-12', 1),
(15, 'ah101', '6965010-12-101-415', 'kkk', 'Allergy', '', '', '', '', '1', 'pj@gmail.com', '2016-12-04', '0000-00-00', '2016-12', 0),
(16, 'kims', '695101-12-123-947', 'chuma', '', '', '', '', '', '1', 'pj@gmail.com', '2016-12-07', '0000-00-00', '2016-12', 0),
(17, 'kims', '695584-15-100-537', 'fever.', 'Fever', 'need rest. ', '102', '75', '100-125', '6', 'vl@gmail.com', '2017-01-01', '0000-00-00', '2017-01', 1),
(18, 'kims', '6965010-12-101-415', 'fever', '', '', '', '', '', '6', 'vl@gmail.com', '2017-01-03', '0000-00-00', '2017-01', 0),
(19, 'kims', '695528-5-356-886', 'fever', 'Fever', 'nee drest', '102', '52', '100-125', '6', 'vl@gmail.com', '2017-01-07', '0000-00-00', '2017-01', 1),
(20, 'kims', '691601-50-25-267', 'pain', '', 'need rest', '99', '52', '95-101', '13', 'oaj@gmaol.com', '2017-01-11', '0000-00-00', '2017-01', 2),
(21, 'kims', '695012-16-102-056', 'headache', '', '', '', '', '', '6', 'vl@gmail.com', '2017-01-21', '0000-00-00', '2017-01', 0),
(22, 'kims', '695101-12-101-142', 'pain', '', '', '', '', '', '1', 'meera@gmail.com', '2017-03-01', '0000-00-00', '2017-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `op_entry`
--

CREATE TABLE IF NOT EXISTS `op_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` varchar(200) NOT NULL,
  `doc_id` varchar(200) NOT NULL,
  `admit_num` varchar(20) NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `dt` date NOT NULL,
  `descr` varchar(200) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `op_entry`
--

INSERT INTO `op_entry` (`id`, `hid`, `doc_id`, `admit_num`, `bar_code`, `dt`, `descr`, `st`) VALUES
(1, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '2016-11-08', 'This Report is creatd by Dr. Gopinatha Menon', 1),
(2, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '2016-11-08', 'This Report is creatd by Dr. Gopinatha Menon', 1),
(3, 'kims', 'avp@gmail.com', '3', '6965010-12-101-415', '2016-11-12', 'This Report is creatd by Dr. Ashok V P', 1),
(4, 'kims', 'vl@gmail.com', '5', '695101-12-123-947', '2016-11-17', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(5, 'kims', 'vl@gmail.com', '9', '695584-15-100-537', '2016-11-25', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(6, 'kims', 'vl@gmail.com', '10', '695584-15-100-537', '2016-11-30', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(7, 'kims', 'vl@gmail.com', '11', '695612-12-101-382', '2016-12-01', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(8, 'kims', 'vl@gmail.com', '13', '695584-15-100-537', '2016-12-03', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(9, 'kims', 'vl@gmail.com', '17', '695584-15-100-537', '2017-01-01', 'This Report is creatd by Dr. Vijayalekshmi N', 1),
(10, 'kims', 'vl@gmail.com', '19', '695528-5-356-886', '2017-01-07', 'This Report is creatd by Dr. Vijayalekshmi N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `op_lab`
--

CREATE TABLE IF NOT EXISTS `op_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(250) NOT NULL,
  `doc_id` varchar(200) NOT NULL,
  `opentry_id` varchar(200) NOT NULL,
  `bar_code` varchar(100) NOT NULL,
  `test_id` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `op_lab`
--

INSERT INTO `op_lab` (`id`, `h_id`, `doc_id`, `opentry_id`, `bar_code`, `test_id`, `st`) VALUES
(1, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '1', 1),
(3, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '3', 1),
(4, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '1', 1),
(5, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '2', 1),
(6, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '4', 1),
(8, 'kims', 'vl@gmail.com', '4', '695101-12-123-947', '3', 1),
(9, 'kims', 'vl@gmail.com', '5', '695584-15-100-537', '3', 0),
(10, 'kims', 'vl@gmail.com', '6', '695584-15-100-537', '3', 0),
(11, 'kims', 'vl@gmail.com', '7', '695612-12-101-382', '3', 0),
(12, 'kims', 'vl@gmail.com', '8', '695584-15-100-537', '3', 0),
(13, 'kims', 'vl@gmail.com', '8', '695584-15-100-537', '1', 0),
(14, 'kims', 'vl@gmail.com', '9', '695584-15-100-537', '3', 0),
(15, 'kims', 'vl@gmail.com', '10', '695528-5-356-886', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `op_medicine`
--

CREATE TABLE IF NOT EXISTS `op_medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(200) NOT NULL,
  `doc_id` varchar(200) NOT NULL,
  `opentry_id` varchar(50) NOT NULL,
  `bar_code` varchar(150) NOT NULL,
  `medicine` varchar(20) NOT NULL,
  `qty_need` int(11) NOT NULL,
  `qty_get` int(11) NOT NULL,
  `descrp` text NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `op_medicine`
--

INSERT INTO `op_medicine` (`id`, `h_id`, `doc_id`, `opentry_id`, `bar_code`, `medicine`, `qty_need`, `qty_get`, `descrp`, `st`) VALUES
(2, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '4', 5, 5, '1-0-1', 1),
(3, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '7', 3, 3, '1-0-0', 1),
(4, 'kims', 'gm@gmail.com', '1', '695612-12-101-382', '3', 3, 3, '0-1-0', 1),
(5, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '2', 10, 10, '1-1-1', 1),
(6, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '5', 15, 15, '1-1-1', 1),
(8, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '4', 10, 10, '1-0-1', 1),
(9, 'kims', 'gm@gmail.com', '2', '695612-12-101-755', '6', 5, 5, '0-0-1', 1),
(10, 'kims', 'avp@gmail.com', '3', '6965010-12-101-415', '1', 10, 10, '1-0-1', 1),
(11, 'kims', 'avp@gmail.com', '3', '6965010-12-101-415', '7', 15, 5, '1-1-1', 1),
(12, 'kims', 'avp@gmail.com', '3', '6965010-12-101-415', '2', 10, 10, '0-0-2', 1),
(13, 'kims', 'vl@gmail.com', '4', '695101-12-123-947', '4', 10, 10, '1-0-1', 1),
(14, 'kims', 'vl@gmail.com', '4', '695101-12-123-947', '1', 5, 5, '0-0-1', 1),
(15, 'kims', 'vl@gmail.com', '4', '695101-12-123-947', '6', 10, 10, '0-1-0', 1),
(16, 'kims', 'vl@gmail.com', '5', '695584-15-100-537', '1', 10, 10, '1-0-1', 1),
(17, 'kims', 'vl@gmail.com', '5', '695584-15-100-537', '4', 5, 5, '0-0-1', 1),
(18, 'kims', 'vl@gmail.com', '6', '695584-15-100-537', '1', 10, 10, '1-1-1', 1),
(19, 'kims', 'vl@gmail.com', '6', '695584-15-100-537', '4', 5, 5, '0-0-1', 1),
(20, 'kims', 'vl@gmail.com', '7', '695612-12-101-382', '1', 10, 10, '1-1-1', 1),
(21, 'kims', 'vl@gmail.com', '7', '695612-12-101-382', '7', 5, 5, '0-0-1', 1),
(22, 'kims', 'vl@gmail.com', '7', '695612-12-101-382', '3', 10, 10, '1-0-1', 1),
(23, 'kims', 'vl@gmail.com', '8', '695584-15-100-537', '2', 10, 0, '1-1-1', 1),
(24, 'kims', 'vl@gmail.com', '8', '695584-15-100-537', '4', 5, 0, '0-0-2', 1),
(25, 'kims', 'vl@gmail.com', '8', '695584-15-100-537', '1', 1, 0, '1-0-0', 1),
(26, 'kims', 'vl@gmail.com', '9', '695584-15-100-537', '1', 10, 10, '1-1-1-1', 1),
(27, 'kims', 'vl@gmail.com', '9', '695584-15-100-537', '4', 10, 10, '1-0-1', 1),
(28, 'kims', 'vl@gmail.com', '10', '695528-5-356-886', '1', 10, 0, '1-1-1', 1),
(29, 'kims', 'vl@gmail.com', '10', '695528-5-356-886', '7', 5, 0, '0-0-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_data`
--

CREATE TABLE IF NOT EXISTS `org_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(250) NOT NULL,
  `unme` varchar(50) NOT NULL,
  `em` varchar(250) NOT NULL,
  `addr` text NOT NULL,
  `con` varchar(15) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `stat` varchar(250) NOT NULL,
  `dis` varchar(250) NOT NULL,
  `taluk` varchar(250) NOT NULL,
  `vilg` varchar(250) NOT NULL,
  `org_typ` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `org_data`
--

INSERT INTO `org_data` (`id`, `nme`, `unme`, `em`, `addr`, `con`, `mob`, `stat`, `dis`, `taluk`, `vilg`, `org_typ`, `st`) VALUES
(1, 'Revathi Medicals', 'rm101', 'revathimedicals@gmail.com', 'Kerette Junction<br />\r\nNear Bus stand<br />\r\nOpp. Gulabi Digital Studio', '04702836312', '9446563002', '18', '280', '1', '1', '2', 1),
(2, 'Karette Medical Center', 'kmc', 'kmc@gmail.com', 'Opposit Bus Stand<br />\r\nNagaroor Road<br />\r\nKarette', '04702836398', '9995114948', '18', '280', '1', '1', '1', 1),
(3, 'DDRC Lab', 'ddrckarette', 'ddrckarette@gmail.com', 'Opposite South Indian Bank<br />\r\nNear Petrol Pump<br />\r\nKarette', '04702836654', '9995478521', '18', '280', '1', '1', '3', 1),
(4, 'Saji Hospital', 'sh101', 'sajihospital@gmail.com', 'Market Road<br />\r\nopposite S R Enterprise<br />\r\nKilimanoor ', '04702836852', '9446563008', '18', '280', '1', '1', '1', 2),
(5, 'Kerala Institute of Medical Sciences (KIMS)', 'kims', 'relations@kimsglobal.com', 'No.1, Anayara Road<br />\r\nAnayara, Thiruvananthapuram<br />\r\nKerala 695029', '04713041400', '9995114948', '18', '280', '1', '1', '1', 1),
(6, 'Ananthapuri Hospitals', 'ah101', 'ananthapurihri@vsnl.net', 'Ananthapuri Hospitals and Research Institute<br />\r\nChacka, NH Bypass<br />\r\nThiruvananthapuram - 695024', '04712579900', '9995478521', '18', '280', '1', '1', '1', 1),
(7, 'Kannan Medical Sore', 'knn101', 'kannan@gmail.com', 'Near KSRTC Bus Stand<br />\r\nKilmanoor', '9446563002', '9598741256', '18', '280', '1', '1', '2', 1),
(8, 'Anupama Medicals', 'anu101', 'anupamamedicals@gmail.com', 'Near HDFC Bank<br />\r\nNaraaroor Jn.<br />\r\nKilimanoor', '9895412587', '9995123456', '18', '280', '1', '2', '2', 1),
(9, 'Matha Memorial Hospital', 'mmh', 'mathahospital@gmail.com', 'Kadavoor<br />\r\nKollam<br />\r\nKerala', '9856321478', '9995123456', '18', '280', '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_lab`
--

CREATE TABLE IF NOT EXISTS `purchase_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` varchar(200) NOT NULL,
  `barcode` varchar(150) NOT NULL,
  `purchase_typ` varchar(10) NOT NULL,
  `dt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `purchase_lab`
--

INSERT INTO `purchase_lab` (`id`, `store_id`, `barcode`, `purchase_typ`, `dt`) VALUES
(1, 'ddrckarette', '695612-12-101-382', '1', '2016-11-21'),
(2, 'ddrckarette', '695612-12-101-755', '2', '2016-11-21'),
(3, 'ddrckarette', '695101-12-123-947', '4', '2016-11-21'),
(5, 'ddrckarette', '6965010-12-101-415', '0', '2016-11-21'),
(6, 'ddrckarette', '695612-12-101-382', '1', '2016-11-22'),
(7, 'ddrckarette', '695612-12-101-755', '2', '2016-11-23'),
(8, 'ddrckarette', '695612-12-101-382', '7', '2017-01-01'),
(9, 'ddrckarette', '6965010-12-101-415', '0', '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_lab_test`
--

CREATE TABLE IF NOT EXISTS `purchase_lab_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` varchar(150) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `op_id` varchar(10) NOT NULL,
  `bar_code` varchar(150) NOT NULL,
  `test_id` varchar(10) NOT NULL,
  `op_lab_id` varchar(50) NOT NULL,
  `test_file` varchar(50) NOT NULL,
  `fil_typ` varchar(10) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `purchase_lab_test`
--

INSERT INTO `purchase_lab_test` (`id`, `store_id`, `pid`, `op_id`, `bar_code`, `test_id`, `op_lab_id`, `test_file`, `fil_typ`, `st`) VALUES
(1, 'ddrckarette', '1', '1', '695612-12-101-382', '3', '3', '3.gif', '1', 1),
(2, 'ddrckarette', '1', '1', '695612-12-101-382', '1', '1', '4.jpg', '1', 1),
(3, 'ddrckarette', '2', '2', '695612-12-101-755', '4', '6', '1.jpg', '1', 1),
(4, 'ddrckarette', '2', '2', '695612-12-101-755', '1', '4', '5.gif', '1', 1),
(5, 'ddrckarette', '2', '2', '695612-12-101-755', '2', '5', '0', '0', 0),
(6, 'ddrckarette', '3', '4', '695101-12-123-947', '3', '8', '6.jpg', '1', 1),
(7, 'ddrckarette', '5', '0', '6965010-12-101-415', '1', '0', '0', '0', 0),
(8, 'ddrckarette', '5', '0', '6965010-12-101-415', '2', '0', '3.gif', '1', 1),
(9, 'ddrckarette', '7', '2', '695612-12-101-755', '2', '5', '7.jpg', '1', 1),
(10, 'ddrckarette', '7', '2', '695612-12-101-755', '4', '6', '8.jpg', '1', 1),
(11, 'ddrckarette', '8', '7', '695612-12-101-382', '3', '11', '0', '0', 0),
(12, 'ddrckarette', '9', '0', '6965010-12-101-415', '3', '0', '9.jpg', '1', 1),
(13, 'ddrckarette', '9', '0', '6965010-12-101-415', '2', '0', '10.jpg', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_medicine`
--

CREATE TABLE IF NOT EXISTS `purchase_medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` varchar(200) NOT NULL,
  `bar_code` varchar(50) NOT NULL,
  `purchase_type` varchar(50) NOT NULL,
  `dt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `purchase_medicine`
--

INSERT INTO `purchase_medicine` (`id`, `store_id`, `bar_code`, `purchase_type`, `dt`) VALUES
(1, 'rm101', '695612-12-101-382', '1', '2016-11-10'),
(2, 'rm101', '695612-12-101-382', '1', '2016-11-10'),
(3, 'rm101', '695612-12-101-382', '1', '2016-11-10'),
(4, 'rm101', '695612-12-101-382', '1', '2016-11-10'),
(5, 'rm101', '695612-12-101-382', '1', '2016-11-10'),
(6, 'rm101', '695612-12-101-755', '2', '2016-11-10'),
(7, 'rm101', '695612-12-101-755', '2', '2016-11-10'),
(8, 'rm101', '695612-12-101-382', '1', '2016-11-11'),
(9, 'rm101', '695612-12-101-382', '0', '2016-11-11'),
(10, 'rm101', '695612-12-101-382', '0', '2016-11-12'),
(11, 'rm101', '6965010-12-101-415', '3', '2016-11-12'),
(12, 'rm101', '6965010-12-101-415', '0', '2016-11-12'),
(13, 'rm101', '6965010-12-101-415', '0', '2016-11-14'),
(14, 'rm101', '6965010-12-101-415', '0', '2016-11-15'),
(15, 'rm101', '695101-12-123-947', '4', '2016-11-17'),
(16, 'rm101', '695584-15-100-537', '5', '2016-11-25'),
(17, 'rm101', '695612-12-101-755', '0', '2016-11-29'),
(18, 'rm101', '695584-15-100-537', '6', '2016-11-30'),
(19, 'rm101', '695612-12-101-382', '7', '2016-12-01'),
(20, 'rm101', '6965010-12-101-415', '0', '2016-12-01'),
(21, 'rm101', '695584-15-100-537', '9', '2017-01-01'),
(22, 'rm101', '695528-5-356-886', '0', '2017-01-07'),
(23, 'rm101', '6965010-12-101-415', '0', '2017-01-11'),
(24, 'rm101', '695612-12-101-755', '0', '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_medicine_data`
--

CREATE TABLE IF NOT EXISTS `purchase_medicine_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` varchar(200) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `bar_code` varchar(250) NOT NULL,
  `mdcin` varchar(250) NOT NULL,
  `qty` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `purchase_medicine_data`
--

INSERT INTO `purchase_medicine_data` (`id`, `store_id`, `pid`, `bar_code`, `mdcin`, `qty`) VALUES
(1, 'rm101', '1', '695612-12-101-382', '4', '4'),
(2, 'rm101', '1', '695612-12-101-382', '7', '3'),
(3, 'rm101', '1', '695612-12-101-382', '3', '3'),
(4, 'rm101', '3', '695612-12-101-382', '4', '1'),
(5, 'rm101', '6', '695612-12-101-755', '2', '5'),
(6, 'rm101', '6', '695612-12-101-755', '5', '15'),
(7, 'rm101', '6', '695612-12-101-755', '4', '500'),
(8, 'rm101', '6', '695612-12-101-755', '6', '5'),
(9, 'rm101', '7', '695612-12-101-755', '2', '5'),
(10, 'rm101', '7', '695612-12-101-755', '4', '5'),
(11, 'rm101', '11', '6965010-12-101-415', '1', '10'),
(12, 'rm101', '11', '6965010-12-101-415', '7', '5'),
(13, 'rm101', '11', '6965010-12-101-415', '2', '10'),
(14, 'rm101', '13', '6965010-12-101-415', '5', '30'),
(16, 'rm101', '13', '6965010-12-101-415', '4', '5'),
(17, 'rm101', '13', '6965010-12-101-415', '4', '10'),
(18, 'rm101', '14', '6965010-12-101-415', '4', '4'),
(19, 'rm101', '14', '6965010-12-101-415', '4', '8'),
(20, 'rm101', '14', '6965010-12-101-415', '4', '10'),
(21, 'rm101', '15', '695101-12-123-947', '5', '10'),
(22, 'rm101', '15', '695101-12-123-947', '1', '5'),
(23, 'rm101', '15', '695101-12-123-947', '6', '10'),
(24, 'rm101', '16', '695584-15-100-537', '1', '10'),
(25, 'rm101', '16', '695584-15-100-537', '4', '5'),
(26, 'rm101', '18', '695584-15-100-537', '1', '10'),
(27, 'rm101', '18', '695584-15-100-537', '4', '5'),
(28, 'rm101', '19', '695612-12-101-382', '1', '10'),
(29, 'rm101', '19', '695612-12-101-382', '7', '5'),
(30, 'rm101', '19', '695612-12-101-382', '3', '10'),
(31, 'rm101', '20', '6965010-12-101-415', '5', '5'),
(32, 'rm101', '20', '6965010-12-101-415', '2', '10'),
(33, 'rm101', '21', '695584-15-100-537', '1', '10'),
(34, 'rm101', '21', '695584-15-100-537', '4', '10'),
(35, 'rm101', '23', '6965010-12-101-415', '1', '50'),
(36, 'rm101', '23', '6965010-12-101-415', '3', '20'),
(37, 'rm101', '24', '695612-12-101-755', '2', '20'),
(38, 'rm101', '24', '695612-12-101-755', '4', '20');

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE IF NOT EXISTS `staff_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` varchar(250) NOT NULL,
  `nme` varchar(250) NOT NULL,
  `em` varchar(250) NOT NULL,
  `con` varchar(15) NOT NULL,
  `addr` text NOT NULL,
  `stf_typ` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff_data`
--

INSERT INTO `staff_data` (`id`, `h_id`, `nme`, `em`, `con`, `addr`, `stf_typ`, `st`) VALUES
(1, 'kims', 'Gopika', 'gopika@gmail.com', '9895456321', 'Gopika bhavan\r\nKilimanoor\r\nTrivandrum', 'rec', 1),
(2, 'kims', 'Radhika', 'radhika@gmail.com', '9895456327', 'Radhika bhavan\r\nVarkala\r\nTrivandrum', 'aprm', 1),
(3, 'ah101', 'anantha_staf1', 'anantha_staf1@gmail.com', '9446563005', 'Ananthapuri Hospital\r\nTrivandrum', 'rec', 1),
(4, 'ah101', 'anantha_staf2', 'anantha_staf2@gmail.com', '9446563009', 'Ananthapuri Hospital\r\nTrivandrum', 'aprm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `StCode` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`StCode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StCode`, `StateName`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'Uttar Pradesh'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tal_info`
--

CREATE TABLE IF NOT EXISTS `tal_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `tal_nme` varchar(250) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tal_info`
--

INSERT INTO `tal_info` (`id`, `s_id`, `d_id`, `tal_nme`, `st`) VALUES
(1, 18, 280, 'Chirayinkeezhu', 1),
(2, 18, 280, 'Nedumangadu', 1),
(5, 18, 280, 'Thiruvananthapuram', 1),
(6, 18, 280, 'Neyyattinkara', 1),
(7, 18, 280, 'Varkala', 1),
(8, 18, 280, 'Kattakada', 1),
(9, 18, 273, 'Kollam', 1),
(10, 18, 273, 'Karunagappally', 1),
(11, 18, 273, 'Kunnathur', 1),
(12, 18, 273, 'Kottarakkara', 1),
(13, 18, 273, 'Punalur ', 1),
(14, 18, 273, 'Pathanapuram', 1),
(15, 31, 505, 'Thovalai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_thumb`
--

CREATE TABLE IF NOT EXISTS `temp_thumb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `fp` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `usr_log`
--

CREATE TABLE IF NOT EXISTS `usr_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(150) NOT NULL,
  `pas` varchar(100) NOT NULL,
  `typ` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `usr_log`
--

INSERT INTO `usr_log` (`id`, `uid`, `pas`, `typ`, `st`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'v101', 'asd', 'authority', 1),
(3, 'r101', 'asd', 'authority', 1),
(8, 'rm101', 'rm101', '2', 1),
(9, 'kmc', 'kmc', '1', 1),
(10, 'ddrckarette', 'ddrc', '3', 1),
(11, 'sh101', 'sh101', '1', 2),
(12, 'kims', 'kims', '1', 1),
(13, 'ah101', 'ah101', '1', 1),
(14, 'gopika@gmail.com', 'asd', 'rec', 1),
(15, 'radhika@gmail.com', 'asd', 'aprm', 1),
(16, 'pj@gmail.com', 'asd', 'doc', 1),
(17, 'sp@gmail.com', 'asd', 'doc', 1),
(18, 'sp1@gmail.com', 'asd', 'doc', 1),
(19, 'vijay@gmail.com', 'asd', 'doc', 1),
(20, 'oaj@gmaol.com', 'asd', 'doc', 1),
(21, 'sk@gmail.com', 'asd', 'doc', 1),
(22, 'vv@gmail.com', 'asd', 'doc', 1),
(23, 'vl@gmail.com', 'asd', 'doc', 1),
(24, 'gm@gmail.com', 'asd', 'doc', 1),
(25, 'sc@gmail.com', 'asd', 'doc', 1),
(26, 'avp@gmail.com', 'asd', 'doc', 1),
(27, 'knn101', 'knn101', '2', 1),
(28, 'anantha_staf1@gmail.com', 'asd', 'rec', 1),
(29, 'anantha_staf2@gmail.com', 'asd', 'aprm', 1),
(30, 'sudha101', 'asd', 'doc', 1),
(31, 'madhu@gmail.com', 'asd', 'doc', 1),
(32, 'anu101', 'asd', '2', 1),
(33, 'e101', 'asd', 'authority', 1),
(34, 'mmh', 'mmh', '1', 1),
(35, 'r111', 'asd', 'authority', 1),
(36, 'meera@gmail.com', 'meera', 'doc', 1),
(37, 'padma@gmail.com', 'padma', 'doc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vil_info`
--

CREATE TABLE IF NOT EXISTS `vil_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `v_nme` varchar(250) NOT NULL,
  `con` varchar(15) NOT NULL,
  `v_offcr` varchar(250) NOT NULL,
  `lid` varchar(250) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vil_info`
--

INSERT INTO `vil_info` (`id`, `sid`, `did`, `tid`, `v_nme`, `con`, `v_offcr`, `lid`, `pwd`, `st`) VALUES
(1, 18, 280, 1, 'Pulimath', '9446563006', 'Vineeth A ', 'v101', 'asd', 1),
(2, 18, 280, 1, 'Nagaroor', '9896547852', 'Rajeev Appu', 'r101', 'qwe', 1),
(3, 31, 505, 15, 'Kattuputhoor', '98954785412', 'Ezhil', 'e101', 'asd', 1),
(4, 18, 280, 2, 'Puthanpalam', '9458741254', 'Rajagopal', 'r111', 'asd', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
