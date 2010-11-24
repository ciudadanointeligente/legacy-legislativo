<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Votainteligente - Monitoreo Parlamentario</title>
  <?php include_metas() ?>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php
    include_javascripts();
    include_stylesheets();
  ?>
<link rel="stylesheet" type="text/css" href="../../../web/css/main.css">
</head>
<body>
<div id="container">

<!---------------- header (Joomla votainteligente.cl) ---------------->
  <div id="header">
	  <div id="headerbar">
		  <div class="floatbox ie_fix_floats">
			  <div class="mod-roundedtrans-header">
		      <div class="module">		
			      <div class="box-l">
				      <div class="box-l-ie6"></div>
			        <div class="box-r-ie6"></div>
		          <div class="box-r">
				        <div class="box-m deepest">
      						<div class="ie6">
										  <script language="javascript" type="text/javascript">
	  function iFrameHeight() {
		  var h = 0;
		  if ( !document.all ) {
			  h = document.getElementById('blockrandom').contentDocument.height;
			  document.getElementById('blockrandom').style.height = h + 60 + 'px';
		  } else if( document.all ) {
			  h = document.frames('blockrandom').document.body.scrollHeight;
			  document.all.blockrandom.style.height = h + 20 + 'px';
		  }
	  }

  </script>

  <iframe onload="iFrameHeight()"	id="blockrandom"
	  name=""
	  src="http://www.votainteligente.cl/images/stories/botonerasuperior/botonera2.html"
	  width="100%"
	  height="75"
	  scrolling="no"
	  align="top"
	  frameborder="0"
	  class="wrapperblank">
	  No Iframes</iframe>								
                  </div>
							  </div>
						  </div>
					  </div>	
				  </div>
			  </div>
		  </div>
	  </div>
	  <div id="menubar">
		  <div class="menubar-l"></div>
		  <div class="menubar-r"></div>
		  <div class="menubar-m"></div>
	  </div>
	  <div id="menu">
      <ul class="menu">
	      <li access="0" level="1" id="1">
		      <a href="http://www.votainteligente.cl/">
			      <img src="/images/joomla/bt_home.png" alt="home" />
		      </a>
	      </li>
	      <li access="0" level="1" id="5">
		      <a href="http://votainteligente.cl/index.php?option=com_content&view=article&id=73&Itemid=120">
            <img src="/images/joomla/bt_contacto.png" alt="contacto" />
		      </a>
	      </li>
	      <li access="0" level="1" id="21">
		      <a href="http://www.votainteligente.cl/index.php?option=com_content&amp;view=category&amp;layout=blog&amp;id=33&amp;Itemid=21">
			      <img src="/images/joomla/bt_acerca.png" alt="acerca-de-nosotros" />
		      </a>
	      </li>
	      <li access="0" level="1" id="38">
		      <span class="separator">
			      <img src="/images/joomla/bt_search.png" alt="separador" />
		      </span>
	      </li>
      </ul>
	  </div>
	  <div id="logo">
		  <a href="http://www.votainteligente.cl/index.php"><img src="/images/joomla/head_logo.jpg" border="0" height="126" width="300" /></a>
	  </div>
	  <div id="search" class="yootools-black">
		  <form action="http://www.votainteligente.cl/index.php" method="post">
      	<div class="module-search">
      		<input name="searchword" maxlength="20" alt="Buscar" type="text" size="20" value="buscar..."  onblur="if(this.value=='') this.value='buscar...';" onfocus="if(this.value=='buscar...') this.value='';" />
      	</div>
        <input type="hidden" name="task"   value="search" />
      	<input type="hidden" name="option" value="com_search" />
      </form>
	  </div>							
  </div>
