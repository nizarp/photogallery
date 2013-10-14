<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title><?php echo $title ?></title>
   <?php echo link_tag('css/main.css'); ?>
   <?php echo script_tag('/js/lib/jquery-1.6.2.min.js'); ?>
 </head>
 <body>
     <?php $userData = $this->session->userdata('logged_in'); ?>
     <div id="page">
         <div class="page-header">
            <h1 class="logo"><a href="/">Photo Gallery</a></h1>
            <ul>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/home" 
                       <?php echo ($tab == 'Home') ? 'class="menu-active"' : '' ?> >Home</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/album"
                       <?php echo ($tab == 'Albums') ? 'class="menu-active"' : '' ?> >Albums</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/photo"
                       <?php echo ($tab == 'Photos') ? 'class="menu-active"' : '' ?> >Photos</a></li>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/search" 
                       <?php echo ($tab == 'Search') ? 'class="menu-active"' : '' ?> >Search</a></li>
                <? if($userData['username'] == 'admin'): ?>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/user/edit"
                       <?php echo ($tab == 'My Account') ? 'class="menu-active"' : '' ?> >My Account</a></li>
                <? endif; ?>
                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/user/logout">Logout</a></li>
            </ul>
        </div>
        <div class="content"> 