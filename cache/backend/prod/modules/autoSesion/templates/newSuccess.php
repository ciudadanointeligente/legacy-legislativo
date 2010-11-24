<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Sesion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Sesion', array(), 'messages') ?></h1>

  <?php include_partial('Sesion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Sesion/form_header', array('sesion' => $sesion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Sesion/form', array('sesion' => $sesion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Sesion/form_footer', array('sesion' => $sesion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
