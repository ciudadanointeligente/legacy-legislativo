<?php use_helper('I18N', 'Date') ?>
<?php include_partial('VotacionComision/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit VotacionComision', array(), 'messages') ?></h1>

  <?php include_partial('VotacionComision/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('VotacionComision/form_header', array('votacion_comision' => $votacion_comision, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('VotacionComision/form', array('votacion_comision' => $votacion_comision, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('VotacionComision/form_footer', array('votacion_comision' => $votacion_comision, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
