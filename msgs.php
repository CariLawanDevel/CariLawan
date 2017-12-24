<?php 
//get detail event
$msg=mysql_query("SELECT * FROM tb_chat, tb_join, tb_member WHERE tb_join.id_member=tb_member.id_member AND tb_join.id_member=tb_chat.id_member AND tb_join.id_event=tb_chat.id_event AND tb_join.id_event='$id_event' ORDER BY posted ASC");

$aktif = "";

while($c=mysql_fetch_array($msg)){
  $id_member = $c['id_member'];
  $nama_member = $c['nama_member'];
  $id_chat = $c['id_chat'];
  $isi_chat = $c['isi_chat'];
  $posted = $c['posted'];
  if($_SESSION['id_member'] == $c['id_member']){
    $aktif = "bubble-right";
  }
  else{
    $aktif = "bubble-left"; 
  }

echo "<div class='urltag $aktif'>
        <p><span class='name'>$nama_member</span><span class='msgc'>".urlf($isi_chat)."</span><span class='dat'>$posted</span></p></div>";
}

if(!isset($_SESSION['id_member']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
 echo "<script>window.location.reload()</script>";
}

function urlf($text){
  $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
  preg_match_all($reg_exUrl, $text, $matches);
  $usedPatterns = array();
  foreach($matches[0] as $pattern){
    if(!array_key_exists($pattern, $usedPatterns)){
      $usedPatterns[$pattern]=true;
      $text = str_replace  ($pattern, '<a href="'.$pattern.'" rel="nofollow">'.$pattern.'</a> ', $text);   
    }
  }
  return $text;
}   

?>
