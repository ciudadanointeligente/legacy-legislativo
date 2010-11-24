<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : '')) ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=<?php echo sfConfig::get('sf_charset', 'utf-8') ?>" />
<meta name="title" content="Monitoreo Parlamentario" />
<meta name="robots" content="index, follow" />
<meta name="description" content="Monitoreo Parlamentario" />
<meta name="keywords" content="Monitoreo, Parlamentario, votainteligente" />
<meta name="language" content="en" />
<title>symfony project</title>

<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/css/error.css" />
<!--[if lt IE 7.]>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/sf/sf_default/css/ie.css" />
<![endif]-->

</head>
<body bgcolor="#FFFFFF">
<div class="sfTContainer">
  <a title="home" href="http://legislativo.votainteligente.cl/"><img alt="error" class="sfTLogo" src="/images/404.png" height="150" width="480" /></a>
  <div class="sfTMessageContainer sfTAlert">
    <div class="sfTMessageWrap">
      <h1>Esta página no existe</h1>
      <h5>Intentalo de nuevo dentro de unos instantes...</h5>
    </div>
  </div>

</div>
</body>
</html>
