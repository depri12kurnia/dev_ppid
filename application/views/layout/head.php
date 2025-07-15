<?php
// Site
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo strip_tags($site_info->tentang) . ', ' . $title ?>">
    <meta name="keywords" content="<?php echo $site_info->keywords . ', ' . $title  ?>">
    <meta name="author" content="<?php echo $site_info->namaweb ?>">
    <meta name="keywords" content="PPID Jakarta III">

    <!-- icon -->
    <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
    <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Plugin css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/animate.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/flexslider.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/jquery.nstSlider.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/lightcase.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/fonts/flaticon.css" />

    <!-- own style css -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@313fb5f53bf7f828ec1367d10b1b50392488b6d5/assets/css/style.css" media="all" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/rtl.css" media="all" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/responsive.css" media="all" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/responsive.css'); ?>" media="all" />
    <!-- end own style css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/css/swiper.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/select2/css/select2.min.css">
    <!-- dflip StyleSheet -->
    <link href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/dflip/css/dflip.min.css" rel="stylesheet">
    <!-- dflip Icons Stylesheet -->
    <link href="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/dflip/css/themify-icons.min.css" rel="stylesheet">
    <!-- Flaticon -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css" media="screen">
        p {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!--Klik kanan dan Shortcut-->
    <!-- <script type="text/javascript">
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        }, false);
       
        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12') {
                e.preventDefault();
            }
            if (e.ctrlKey && (e.shiftKey && (e.key === 'I' || e.key === 'J')) || e.key === 'U') {
                e.preventDefault();
            }
        }, false);
    </script> -->