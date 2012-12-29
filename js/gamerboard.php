<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Gamer Stats</title>
<script>
var seconds_left = <?php $min = date('i'); $sec = date('s'); $res = ( $min *60 + $sec ) %180; $left = 180 -$res; echo $left;?>;
var interval = setInterval(function() {
    document.getElementById('timer_div').innerHTML = --seconds_left;
    if (seconds_left <= 0)
    {
        document.getElementById('timer_div').innerHTML = "Game started";
        clearInterval(interval);
		window.location ="http://www.wordtrix.in/game.html" ;
    }
}, 1000);
</script>
</head>

<body>
<div>
<br> <p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:24px;color:#408000;"  > next game : </label>
<label id="timer_div" style="font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:36px; color:#408000;position:relative ; left: +100px;"></label></p></br>
</div>
<div>
<br> <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:30px;color:#90ee90;"  > Gamer Statistics </label> </p></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > gamer score : </label>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > total words : </label></p>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > bonus : </label></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > average score per word : </label></p>
</div>
<iframe src="http://www.wordtrix.in/js/rank.php" name="gamer board" frameborder="0" height="800" width="650" style="position: absolute; top: 0px; left: 700px;"></iframe>

</body>
</html>