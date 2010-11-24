<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Debate/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Debate', array(), 'messages') ?></h1>

  <?php include_partial('Debate/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Debate/form_header', array('debate' => $debate, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Debate/form', array('debate' => $debate, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Debate/form_footer', array('debate' => $debate, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
