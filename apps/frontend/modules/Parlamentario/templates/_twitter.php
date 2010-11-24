<?php
  //twitter
  if (($twitter = $parlamentario->getTwitter()) != null){
    echo '<h3 class="tit">Twitter</h3>';
    $twitter_url = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name='.$twitter.'&count=5';
    $rss = new lastRSS();
    $rs = $rss->get($twitter_url);
    echo '<div class="list"><div class="yoo-tweet"><ul id="twitter_update_list" class="list">';

    foreach ($rs['items'] as $i => $item) {
      echo '<li class="';
      echo fmod($i, 2) ? 'even' : 'odd';
      echo '">';
      echo '<p class="text">'.eregi_replace($twitter.': ', '', $item['title']).'</p>';
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
