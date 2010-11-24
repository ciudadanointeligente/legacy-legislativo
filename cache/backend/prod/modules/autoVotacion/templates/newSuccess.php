<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Votacion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Votacion', array(), 'messages') ?></h1>

  <?php include_partial('Votacion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Votacion/form_header', array('votacion' => $votacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Votacion/form', array('votacion' => $votacion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Votacion/form_footer', array('votacion' => $votacion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
