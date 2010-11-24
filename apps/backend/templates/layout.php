<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo url_for('@homepage') ?>">
            <img src="/images/head_logo.jpg" alt="Votainteligente" />
          </a>
        </h1>
      </div>
 
      <div id="menu">
        <ul>
          <li>
            <?php echo link_to('Debate', 'debate') ?>
          </li>
          <li>
            <?php echo link_to('Sesion', 'sesion') ?>
          </li>
          <li>
            <?php echo link_to('Comision', 'comision') ?>
          </li>
          <li>
            <?php echo link_to('ProyectoLey', 'proyecto_ley') ?>
          </li>
          <li>
            <?php echo link_to('Parlamentario', 'parlamentario') ?>
          </li>
          <li>
            <?php echo link_to('Autor', 'autor') ?>
          </li>
          <li>
            <?php echo link_to('Partido', 'partido') ?>
          </li>
          <li>
            <?php echo link_to('Materia', 'materia') ?>
          </li>
          <li>
            <?php echo link_to('Votacion', 'votacion') ?>
          </li>
          <li>
            <?php echo link_to('VotacionComision', 'votacion_comision') ?>
          </li>
          <li><?php if ($sf_user->isAuthenticated()) echo link_to('Logout', '@sf_guard_signout'); ?></li>
        </ul>
      </div>
 
      <div id="content">
        <?php echo $sf_content ?>
      </div>

    </div>
  </body>
</html>
