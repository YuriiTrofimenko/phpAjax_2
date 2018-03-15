<?php
//mock array (name, size, color)
$articles[0][0]="Ботинки";
$articles[0][1]="8";
$articles[0][2]="20151221189";

$articles[1][0]="Сапоги";
$articles[1][1]="140000013";
$articles[1][2]="30";

$articles[2][0]="Туфли";
$articles[2][1]="130000012";
$articles[2][2]="98";

$articles[3][0]="Кроссовки";
$articles[3][1]="120000011";
$articles[3][2]="9";

$what_ajax = $_POST['what_ajax'];
//sizes
if ($what_ajax == 'ajax_size') {
    
    $c = explode(',',$_POST['color']);
    //$setAllColors = (int)$_POST['setAllColors'];    
    
    $arr_pids_s;
    if(isset($c)){
        foreach ($articles as $article) {
            foreach ($c as $color) {
                if($article[2] == $color){
                    $arr_pids_s[] = $article[1];
                    break;
                }
            }
        }
    }
    
    $json_sizes = json_encode($arr_pids_s);
    $_SESSION['sizes_session'] = $json_sizes;
    echo isset($_SESSION['sizes_session'])?$_SESSION['sizes_session']:'';
}
//colors
if ($what_ajax == 'ajax_color') {
    
    $s = explode(',',$_POST['size']);
    //$setAllSizes = (int)$_POST['setAllSizes'];
        
    $arr_pids_c;
    if(isset($s)){
        foreach ($articles as $article) {
            foreach ($s as $size) {
                if($article[1] == $size){
                    $arr_pids_c[] = $article[2];
                    break;
                }
            }
        }
    }
    
    $json_colors = json_encode($arr_pids_c);
    $_SESSION['colors_session'] = $json_colors;
    echo isset($_SESSION['colors_session'])?$_SESSION['colors_session']:'';
}
?>