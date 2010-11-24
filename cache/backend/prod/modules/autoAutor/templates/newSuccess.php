<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Autor/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Autor', array(), 'messages') ?></h1>

  <?php include_partial('Autor/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Autor/form_header', array('autor' => $autor, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Autor/form', array('autor' => $autor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Autor/form_footer', array('autor' => $autor, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
