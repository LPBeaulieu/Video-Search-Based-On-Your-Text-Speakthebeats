<?php
if (empty($_POST['submit'])){
    echo <<<_END
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
      <base href="/" />
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name = "description" content = "SpeakTheBeats provides a list of songs tailored to some text of yours. It’s like having a conversation with the songs.">
        <meta name = "keywords" content = "poems, quotes, songs, movies, commercials">
        <meta name = "author" content = "Louis-Philippe Bonhomme-Beaulieu">
        <link rel="stylesheet" href="www.speakthebeats.com.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Speak the Beats</title>
    </head>
      <body>

      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6c757d;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="https://www.speakthebeats.com">Speak the Beats</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/ReelTalk/">Reel Talk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/TouchdownTalk/">Touchdown Talk</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/All-TimeRhymes/">All-TimeRhymes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/ConfidantQuotes/">Confidant Quotes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/SpeakTheScript/">Speak the Script</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/FixTheBeats/">Fix the Beats</a>
            </li>
          </ul>
        </div>
      </nav>


    <body style="background-color:#98d3e5;">
    <div>
        <div class="container-md">
        <div class="container px-4">
        <br><br><br>
        <h1><b>Welcome to Speak the Beats!</b></h1>
        <img src="Singing cockatiel.jpg" width="650" height=auto alt="A bird singing to the beat." class="img-fluid">
        <p>
        Please enter some text and we will return some songs that may speak to you.
        <form method = 'POST'>
            <div class="form-floating">
                <textarea class="form-control" placeholder="What's on your mind?" name = "text" id="floatingTextarea2" style="height: 90px" maxlength="250" required></textarea>
                <label for="floatingTextarea2">max 250 chars</label>
                <input name = "submit" type="submit" value="Speak the Beats!" button type="button" class="btn btn-secondary btn float-right"></button>
                <br><br>
                <p>Which music genres would you like to listen to?</p>
                <div class="container-xs">
                <div class="container mx-3" style="max-width: 300px;">
                <div class="row">
                <div class="col">
                    <label class="checkbox">
                    <input type = "checkbox" name = music_genres[] value = "country">
                    Country
                    </label>
                </div>
                <div class="col">
                    <label class="checkbox">
                    <input type = "checkbox" name = music_genres[] value = "pop">
                    Pop
                    </label>
                </div>
            <div class="w-100" ></div>
                <div class="col">
                    <label class="checkbox">
                    <input type = "checkbox" name = music_genres[] value = "rap">
                    Rap & Hip Hop
                    </label>
                </div>
                <div class="col">
                    <label class="checkbox">
                    <input type = "checkbox" name = music_genres[] value = "rock">
                    Rock
                    </label>
                </div>

                    </div>
                  </div>
                </div>
            </div>
        </form>
        <br>
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
             <p>Be sure to check out related pages for movies (<i><b>Reel Talk</i></b>), Super Bowl commercials (<i><b>Touchdown Talk</i></b>), poems (<i><b>All-Time Rhymes</i></b>) and inspiring quotes (<b><i>Confidant Quotes</i></b>), and a nifty text to speech tool (<b><i>Speak the Script</i></b>) as well as an automatic music arranger (<b><i>Fix the Beats</i></b>) in the navbar!</p>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
        </div>
    _END;

}else{
    echo <<<_END
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
      <meta charset = "UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name = "description" content = "SpeakTheBeats provides a list of songs tailored to some text of yours. It’s like having a conversation with the songs.">
      <meta name = "keywords" content = "poems, quotes, songs, movies, commercials">
      <meta name = "author" content = "Louis-Philippe Bonhomme-Beaulieu">
    <link rel="stylesheet" href="www.speakthebeats.com.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Speak the Beats</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6c757d;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="https://www.speakthebeats.com">Speak the Beats</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/ReelTalk/">Reel Talk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/TouchdownTalk/">Touchdown Talk</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/All-TimeRhymes/">All-TimeRhymes<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/ConfidantQuotes/">Confidant Quotes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/SpeakTheScript/">Speak the Script<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/FixTheBeats/">Fix the Beats<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>


    <body style="background-color:#98d3e5;">
    <div>
    <div class="container-md">
    <div class="container px-4">
    _END;

    $text = htmlspecialchars($_POST['text']);
    if (isset($_POST['music_genres'])){
      $music_genres = implode(" ", $_POST['music_genres']);
      $query = '"' . $text . '" ' . $music_genres;
    }else{
      $query = '"' . $text . '"';
    }

    $command = escapeshellcmd("/home/ubuntu-server/anaconda3/bin/python3 /opt/lampp/htdocs/SpeakTheBeats/speakthebeats.py $query");
    $json = exec($command, $output, $return_var);
    echo <<<_END
    <br>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Speak the Beats</h1>
            <p class="card-text"><h2>Results for entry: </h2><blockquote class="blockquote text-center"><h2><i>&#8220; $text &#8221;</i></h2></blockquote></p>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
    <img src="disclaimer_colored.jpg" width="450" height=auto alt="A bird saying he's sorry for sometimes mixing up the videos." class="img-fluid center-block d-block mx-auto">
            </div>
        </div>
    </div>
    <br>
    _END;
    if (!is_null($json) ) {
        $data = json_decode($json, true);
        foreach ($data as $key => $value) {
            $key = htmlspecialchars(str_replace("’", "'", $key));
            $value = htmlspecialchars($value);
          	$url = "https://www.youtube.com/results?search_query=" . urlencode("'$key' by '$value'");
          	$raw_html = file_get_contents($url);
            $first_videorender_index = strpos($raw_html, '"videoRenderer":{"videoId":"');
            $last_videorender_index = strripos($raw_html, '"videoRenderer":{"videoId":"');
            $end_html_index = strpos($raw_html, '"accessibility":', $last_videorender_index) + 15;
            $html = substr($raw_html, $first_videorender_index, $end_html_index);
            $videoRenderer_count = substr_count($html, '"videoRenderer":{"videoId":"');
            $potential_hits = array(array('substring_title', 'artist', 'youtube_id', 'duration'));
            $index = 0;
            $count = 0;
            if ((strpos(strtolower($html), strtolower($key)) === false)
            && (strpos(strtolower($html), strtolower(str_replace("&", "and", $key)) === false))
            && (strpos(strtolower($html), strtolower(str_replace(":", "", $key))))){
                  echo <<<_END
                  <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">$key</h3>
                    <p class="card-text">$value</p>
                    Sorry, no relevant video found. Try looking up videos at the following link:<br>
                  _END;
                    $link = "https://www.youtube.com/results?search_query=" . urlencode("$key by $value");
                    echo <<<_END
                    <a href="$link">Youtube query for "$key by $value".</a>
                    </div>
                    </div>
                    <br>
                  _END;
                  continue;
            }else{
                do{
                    $duration = 0.5;
                    $index_video_id = strpos($html, '"videoRenderer":{"videoId":"', $index) + 28;
                    $index_after_title = strpos($html, '"longBylineText":', $index_video_id);
                    $youtube_id = substr($html, $index_video_id, 11);
                    $substring_html = strtolower(substr($html, $index_video_id, $index_after_title));

                    $index_minute = (strpos($substring_html, "minute") - 3);
                    if ($index_minute > 0);{
                        $duration = substr($substring_html, $index_minute, 2);}
                    $index_hour = strpos($substring_html, "hour");
                    $index_artist = strpos(strtolower($substring_html), strtolower($value));
                    $index_title = strpos(strtolower($substring_html), strtolower($key));

                    $substring_title = substr($substring_html, $index_title, strlen($key));
                    $substring_title_key = (strtolower($substring_title) === strtolower($key));
                    $substring_title_and = (strtolower($substring_title) === strtolower(str_replace("&", "and", $key)));
                    $substring_title_colon = (strtolower($substring_title) === strtolower(str_replace(":", "", $key)));
                    $substring_title_and_colon = (strpos(strtolower($substring_title), strtolower(str_replace(array("&", ":"), array("and", ""), "$key "))));
                    $substring_title_apostrophe = (strtolower($substring_title) === strtolower(str_replace("'", "’", $key)));

                    $index = $index_after_title;
                    $count +=1;
                    $potential_hits = array_merge($potential_hits, array(array($substring_title, $index_artist, $youtube_id, $duration, $index_hour)));

                    if (!$substring_title_key && !$substring_title_and && !$substring_title_colon
                    && !$substring_title_and_colon && !$substring_title_apostrophe
                        && !$index_artist && (($duration <1) || ($duration >15) || $index_hour) && (($count == substr_count($html, '"videoRenderer":{"videoId":"'))
                     || (($index_title - $index_video_id <= 0) || ($index_title - $index_video_id >= 700)))) {

                         $counter = 1;
                         while ($counter < count($potential_hits) && count($potential_hits) >=2 && $counter<4){
                             if ((strtolower($key) === strtolower($potential_hits[$counter][0])) && ($potential_hits[$counter][1] !== false) && (($potential_hits[$counter][3] >= 1) && ($potential_hits[$counter][3] <= 15) && !$index_hour)){
                            $probable_youtube_id = $potential_hits[$counter][2];
                            echo <<<_END
                            <div class="card">
                            <div class="card-body">
                            <h3 class="card-title">$key</h3>
                            <p class="card-text">$value</p>
                            <div class="embed-responsive embed-responsive-16by9">
                            <img class="card-img-bottom"> <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/$probable_youtube_id"  title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> </iframe> <alt="Sorry, no relevant video found.">
                            </div>
                            </div>
                            </div>
                            <br>
                            _END;
                            break 2;
                             }else{
                                 $counter += 1;
                                 continue;
                             }
                             }
                            echo <<<_END
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">$key</h3>
                                    <p class="card-text">$value</p>
                            Sorry, no relevant video found. Try looking up videos at the following link:<br>
                            _END;
                            $link = "https://www.youtube.com/results?search_query=" . urlencode("$key by $value");
                            echo <<<_END
                            <a href="$link">Youtube query for "$key by $value".</a>
                            </div>
                            </div>
                            <br>
                            _END;
                            break;

                    }elseif (($substring_title_key || $substring_title_and || $substring_title_colon
                    || $substring_title_and_colon || $substring_title_apostrophe) && $index_artist
                    && (($duration >= 1) && ($duration <= 15) && !$index_hour) && (($index_title - $index_video_id > 0) && ($index_title - $index_video_id < 700))) {

                    echo <<<_END
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">$key</h3>
                                <p class="card-text">$value</p>


                    <div class="embed-responsive embed-responsive-16by9">
                    <img class="card-img-bottom"> <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/$youtube_id"  title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> </iframe> <alt="Sorry, no relevant video found.">
                    </div>
                    </div>
                    </div>
                    <br>

                    _END;
                    break;
}
            echo <<< _END
            <p>
            </body>
            </html>
            _END;

}while ($count < $videoRenderer_count);
}
}
}else{
  echo <<<_END
  <div class="card">
      <div class="card-body">
  Sorry, there seems to be a problem. Please refresh the page and try again.
  </div>
  </div>
  <br>
  _END;
}
}
?>
