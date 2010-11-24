<div class="sexy-bookmarks" style="padding:0px 0 20px 0px !important; display:block !important; clear:both !important; height:29px;" id="sexy-bookmarks">

  <ul id="socials" class="socials">

  <li class="sexy-facebook"><a href="http://www.facebook.com/share.php?u=<?php echo urlencode($link).'&t='.urlencode('Sigue el debate del proyecto '.$titulo) ?>" target="_blank" rel="" title="Compártelo en Facebook"> </a></li>

  <li class="sexy-google"><a href="http://www.google.com/bookmarks/mark?op=add&amp;bkmk=<?php echo urlencode($link).'&title='.urlencode($titulo).'&labels=votainteligente&annotation='.urlencode('Sigue el debate del proyecto '.$titulo) ?>" target="_blank" rel="" title="Agregalo a Google Bookmarks"> </a></li>

  <!--<li class="sexy-twittley"><a href="http://twittley.com/submit/?title=<?php echo urlencode('Sigue el proyecto: '.$titulo).'&url='.urlencode($link).'&desc='.urlencode('Sigue el debate del proyecto '.$titulo).'&pcat=55&dcat=59&tags=votainteligente' ?>" target="_blank" rel="" title="Compártelo en Twitter"> </a></li>-->

  <li class="sexy-twittley"><a href="http://twitter.com/?status=<?php echo urlencode('Sigue el proyecto: '.substr($titulo,0,92)); echo (strlen($titulo)>92) ? '... ' : ' '; echo file_get_contents('http://tinyurl.com/api-create.php?url='.urlencode($link)) ?>" target="_blank" rel="" title="Comparalo en Twitter"> </a></li>

  <!--<li class="sexy-twittley"><a href="http://twitter.com/?status=<?php echo file_get_contents('http://api.bit.ly/v3/shorten?login=votainteligente&apiKey=R_8607772f7d046b935d6e4363e71d9679&uri='.urlencode($link).'&format=txt').urlencode(' Sigue el debate del proyecto '.$titulo) ?>" target="_blank" rel="" title="Comparalo en Twitter"> </a></li>-->

  </ul>
</div>
