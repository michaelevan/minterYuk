-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 01:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minteryuk`
--
CREATE DATABASE IF NOT EXISTS `minteryuk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `minteryuk`;

-- --------------------------------------------------------

--
-- Table structure for table `cashback`
--

DROP TABLE IF EXISTS `cashback`;
CREATE TABLE `cashback` (
  `id_cashback` varchar(5) NOT NULL,
  `nama_cashback` varchar(15) NOT NULL,
  `jumlah_cashback` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_cust` varchar(5) NOT NULL,
  `fk_user` varchar(5) NOT NULL,
  `nama_lengkapcust` varchar(60) NOT NULL,
  `profesi` varchar(20) NOT NULL,
  `notelp_cust` varchar(50) NOT NULL,
  `jk_user` varchar(2) NOT NULL,
  `tgllahir_cust` date NOT NULL,
  `status_cust` int(1) NOT NULL,
  `alamat_cust` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cust`, `fk_user`, `nama_lengkapcust`, `profesi`, `notelp_cust`, `jk_user`, `tgllahir_cust`, `status_cust`, `alamat_cust`) VALUES
('CU001', 'US001', 'Yohanes Tirto', 'Mahasiswa', '811562345', 'L', '2021-04-01', 0, 'Surabaya'),
('CU002', 'US002', 'Nicholas Andry', 'Mahasiswa', '812648453', 'L', '2021-04-02', 0, ''),
('CU003', 'US003', 'Michael Jonathan', 'Mahasiswa', '812161129', 'L', '2021-04-04', 0, ''),
('CU004', 'US004', 'Michael Evan', 'Mahasiswa', '081216112999', 'L', '2021-04-03', 0, ''),
('CU005', 'US005', 'Bryan Steven', 'Mahasiswa', '08466264622', 'L', '2021-04-05', 0, ''),
('CU006', 'US006', 'Ivan Aubrey', 'Penyanyi', '08121495234', 'L', '2021-04-06', 0, ''),
('CU007', 'US007', 'Salohcin', 'Gamer', '0812456743', 'L', '2021-04-07', 0, ''),
('CU008', 'US008', 'Senahoy', 'Kurir', '08465612647', 'L', '2021-04-08', 0, ''),
('CU009', 'US009', 'Jestine Siewij', 'Make Up Artist', '08465562315', 'P', '2021-04-09', 0, ''),
('CU010', 'US010', 'Michelle Han', 'Reporter', '0846561278', 'P', '2021-04-10', 0, ''),
('CU011', 'US021', 'ivan aubrey adianto', 'tukang masak', '085230182557', 'L', '2001-04-30', 0, 'taman'),
('CU012', 'US022', 'a', 'a', 'a', 'L', '2001-04-30', 0, 'a'),
('CU013', 'US023', 'sani', 'irwan', '08129312412', 'L', '2021-05-12', 0, 'widya');

-- --------------------------------------------------------

--
-- Table structure for table `d_forum`
--

