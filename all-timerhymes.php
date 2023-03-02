<?php
if (empty($_POST['submit'])){
    echo <<<_END
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name = "description" content = "All-Time Rhymes provides a list of poems tailored to some text of yours. It’s like having a conversation with the poems.">
        <meta name = "keywords" content = "poems, quotes, songs, movies, commercials">
        <meta name = "author" content = "Louis-Philippe Bonhomme-Beaulieu">
        <link rel="stylesheet" href="all-timerhymes.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>All-Time Rhymes</title>
      </head>
      <body>

      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6c757d;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com">Speak the Beats</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/ReelTalk/">Reel Talk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.speakthebeats.com/TouchdownTalk/">Touchdown Talk</a>
            </li>
            </li>
            <li class="nav-item active">
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
        <br><br><br>
        <h1><b>Welcome to All-Time Rhymes!</b></h1>
        <img src="cockatiel-raven-poet-color.jpg" width="425" height=auto alt="A reel speaking in rhymes." class = "img-fluid">
        <p>
        Please enter some text and we will return some poems that may speak to you.
        <form method = 'POST'>
            <div class="form-floating">
                <textarea class="form-control" placeholder="What's on your mind?" name = "text" id="floatingTextarea2" style="height: 90px" maxlength="250" required></textarea>
                <label for="floatingTextarea2">max 250 chars</label>
                <input name = "submit" type="submit" value="All-Time Rhymes!" button type="button" class="btn btn-secondary btn float-right"></button>
                <br><br>
            </div>
        </form>
        <br>
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
           <p>Be sure to check out related pages for music (<b><i>Speak the Beats</i></b>), Super Bowl commercials (<i><b>Touchdown Talk</i></b>), movies (<i><b>Reel Talk</i></b>) and inspiring quotes (<b><i>Confidant Quotes</i></b>), and a nifty text to speech tool (<b><i>Speak the Script</i></b>) as well as an automatic music arranger (<b><i>Fix the Beats</i></b>) in the navbar!</p>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </div>
    _END;

}else{
    echo <<<_END
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
      <meta charset = "UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name = "description" content = "All-Time Rhymes provides a list of poems tailored to some text of yours. It’s like having a conversation with the poems.">
      <meta name = "keywords" content = "poems, quotes, songs, movies, commercials">
      <meta name = "author" content = "Louis-Philippe Bonhomme-Beaulieu">
      <link rel="stylesheet" href="all-timerhymes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>All-Time Rhymes</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6c757d;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com">Speak the Beats</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/ReelTalk/">Reel Talk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.speakthebeats.com/TouchdownTalk/">Touchdown Talk</a>
          </li>
          </li>
          <li class="nav-item active">
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
    $query = '"' . $text . '"';
    $command = escapeshellcmd("/home/ubuntu-server/anaconda3/bin/python3 /opt/lampp/htdocs/SpeakTheBeats/All-TimeRhymes/all-timerhymes.py $query");
    $json = exec($command, $output, $return_var);
    echo <<<_END
    <br>
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">All-Time Rhymes</h1>
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

    if (!is_null($json)){
        $data = json_decode($json, true);
        foreach ($data as $key => $value) {
            $url = htmlspecialchars($key);
            $youtube_id = substr($url, -11);
            $title = htmlspecialchars($value);

            echo <<<_END
            <div class="card">
            <div class="card-body">
            <h3 class="card-title">$title</h3>
            <div class="embed-responsive embed-responsive-16by9">
            <img class="card-img-bottom"> <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/$youtube_id"  title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> </iframe> <alt="Sorry, no relevant video found.">
            </div>
            </div>
            </div>
            <br>
            _END;
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
