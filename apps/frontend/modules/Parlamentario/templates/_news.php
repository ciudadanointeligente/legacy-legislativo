<?php
  //google news
  $apellidos = explode(" ",$parlamentario->getApellidos());
  $news_url = 'http://news.google.cl/news?pz=1&cf=all&ned=es_cl&hl=es&q=%22'.$parlamentario->getNombre().'+'.$apellidos[0].'%22+source:%22Emol,+La+Tercera,+La+Segunda,+La+Nacion,+Terra,+LUN,+El+Mostrador,+El+mercurio+de+Valparaiso,+DIARIOS+CIUDADANOS,+Politicastereo,+Pol%C3%ADtica+Rock,+Cooperativa.cl,+El+Ciudadano,+El+Periodista,+Tendencia+Pol%C3%ADtica,+Ciperchile%22&cf=all&output=rss';

  $news = new lastRSS();
  $new = $news->get($news_url);
  echo '<div class="list"><div class="yoo-tweet"><ul id="news_update_list" class="list">';

  if ($new != null){
    echo '<h3 class="tit">Noticias</h3>';
    foreach ($new['items'] as $i => $item) {
      echo '<li class="';
      echo fmod($i, 2) ? 'even' : 'odd';
      echo '">';
      //echo eregi_replace('USERNAME: ', '', $item['title']).'<br />';
      echo '<p class="text">'.$item['title'].'</p>';
      echo '<p class="meta">'.link_to(
        date(
          'jS F \a\t h:i a',
          strtotime($item['pubDate'])
        ),
        $item['link'],
        'title='.$item['title']
      );
      echo '</p></li>';
    }
    echo '</ul></div></div>';
  }
?>