DROP TABLE IF EXISTS `d_forum`;
CREATE TABLE `d_forum` (
  `id_dforum` int(15) NOT NULL,
  `fk_user` varchar(5) NOT NULL,
  `fk_hforum` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `ulasan` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_forum`
--

INSERT INTO `d_forum` (`id_dforum`, `fk_user`, `fk_hforum`, `tanggal`, `ulasan`, `status`) VALUES
(1, 'US017', 2, '2021-05-31', 'itu karena anda belum crack photoshop nya', 0),
(2, 'US011', 1, '2021-05-31', 'itu karena ada attribute table yang tidak ada di table anda', 0),
(3, 'US001', 2, '2021-05-13', 'jsadkljdsga', 0);

-- --------------------------------------------------------

--
-- Table structure for table `h_forum`
--

DROP TABLE IF EXISTS `h_forum`;
CREATE TABLE `h_forum` (
  `id_hforum` int(15) NOT NULL,
  `nama_ulasan` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `fk_kelas` varchar(5) NOT NULL,
  `tanggalpost` date NOT NULL,
  `fk_customer` varchar(5) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h_forum`
--

INSERT INTO `h_forum` (`id_hforum`, `nama_ulasan`, `deskripsi`, `fk_kelas`, `tanggalpost`, `fk_customer`, `status`) VALUES
(1, 'data not found', 'saat saya run keluar seperti ini', 'KA002', '2021-05-26', 'CU001', 0),
(2, 'kenapa photoshop saya error seperti ini', 'saat saya masking tidak bisa', 'KA001', '2021-05-24', 'CU002', 0),
(3, 'bagaimana masking biar bisa rapi', 'saat saya pencet kehapus semua', 'KA001', '2021-05-31', 'CU003', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `fk_mentor` varchar(5) NOT NULL,
  `harga_kelas` int(10) NOT NULL,
  `rating` int(5) NOT NULL,
  `review` varchar(100) NOT NULL,
  `status_kelas` int(1) NOT NULL,
  `ket_kelas` varchar(5000) NOT NULL,
  `img` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `fk_mentor`, `harga_kelas`, `rating`, `review`, `status_kelas`, `ket_kelas`, `img`) VALUES
('KA001', 'Photoshop', 'MN001', 375000, 0, '', 0, 'Bokeh: efek artistik yang didapat dari lensa dalam bentuk gambar blur.\r\n\r\nBlur: efek kabur yang bisa didapat dari lensa maupun permainan kecepatan rana.\r\n\r\n\r\n\r\nBaik Bokeh maupun Blur bisa dibuat menggunakan kamera digital menggunakan setting atau lensa khusus. Tapi adakalanya, kita tidak memiliki lensa khusus atau tidak mengatur setting yang memungkinkan gambar blur diperoleh. Lantas?\r\n\r\n\r\n\r\nJagokan Photoshop kalau begitu. Mini video course ini khusus dibuat untuk membantu Anda mendapatkan efek bokeh dan blur.\r\n\r\n\r\n\r\nYang perlu Anda persiapkan hanyalah foto-foto digital yang Anda miliki. Lalu, gunakan filter-filter dari kelompok Blur yang ada di Photoshop. Pakailah dengan baik dan sekreatif mungkin. Dengan demikian, Anda akan:\r\n\r\n- Menghemat biaya karena tidak perlu beli lensa khusus.\r\n\r\n- Puas karena foto biasa menjadi lebih artistik.\r\n\r\n- Santai karena foto yang telanjur dipotret menggunakan setting salah, bisa dikoreksi.\r\n\r\n\r\n\r\nJadi, ayo sekarang belajar bikin foto blur dan bokeh!\r\n\r\nApa yang akan Anda pelajari\r\nRagam pembuatan efek Blur menggunakan Photoshop\r\nPembuatan efek Bokeh menggunakan Photoshop\r\nKreasi Efek Blur yang Bisa Dicoba di Rumah\r\nApakah ada syarat atau prasyarat kursus?\r\nMemiliki Photoshop versi CC\r\nPunya koleksi foto keren yang ingin di-Blur\r\nPunya koleksi foto cantik yang ingin di-Bokeh\r\nUntuk siapa kursus ini:\r\nFotografer digital\r\nPemilik DSLR\r\nSiapapun yang tidak memiliki lensa berdiafragma lebar', 'photoshop.jpg'),
('KA002', 'GarageBand', 'MN002', 85000, 0, '', 0, '\r\nThis course is designed to help you start making great music in GarageBand fast!  Video lessons show you how to write, record, edit, and polish your songs step-by-step.  You\'ll learn how to use the tools GarageBand offers for creative songwriting (including software instruments & the session drummer) as well how to use its powerful tools for editing & mixing (cleaning and polishing) your songs!  The videos in this course are content rich and get straight to the point so that you can start making high quality music in GarageBand without wasting any time!  And don\'t worry, we are going to make this easy and fun! \r\n\r\nIf you are a songwriter or musician who wants to record your own music in GarageBand but you have no idea where to start... this course is made for you!\r\n\r\nApa yang akan Anda pelajari\r\nMaster the basic functions of GarageBand\r\nWrite & record origional songs from scratch\r\nEdit & polish your songs so they\'re ready to share!\r\nHave a blast making great music in GarageBand!\r\nApakah ada syarat atau prasyarat kursus?\r\nUpdate to the latest version of GarageBand!\r\nNo prior experience needed!\r\nUntuk siapa kursus ini:\r\nAnyone musician or hobbyist who wants to learn how to start making music in GarageBand\r\nBeginners who want to write and record music for the first time!', 'garageband.jpg'),
('KA003', 'Adobe Indesign', 'MN003', 375000, 0, '', 0, '\r\nPada courses membuat layout majalah dengan menggunakan Adobe Indesign ini Anda akan belajar tentang cara membuat layout majalah multi panel design dengan menggunakan program perangkat lunak Adobe Indesign CC 2018. Adapun materi yang akan dipelajari adalah tentang perencanaan layout/tata letak, Menu, Control Panel, Tools, Panels, Worksheet, Pages & Master Pages, Insert Text, Image Placing, Color Fill, dan Basic Shape.\r\n\r\n\r\n\r\nApa yang akan Anda pelajari\r\nPerencanaan layout/tata letak\r\nMenu\r\nControl Panel\r\nTools\r\nPanels\r\nWorksheet\r\nPages & Master Pages\r\nInsert Text\r\nImage Placing\r\nColor Fill\r\nBasic Shape\r\nApakah ada syarat atau prasyarat kursus?\r\nKomputer sudah terinstal Adobe Indesign CC 2018\r\nUntuk siapa kursus ini:\r\nPemula dalam membuat layout majalah dengan menggunakan aplikasi adobe indesign', 'adobeindesign.png'),
('KA004', 'Semiotika Visual', 'MN004', 550000, 0, '', 0, 'Dalam course ini akan belajar bagaimana kita merancang iklan dengan semiotika visual lalu mengkreasikan iklan tersebut agar dapat menarik target audience. Semiotika adalah ilmu tentang tanda-tanda dan tentang kode kode yang dipakai untuk memahaminya. Semiotika merupakan sains yang dapat diterapkan untuk berbagai bidang kehidupan yang berbeda. Beberapa semiotisi bahkan mengatakan bahwa semiotika adalah satu disiplin utama yang dapat dipakai untuk menerangkan setiap aspek komunikasi.\r\n\r\nApa yang akan Anda pelajari\r\nCreating Visual Semiotic\r\nIcon\r\nSymbol\r\nIndex\r\nAnalogy & Metaphor\r\nApakah ada syarat atau prasyarat kursus?\r\nNo\r\nUntuk siapa kursus ini:\r\nBeginner', 'semiotika.jpg'),
('KA005', ' Internet of Things (IoT)', 'MN005', 350000, 0, '', 0, 'This is the third course in the PTC IoT Series. It focuses on describing how the Internet of Things is transforming market segments and associated business strategies. In particular, we will investigate how smart, connected products are transforming traditional industry boundaries and creating new market segments called IoT Settings.\r\n\r\nThe course in intended to be completed within 3-4 hours. We include academic research, industry case studies, and incorporate eLearning best practices in order to provide you with an engaging and worthwhile learning experience.\r\n\r\nIf you want to get a basic understanding how industry boundaries are changing and new markets are evolving that impact product development decisions, B2B relationships, and apply this knowledge in an IoT use case this course is for you!\r\n\r\nApa yang akan Anda pelajari\r\nUnderstand how smart, connected products are transforming industry boundaries\r\nLearn about nine IoT Settings that provide a framework for business strategy and marketing\r\nApply your knowledge of IoT Settings in the development of a simple IoT use case diagram\r\nAccess current industry and academic research and resources\r\nApakah ada syarat atau prasyarat kursus?\r\nRecommended: complete Microcourse #1 and #2 of the PTC IoT Series\r\nUntuk siapa kursus ini:\r\nThis IoT course is designed for people who want to understand how business markets and associated strategies are changing as a result of smart, connected product innovations\r\nThis course is especially pertinent for people involved with business, marketing, and product development strategy', 'iot.jpg'),
('KA006', 'PEMROGRAMAN WEB', 'MN001', 5000, 0, '', 0, 'abc', '43.jpg'),
('KA007', 'aplin', 'MN001', 230000, 0, '', 0, 'memasak dan makanamn', 'steph Curry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id_materi` varchar(5) NOT NULL,
  `fk_kelas` varchar(5) NOT NULL,
  `nama_materi` varchar(50) NOT NULL,
  `url_youtube` text NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `status_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `fk_kelas`, `nama_materi`, `url_youtube`, `deskripsi_materi`, `status_materi`) VALUES
('MA001', 'KA001', 'Introduction', 'https://www.youtube.com/embed/0geac7m5TqY', 'In this course you will Learn to master Adobe Photoshop, the number one tool in the world for image processing and digital retouching.By taking this course, you\'ll learn to use Adobe Photoshop from scratch through a series of practical lessons that will help you understand how the tools in Photoshop work and what are the best recommended settings for each tool.You\'ll start by getting to know Adobe Photoshop\'s interface and its main tools. You\'ll learn to manage and combine documents, work with layers and selections and masks these are basically the most used tools in Photoshop.Then you\'ll dive into the world of photomontage and learn image size, resolution fundamentals and transformations so that you can make your Imaginary designs or ideas come to life.Later, you\'ll discover the vast world of options that Photoshop brushes offer.You\'ll also learn how to use the retouching tools to reconstruct, clean up and improve your photographs and images with a realistic finish.Finally, I will explain how to properly apply adjustment layers. Using these, you can do a detailed light and shadow treatment and adjust the color to your project\'s needs.', 0),
('MA002', 'KA001', 'Iris Blur', 'https://www.youtube.com/embed/rf9ynYJq1Bc', 'Iris Blur is the second of the five blur filters in the Blur Gallery available in Photoshop CC and later, but it was first introduced as one of three filters in Photoshop CS6. It enables you to achieve what the Field Blur does (add depth of field to flat images), but with more control.This tutorial will show you how to use the Iris Blur filter to achieve an out-of-focus effect, use multiple pins and smart filters, and get a bokeh effect.', 0),
('MA003', 'KA001', 'Field Blur', 'https://www.youtube.com/embed/lcXwoZ2BHEs', 'It basically enables you to add depth of field to flat images, and build a gradient of blurs using multiple blur points with different amounts of blur.This tutorial will show you how to use the Field Blur filter to make photos look more interesting by creating out-of-focus areas, along with masks and selections, plus a cool and easy way to create awesome bokeh effects.', 0),
('MA004', 'KA001', 'Lens Blur', 'https://www.youtube.com/embed/Da8lR9fkXBI', 're you looking to achieve that creamy, background blur and shallow depth of field in your image that you were not quite able to achieve in camera?  It is definitely possible to do this in Photoshop and I am going to show you how.Adding blur to your image during post-processing can create the illusion of a shallower depth of field than what occurred in camera.  As with any photography technique, this effect can be used subtly or dramatically, depending on your style.There are several different blur filters in Photoshop, and in this tutorial we will be looking at the Lens Blur Filter.', 0),
('MA005', 'KA001', 'Tilk-Shift Blur', 'https://www.youtube.com/embed/yC3ypG_T64A', 'The Tilt-Shift Blur is the third of the five blur filters in the Blur Gallery available in Photoshop CC and later, but it was first introduced as one of three filters in Photoshop CS6.Tilt-shift photography is a way of giving subjects of a photo a miniature look. That\'s achieved by selectively focusing and defocusing parts of the image through manual tilting and shifting the camera lens, creating a shallow depth of field that\'s similar to macro photography. In this tutorial, you\'ll learn how to use the Tilt-Shift filter to achieve the miniature effect and add a bokeh effect.', 0),
('MA006', 'KA001', 'Surface Blur', 'https://www.youtube.com/embed/WN9jXe3WLUs', 'The Surface Blur filter blurs an image while preserving edges. This filter is useful for creating special effects and for removing noise and graininess. The Radius option specifies the size of the area sampled for the blur. The Threshold option controls how much the tonal values of neighboring pixels must diverge from the center pixel value before becoming a part of the blur. Pixels with tonal value differences less than the Threshold value are excluded from the blur.', 0),
('MA007', 'KA001', 'Smart Blur', 'https://www.youtube.com/embed/0geac7m5TqY', 'The Smart Blur filter precisely blurs an image. You can specify a radius to determine how far the filter searches for dissimilar pixels to blur, a threshold to determine how different the pixels’ values must be before they are eliminated, and a blur quality. You can also set a mode for the entire selection (Normal) or for the edges of color transitions (Edge Only and Overlay Edge). Where significant contrast occurs, Edge Only applies black-and-white edges and Overlay Edge applies white.', 0),
('MA008', 'KA002', 'Class Intro', 'https://www.youtube.com/embed/SiA7TbD7CFM', 'In GarageBand, you can make use of several workflow features when recording voices, instruments, and software instruments—including take recording and recording to multiple audio and software instrument tracks. Later, you can preview the take recordings and choose which one you want to use in the project.', 0),
('MA009', 'KA002', 'Garageband In 5 Minutes', 'https://www.youtube.com/embed/_Cylo6-3-Kc', 'This course is designed to take you on a step-by-step journey through the entire lifecycle of your song.  We\'ll learn how to write, record, edit, mix, and master your music with high quality!In section 1, we\'ll start by mastering the basics of the GarageBand interface and then discover the powerful songwriting tools that GarageBand offers you for creative, dynamic songwriting.In section 2, we\'ll dive into the tools that GarageBand offers for producing- recording, editing, mixing, & mastering- your music with high quality (and have a lesson on how to share & sell your music online for free)!Don\'t worry!  If any of these topics intimidate you, we are going to break down each one of them in detail and make them easy to understand and simple to execute in your projects.  You do NOT have to have any prior knowledge of GarageBand or music production to master the content in this course!\r\n', 0),
('MA010', 'KA002', 'Software Instruments', 'https://www.youtube.com/embed/oWWfEHdQv04', 'Play software instruments in GarageBand on PC.You can play your selected software instrument using musical typing or the onscreen keyboard. You can also use a music keyboard.Different music keyboards have different levels of “sensitivity.” A keyboard’s sensitivity affects how hard you have to press the keys on the keyboard to play the highest velocity level of a software instrument. If you use a music keyboard to play software instruments, you can increase the keyboard sensitivity so that playing softer produces higher velocity levels, or decrease the keyboard sensitivity so that higher velocity levels require playing harder.If you have a device with a Touch Bar, you can play the software instrument on the selected software instrument track using the Keyboard screen and play drum kits and percussion instruments on the selected Drummer track using the Drum Pads screen.', 0),
('MA011', 'KA002', 'The Session Drummer', 'https://www.youtube.com/embed/pOZTxaoqpsQ', 'One of GarageBand 10‘s key features, the Drummer track actually debuted in Apple’s premium recording program – Logic Pro X – first.While the Drummer track interface can look a little daunting at first, I’m happy to report that once you’ve gotten over that initial learning curve, the Drummer track is an incredibly useful tool.It’s one of my favourite and most used features in GarageBand.The sheer amount of variety on offer and ease of use means that you can easily create an original sounding drum track in next to no time.In this updated video tutorial I cover everything you need to create, edit and mix the perfect Drummer track that will make your projects sound fantastic!', 0),
('MA012', 'KA002', 'Editing ', 'https://www.youtube.com/embed/6eYEqNic3a0', 'GarageBand is an ideal software package—easy to use, included on every Mac, and capable of editing interviews quickly. The process of editing audio content by editing waveforms is standard across all audio programs. The actual mechanics for making the edit may differ, but every software package will include a way to cut out unwanted material and join the sound you want to use.This tutorial provides an introduction to audio editing through GarageBand.You can download the raw file, a rough edit and the finished audio of the file used in this tutorial from the Apple web site. The files are in the right column.', 0),
('MA013', 'KA002', 'Track Effects', 'https://www.youtube.com/embed/rkDFS-3YPEM', 'How to add effects to part of a track in GarageBand iOS (Automate effects)Plug-ins and effects in GarageBand iPhone and GarageBand iPad are as awesome way to add some variety and punch to your mix, but have you ever wanted to add an effect to just one part of a track?In this video, I show you how to add effects or plug-ins to just one part of a track, by duplicating the original track, moving part of the audio, and then adjust the settings on the second track.Related videos about plug-ins, effects and automation are in the links below.', 0),
('MA014', 'KA002', 'Bonus Lecture', 'https://www.youtube.com/embed/eFPfe_0LSIk', 'A Bonus Lecture is the last lecture of the course, posted after the rest of the course materials. This space can be used to market your other courses, products, and services to students. It is considered a marketing tool for instructors.Instructors typically use the Bonus Lecture to provide coupon codes, course referral links, external links to other products and services, and affiliate links to supplementary course materials.', 0),
('MA015', 'KA003', 'Pendahuluan', 'https://www.youtube.com/embed/HiKC-yznq9c', 'Majalah  merupakan  salah  satu  media  cetak  yang  digemari  oleh  masyarakat Indonesia.  Majalah  yang  diterbitkan  secara  berkala (mingguan,  dwimingguan atau bulanan) ini berisi berbagai macam artikel dalam subjek yang bervariasi, yang ditujukan kepada masyarakat umum dan ditulis dengan gaya bahasa yang mudah dipahami oleh banyak orang.Majalah terdiri dari beberapa jenis, seperti majalah perusahaan, majalah wanita, majalah  mode,  majalah  remaja,  majalah  anak  dan  lain  sebagainya.    Majalah memang tak hanya populer dikalangan ibu-ibu dan para remaja, anak-anak pun banyak yang menyukai  membaca  majalah. Majalah menjadi salah satu media bagi mereka untuk mendapatkan informasi sekaligus hiburan. ', 0),
('MA016', 'KA003', 'Membuat Cover Dan Master Page', 'https://www.youtube.com/embed/eXIHPd239D8', 'Di Indonesia ada salah satu majalah yang ditujukan untuk anak perempuan usia 8-14  tahun,  yaitu  majalah  Girls.  Mengapa  majalah  Girls?  Majalah  Girls merupakan pelopor dan satu-satunya majalah untuk anak perempuan usia 8-14 tahun yang ada di Indonesia. Melalui kesempatan ini penulis ingin mencari tahu apakah  penggunaan  prinsip layout  dan grid  di  dalam  majalah  Girls  sudah dilakukan dengan baik? Dan bagaimana dengan pemilihan warna untuk di setiap halaman majalahnya. ', 0),
('MA017', 'KA003', 'Memasukkan Text Dan Image Placing', 'https://www.youtube.com/embed/Q9gb2zw0EG8', 'Menambahkan gambar ke dalam dokumen Anda bisa menjadi cara yang baik menggambarkan informasi penting, dan memberikan kesan dekoratif pada teks. Ini digunakan sebagai moderasi, karena gambar dapat meningkatkan keseluruhan tampilan dokumen Anda.', 0),
('MA018', 'KA003', 'Materi Tambahan Tentang Website', 'https://www.youtube.com/embed/sdvrES6S8Tk', 'Perkembangan internet dari tahun ke tahun mengalami peningkatan dari sisi pengguna aktifnya. Setiap orang tentu mengakses internet dengan menggunakan berbagai perangkat, mulai dari desktop, mobile, hingga tablet. Dan website adalah salah satu media yang paling sering untuk diakses dan digunakan dalam mencari berbagai informasi dan sarana komunikasi', 0),
('MA019', 'KA004', 'Introduction', 'https://www.youtube.com/embed/LV_34egKbLk', 'Iklan Online (Online Advertising) adalam metode periklanan yang menggunakan internet dan World Wide Web dengan tujuan menyampaikan pesan pemasaran (promosi) untuk menarik pelanggan. Meskipun kata itu sendiri menggambarkan hanya satu agenda, iklan online biasanya dibagi menjadi bebrapa bagian atau teknik. Menurut para Professional Internet Advertising, iklan online meliputi beberapa teknik, seperti iklan kontekstual pada halaman hasil mesin pencari (search engine), iklan banner (banner ads), Rich Media Ads (periklanan dengan melibatkan media interaktif digital, seperti audio dan video streaming), iklan jaringan sosial (social network advertising), iklan online berdasarkan klasifikasi (online classified advertising), jaringan periklanan (advertising nerworks) dan e-mail marketing, bahkan e-mail spam.', 0),
('MA020', 'KA004', 'UMN Digital Learning', 'https://www.youtube.com/embed/zY2QreRzgdw', 'Adapun beasiswa ini datang dari Universitas Multimedia Nusantara (UMN) yang menggandeng BenihBaik.com, sebuah platform crowdfunding tepercaya menghadirkan Program Beasiswa Indonesia Go Digital bertema \"Bersama Cerdaskan Bangsa Indonesia\". Hanya saja, program ini memberikan peluang bagi masyarakat Indonesia yang ingin melanjutkan pendidikan ke bangku perkuliahan namun terkendala dengan finansial. Program ini bertujuan untuk memberikan akses Pendidikan S1 Digital Learning Strategic Communication yang fleksibel dan terjangkau. Rektor UMN Ninok Leksono menyatakan, program beasiswa ini sebenarnya sudah dipersiapkan sebelum pandemi Covid-19.\r\n', 0),
('MA021', 'KA004', 'Icon ', 'https://www.youtube.com/embed/IRadcZr5yAs', 'Iklan   dapat   diartikan   sebagai   bentuk   kegiatan   dalam menarik    perhatian    dan    membujuk    sebagian    atau    seluruh masyarakat   untuk   mengambiltindakan   dalam   merespon   ide, barang,  atau  jasa  yang  dipresentasikan. Secara  sederhana  iklan didefinisikan sebagai pesan  yang  menawarkan suatu produk  atau jasa   yang   ditujukan   kepada   masyarakat   lewat   suatu   media. Namun  demikian,  untuk  membedakannya  dengan  pengumuman biasa,  iklan  lebih  diarahkan  untuk  membujuk.Akhir-akhir  ini perkembangan iklan begitu pesat dan marak bermunculan baik itu dalam  media  cetak,  elektronik,  media  online  maupun  media  luar ruang.  Iklan mengandung  pesan  komunikasi  yang  mudah  diingatdan  dipahami  oleh  setiap  orang  yang  membaca,  melihat,  dan mendengarnya.  Pesan  yang  terdapat  dalam  iklan  secara  mental tersimpan  dalam  memori  atau  benak  setiap  orang  dengan  hanya melihat visualisasinya atau mendengar tagline yang terdapat pada iklan tersebut. ', 0),
('MA022', 'KA004', 'Symbol', 'https://www.youtube.com/embed/dTlL-BZfE9k', 'Visual   dan   tagline   merupakan   sebuah   kesatuan   yang berkesinambungan  pada  sebuah  iklan,  karena  dalam  visual  dan tagline  terkandung  unsur  pesan  yang  dirancang  sedemikian  rupa supaya  menarik  dan  mudah  diingat.  Pesan  yang  dirancang  harus Rhenald  Kasali, Manajemen  periklanan  :  konsep  dan  aplikasinya di Indonesia, (Jakarta : Pustaka Utama Grafiti, 1992), h. 9.\r\n2 mencerminkan  produk  itu  sendiri.  Pilihan  target  sasaran  yang akan dicapai, visual dan tagline-nya memunculkan suatu karakter iklan  secara  utuh  dan         „menyentuh‟  sehingga  pesan  tersebut mudah  dipahami  oleh  setiap  target  pesan-nya.  Belum  lama  ini produk  air  mineral  Aqua  meluncurkan kampanye bertajuk ”Saya Indonesia”.', 0),
('MA023', 'KA004', 'Index', 'https://www.youtube.com/embed/oTN_JrL00ls', 'Dengan    ilustrasi,    maka    pesan    menjadi    lebih berkesan,  karena  pembaca  akan  lebih  mudah  mengingat gambar  dari  pada  kata  -  kata  atau  teks  yang  terkandung  di dalam suatu media iklan . Ilustrasi tangan (Hand Drawing) . Yaitu  gambar  teknik  ilustrasi  dengan  cara  mengandalkan keterampilan  tangan  sepenuhnya  baik   itu   menggunakan kuas,   Ada   beberapa   fungsi   dari   ilustrasi   tangan.Yaitu, sebagai    simbolisasi,    menggambarkan    sebuah    suasana, menggambarkan    sesuatu    yang    membangkitkan    selera humor,  untuk  pengganti  foto.Ilustrasi  dalam  Fotografi.', 0),
('MA024', 'KA004', 'Analogy And Metaphor', 'https://www.youtube.com/embed/1Is_1YK_iV4', 'Metaphors, similes, and analogies are three literary devices used in speech and writing to make comparisons. Each is used in a different way.Identifying the three can get a little tricky sometimes: for example, when it comes to simile vs. metaphor, a simile is actually a subcategory of metaphor, which means all similes are metaphors, but not all metaphors are similes.Knowing the similarities and differences between metaphor, simile, and analogy can help make your use of figurative language stronger.', 0),
('MA025', 'KA005', 'Course Overview', 'https://www.youtube.com/embed/W6lM5gLARf8', 'The Internet of Things (IoT) is changing how we live, work, travel, and do business. It is even the basis of a new industrial transformation, known as Industry 4.0, and key in the digital transformation of organizations, cities, and society overall. Reason enough to understand the essence of the Internet of Things.', 0),
('MA026', 'KA005', 'Business Expanding', 'https://www.youtube.com/embed/Ac47nu4ULnc', 'While the Internet of Things starts with the infrastructure of connected things, both its benefits and risks are mainly related to the network technologies, systems, and applications built upon this underlying layer. In theory, anything can be connected to the Internet using IoT technologies: physical objects and living creatures, including animals and people as ‘beings’. All things or connected components of more complex physical objects can be uniquely identified and addressed via the Internet of Things.', 0),
('MA027', 'KA005', 'Lecture 3', 'https://www.youtube.com/embed/ZBc6JjNEUeE', 'Examples of things range from consumer-oriented devices such as wearables and smart home solutions (Consumer IoT) to connected equipment in the enterprise (Enterprise IoT) and industrial assets such as machines, robots, or even workers in smart factories and industrial facilities (Industrial IoT, the essential component of Industry 4.0). ', 0),
('MA028', 'KA005', 'Lecture 4', 'https://www.youtube.com/embed/a1qQz7B528U', 'IoT is an umbrella term with many use cases, technologies, standards and applications. Moreover, it’s part of a bigger reality with even more technologies. The things and data are the starting point and essence of what IoT enables and means. IoT devices and assets are equipped with electronics, such as sensors and actuators, connectivity/communication electronics and software to capture, filter and exchange data about themselves, their state and their environment.', 0),
('MA029', 'KA005', 'Lecture 5', 'https://www.youtube.com/embed/9kQyX2qf0Dg', 'The connection of IoT ‘things’ and usage of IoT data enables various improvements and innovations in the lives of consumers, in business, healthcare, mobility, cities and society. The potential goals of IoT are often segmented into IoT use cases: reasons for which IoT is deployed. Examples: health monitoring, asset tracking, environmental monitoring, predictive maintenance and home automation.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
CREATE TABLE `mentor` (
  `id_mentor` varchar(5) NOT NULL,
  `fk_user` varchar(5) NOT NULL,
  `namalengkap_mentor` varchar(60) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `notelp_mentor` varchar(50) NOT NULL,
  `jk_mentor` varchar(2) NOT NULL,
  `status_mentor` int(1) NOT NULL,
  `alamat_mentor` varchar(100) NOT NULL,
  `tg_lahirmentor` date NOT NULL,
  `img` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id_mentor`, `fk_user`, `namalengkap_mentor`, `skill`, `notelp_mentor`, `jk_mentor`, `status_mentor`, `alamat_mentor`, `tg_lahirmentor`, `img`) VALUES
('MN001', 'US011', 'Michelle Annabelle', 'Programmer', '0813123412', 'P', 0, 'Jl.Babatan Pantai XII No.44', '2001-06-06', 'teachers4.jpg'),
('MN002', 'US012', 'Felia Gabriela', 'Ceo of Business Company', '084565262645', 'P', 0, 'Jl.Kedung Baruk 10', '2001-07-01', 'teachers6.jpg'),
('MN003', 'US013', 'Hans Leo', 'Art Designer', '084556502612\'', 'L', 0, 'Jl.Pakuwon Indah Permai IX', '2001-04-04', 'teachers5.jpg'),
('MN004', 'US014', 'Jessica Anjani', 'Pelukis', '0315648486', 'P', 0, 'Jl.Indah Segar 12i', '2001-02-01', 'teachers7.png'),
('MN005', 'US015', 'Ben Auguere', 'Program Designer', '0821312412112', 'L', 0, 'Jl.Rungkut Permai 2/30', '2001-08-14', 'teachers13.png'),
('MN006', 'US016', 'Suhatati', 'Guru Akuntansi', '0312141431441', 'P', 0, 'Jl.Era Galaxy', '1995-06-02', 'teachers11.jpg'),
('MN007', 'US017', 'Joan Hartono', 'Struktur Data Analys', '084556584556', 'L', 0, 'Jl.Puncak Permai Utara', '1998-04-30', 'teachers10.jpg'),
('MN008', 'US018', 'Junaedi Santoso', 'Master of Design Pattern ', '084562645456', 'L', 0, 'Jl.Ngagel Jaya Utara', '1992-07-14', 'teachers9.jpg'),
('MN009', 'US019', 'Jono', 'Public Speaker', '03187878656', 'L', 0, 'Jl.Sekar Wangi 10', '1992-01-22', 'teachers12.jpg'),
('MN010', 'US020', 'Jonie', 'Bussines Man', '08456565626', 'L', 0, 'Jl.Panjang Lebar XX', '2000-04-04', 'teachers8.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `fk_kelas` varchar(5) NOT NULL,
  `tgl_trans` date NOT NULL,
  `subtotal` int(10) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `fk_user` varchar(5) NOT NULL,
  `bukti` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `fk_kelas`, `tgl_trans`, `subtotal`, `pembayaran`, `status`, `fk_user`, `bukti`) VALUES
(1, 'KA001', '2021-05-08', 375000, 'Ovo', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(2, 'KA002', '2021-05-19', 375000, 'ShoppePay', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(3, 'KA003', '2021-05-21', 375000, 'Mandiri', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(4, 'KA002', '2021-05-07', 85000, 'Bca', '1', 'US002', '5309-quickgrid_2021524182726219.png'),
(5, 'KA001', '2021-05-07', 375000, 'Ovo', '1', 'US003', '5309-quickgrid_2021524182726219.png'),
(6, 'KA006', '2021-05-26', 5000, 'Mandiri', '0', 'US001', '5309-quickgrid_2021524182726219.png'),
(7, 'KA003', '2021-05-26', 375000, 'Ovo', '0', 'US001', '5309-quickgrid_2021524182726219.png'),
(13, 'KA002', '2021-05-26', 85000, 'Bca', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(14, 'KA001', '2021-05-26', 0, 'Mandiri', '0', 'US002', '5309-quickgrid_2021524182726219.png'),
(15, 'KA005', '2021-05-26', 0, 'Mandiri', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(16, 'KA005', '2021-05-26', 350000, 'Ovo', '1', 'US001', '5309-quickgrid_2021524182726219.png'),
(17, 'KA007', '2021-06-01', 230000, 'Ovo', '0', 'US001', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `role`) VALUES
('US001', 'yohanestirto@gmail.com', '$2y$10$QkCRIihLVkfZIu33a9bIY.0v1ZflEDmw8o9rvl6I2Aa0TuNvbRSo6', 0),
('US002', 'nicholasandry@gmail.com', '$2y$10$4KL/MZmK3j7LoxmnB4nTo.qVCQ7v4NOeooRI.JGINdQWrc6mEd7G.', 0),
('US003', 'michaeljonathanmj@gmail.com', '$2y$10$EXm59/ijCeU3LGXYMkGlnOqwBwZ4vdyLGDLVWXRlcSGIn/sbZXmtu', 0),
('US004', 'michaelevan@gmail.com', '$2y$10$swPj7CZpNvoz71KzaS9EweW9Zda3KyHO8fTbmZn65zu8SQrID.csG', 0),
('US005', 'bryansteven@gmail.com', '$2y$10$nHZlT3UX7Fqd03oXJFq7nuR5sEP1axAHt6bSxy2uXu3Edgox9azFG', 0),
('US006', 'ivanaubrey@gmail.com', '$2y$10$i8ENpxU2ch5e85sbUYBEp.tnM19RW9UH4ux0lBqY5Cn25Bi3fdghe', 0),
('US007', 'salohcin@gmail.com', '$2y$10$UiRWmy974eVULuFv1wys8OuTBEpISSWD4eIE8j3F9SLNLpcJaQ8wS', 0),
('US008', 'senahoy@gmail.com', '$2y$10$N6VJSfy6DM3G2a20hdVEvOFC3D091FST.9H/byK4F5.XFnWCK4Yd2', 0),
('US009', 'jestinesiewij@gmail.com', '$2y$10$9XqpAS/ACL8ZujrpWAs6GuQpHnml94Q3YLdvAHIZXmnzCylg37GAK', 0),
('US010', 'michellehan@gmail.com', '$2y$10$fwXX2Rw5/PBqyHKkhGhIGOO4PCdmiZIpr/x4EcmBcN.xvz4QC6ILa', 0),
('US011', 'michelleannabelle@gmail.com', '$2y$10$QHI4KIVUr8aHZenLas3Tx.IgOjKOoMWSY1H22oYxapof6nxBJ9lfG', 1),
('US012', 'feliagabriela@gmail.com', '$2y$10$qC5Q.M6CySf8mpZxU4I74esOtLHp9naL0dpMgObko7Axp9OlIjUcO', 1),
('US013', 'hansleo@gmail.com', '$2y$10$53ER4KHL6PID0NdKQhG7S.V439/DjBvSOs4BegLrvCZunqCC2kPm.', 1),
('US014', 'jessicaanjani@yahoo.com', '$2y$10$5FeMXsM1JQlbOx/H1CzQpeaU6WvANQQRsik7JWTtLwkBY3SeW7waS', 1),
('US015', 'benauguere@gmail.com', '$2y$10$kUzd5X0I4gRPAAI8TYkibuXiQi5kUfpJHPBBV11igVq0nmX7Mkvw2', 1),
('US016', 'suhatati@gmail.com', '$2y$10$4399ATSE7s/VpPPLztVCiujzbxYrcgDZSISzCDLl1ZePJ5D/UOHq2', 1),
('US017', 'joanhartanto@gmail.com', '$2y$10$PBYOWjM2Yf4IEf/62eplqejairO6MUbhgT7dCSusz037X3lY2mnbe', 1),
('US018', 'junaedisantoso@gmail.com', '$2y$10$0fDMOWeFzYYpbc.wtgIp8OljurJsqPKcqv3ViaEAWwhAN7ngy3Voe', 1),
('US019', 'jono@gmail.com', '$2y$10$WBhgzCmdOUhyMwjujTuj5u7zdoIN8Zmxw6QxbDKPAw.EUAVTUAVoW', 1),
('US020', 'jonie@gmail.com', '$2y$10$8g1jLCoF2NUQpi9QYDyaYOFSYHQePJG/RlMOTrpA.xUziO518oCX6', 1),
('US021', 'ivanaubrey22@gmail.com', '$2y$10$Rd7dOZ4o/WuDqMRT9xHrzeI0JSNpZk0YLlBgM22JcrwIObY178SM2', 0),
('US022', 'a@gmail.com', '$2y$10$tPS9DhajSo..MJh4OaQyb.Cr98koO84PKU1AILGrVc9z2p5VpcisK', 0),
('US023', 'yono@gmail.com', '$2y$10$bW5iLdwkPnjUE8YKz.kWt.s591/GkUcYuFwBwcC1tfGOHkj6QR6bO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashback`
--
ALTER TABLE `cashback`
  ADD PRIMARY KEY (`id_cashback`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `d_forum`
--
ALTER TABLE `d_forum`
  ADD PRIMARY KEY (`id_dforum`),
  ADD KEY `fk_hforum` (`fk_hforum`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `h_forum`
--
ALTER TABLE `h_forum`
  ADD PRIMARY KEY (`id_hforum`),
  ADD KEY `fk_customer` (`fk_customer`),
  ADD KEY `fk_kelas` (`fk_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_mentor` (`fk_mentor`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_kelas` (`fk_kelas`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `fk_kelas` (`fk_kelas`),
  ADD KEY `transaksi_ibfk_1` (`fk_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_forum`
--
ALTER TABLE `d_forum`
  MODIFY `id_dforum` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_forum`
--
ALTER TABLE `h_forum`
  MODIFY `id_hforum` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `d_forum`
--
ALTER TABLE `d_forum`
  ADD CONSTRAINT `d_forum_ibfk_1` FOREIGN KEY (`fk_hforum`) REFERENCES `h_forum` (`id_hforum`),
  ADD CONSTRAINT `d_forum_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `h_forum`
--
ALTER TABLE `h_forum`
  ADD CONSTRAINT `h_forum_ibfk_1` FOREIGN KEY (`fk_customer`) REFERENCES `customer` (`id_cust`),
  ADD CONSTRAINT `h_forum_ibfk_2` FOREIGN KEY (`fk_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`fk_mentor`) REFERENCES `mentor` (`id_mentor`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`fk_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