<!---------------- /header ---------------->
 <!---------------- header inspector de intereses ---------------->
  <div id="content">
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="flash_notice">
        <?php echo $sf_user->getFlash('notice') ?>
      </div>
    <?php endif; ?>

    <?php if ($sf_user->hasFlash('error')): ?>
      <div class="flash_error">
        <?php echo $sf_user->getFlash('error') ?>
      </div>
    <?php endif; ?>

 <div id="headercomovotan" class="blockdata blockdark">
  <div id="logo"><a href="#"><img src="../../../web/images/relinteres/logo-intereses-head0.png" /></a></div>
</div>
 <div id="breadcrumbinteres"></div>
 <!---------------- /header inspector de intereses---------------->


<!---------------- sidebar buscador ------------------------------------------------>

                
<!---------------- sidebar left  ---------------->
          
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../../../../../../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
                   
<!---------------- /sidebar ---------------->

    <div id="wrapfull" >
      
        <?php echo $sf_content ?>
    
    </div>
  </div>
<!---------------- footer begin (joomla votainteligente.cl) ---------------->
<!--
<div id="footer">
	<div class="floatbox"></div>
		<div style="text-align: center;">
      <table style="width: 948px;" align="center" border="0" cellpadding="3" cellspacing="3">
      <tbody>
      <tr style="font-size: 9px;">
      <td></td>
      <td><span class="Apple-style-span"><span style="font-family: arial,helvetica,sans-serif;" class="Apple-style-span">Un&nbsp;proyecto&nbsp;de: </span></span></td>

      <td><span style="font-family: arial,helvetica,sans-serif;" class="Apple-style-span">Con&nbsp;el&nbsp;auspicio&nbsp;de:</span></td>
      <td><span style="font-family: arial,helvetica,sans-serif;" class="Apple-style-span"> Con&nbsp;el&nbsp;apoyo&nbsp;de:</span></td>
      <td style="text-align: center;"></td>
      <td style="text-align: center;"></td>
      </tr>
      <tr style="background-color: #ffffff;">
      <td style="width: 210px;"></td>
      <td style="width: 140px;" align="center"><img src="/images/logos/logo-ci.png" border="0" /></td>

      <td style="width: 150px;"><a href="http://www.soros.org/" target="_blank"><img src="/images/logos/logo-osi.png" border="0" /></a></td>
      <td style="width: 50px;"><a href="http://www.proacceso.cl/" target="_blank"><img src="/images/logos/logo-proacceso.png" border="0" /></a></td>
      <td style="width: 100px;">&nbsp;<a href="http://www.opensecrets.org" target="_blank"><img src="/images/logos/logo-opensecrets.png" border="0" /></a></td>
      <td style="width: 210px;"></td>
      </tr>
      <tr>
      <td style="padding: 4px; background-color: #ffffff;" colspan="6"><span style="font-family: arial,helvetica,sans-serif;">Síguenos en Facebook&nbsp;<a href="http://www.facebook.com/home.php#/profile.php?id=100000229212155&amp;ref=ts" target="_blank"><img src="/images/logos/facebook_logo.png" border="0" height="15" width="15" /></a> Síguenos en Twitter&nbsp;<a href="http://www.twitter.com/votainteligente" target="_blank"><img src="/images/logos/twitter_logo.png" border="0" height="15" width="15" /></a> Sigue nuestro RSS&nbsp;<a href="http://www.votainteligente.cl/index.php?format=feed&amp;type=rss" target="_blank"><img src="/images/logos/rss.png" border="0" height="15" /></a></span></td>
      </tr>
      </tbody>
      </table>
    </div>
    <div style="text-align: center;"><a href="mailto:%20info@votainteligente.cl">info @ votainteligente.cl</a>&nbsp; /&nbsp; Holanda 895 - Providencia, Santiago. Teléfono:&nbsp; 02 - 4192770.&nbsp; Código postal: 7510321</div>

    <div style="text-align: center;">&nbsp;</div>
    <div style="color: #f3f3f3; text-align: center;">.&nbsp;</div>
	</div>
</div>
-->
<!---------------- /footer ---------------->

  </div>
  <script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../../../../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
  </script>
</body>
</html>
