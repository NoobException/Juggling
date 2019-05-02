<?php


function loadTrick($trickID)
{
    require_once("getTrickData.php");
    $query_row = getTrickData($trickID);
    $name = $query_row["name"];
    $difficulty = $query_row["difficulty"];
    $siteswap = $query_row["siteswap"];
    $code = $query_row["code"];

    $text = <<<EOS
    <div class = "post-trick-wrapper" id = "trickWrapper_$trickID">    
        <div class = "animation-wrapper">
            <canvas class = "mainCanvas"></canvas>
         </div>
        <div class = "slider-wrapper">
            <input type = "button" class = "anim-button" value = "▮▮"/>
            <input type = "range" min="1" max="1000" value="500" class = "anim-slider"/>
        </div>

        <div class = "trick-desc" style = "font-size:15px">
            <span class = "desc-item">$name</span>
            <span class = "desc-item">Difficulty: $difficulty</span> 
            <span class = "desc-item">Siteswap: $siteswap</span>
        </div>
        <span class = "trickData" style = "display:none">$code</span>
    </div>
EOS;
return $text;
}

function loadBlogEntry($trickID, $withTrick = true)
{
require_once("getTrickData.php");
    
$day = 1 + ($trickID - 1) * 7;
    
$trickText = "";
if($withTrick) {$trickText = loadTrick($trickID);}
    
$query_row = getTrickData($trickID);
$desc = $query_row["description"];
    
//Will be loaded using Ajax   
$mainText = <<<EOS
<section class = "post-wrapper" id = "$trickID">
    <div class = "post-body">
        $trickText
        <div class = "post-text-wrapper">
        <h3 class = "post-title">Trik tygodnia $day-05-2019</h3>
        $desc
        </div>
    </div>
    <div class = "reaction-wrapper"> 
    <div class = "reaction-buttons">
        <span class = "reaction-button reaction-heart"><3</span>
        <span class = "reaction-button reaction-comment">...</span>
    </div>
    </div>
    <div class = "comments-wrapper"> </div>
    
</section>
EOS;
    
echo $mainText;
}

if(isset($_GET["trickID"]))
{
    $trickID = $_GET["trickID"];
    unset($_GET["trickID"]);
    loadBlogEntry($trickID, false);
}


?>