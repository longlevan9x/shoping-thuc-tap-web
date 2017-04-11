<?php
session_start();

require_once 'config/database.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once 'layout/header.php';
if ($action != "user") {
    require_once 'layout/menu_search.php';
}
switch ($action) {
    case 'index':
        $title = "Trang chủ";
        home();
        break;
    case 'cart':
        $title = "Giỏ hàng";
        cart();
        break;
    case 'user':
        user();
        break;
    case 'search':
        search();
        break;

    default:
        # code...
        break;
}
require_once 'layout/menu_cart.php';
require_once 'layout/footer.php';

function home()
{
    require_once 'home/index.php';
}
function cart()
{
    require_once 'cart/index.php';
}

function user()
{
    require_once 'user/index.php';
}
function search()
{
    require_once 'search/index.php';
}

function menuMulti($data1,&$newMenu,$parent = 0, $level = 'child1',$i = 1)
{
    $data = array();
    // $data2 = [];
    // echo"<pre>";print_r($data_cate);
    if (count($data1) > 0) {
        foreach ($data1 as $key => $item) {
            if ($item['parent'] == $parent) {
                $data[] = $item;
                unset($data1[$key]);
            }
        }
    }
    if ($data) {
        $level =  "child".$i;
        $newMenu .= "<ul class='{$level}'>";
        foreach ($data as $key => $item) {
            if ($item['parent'] == 0) {
                $level = 'parent';
            }
            $newMenu .= "<li><a href='?action=search&c=index&id=".$item['id']."'>".$item['name']."</a></li>"
            ;
            menuMulti($data1,$newMenu,$item['id'],$level,$i+1);
        }
        $newMenu .= '</ul>';
    }
    return $newMenu;
}



function nextPrev($currentPage, $totalPage,$link)
{
    $html = "<ul class='pagination'>";
    if ($currentPage > 1) {
        $html .= "<li><a href='{$link}1'>First</a></li>";
        $currentPage--;
        $html .= "<li><a href='{$link}".$currentPage."'>Prev</a></li>";
    }
    for ($i=1; $i <= $totalPage ; $i++) {
        $html .= "<li><a href='{$link}".$i."'>".$i."</a></li>";
    }
    if ($currentPage < $totalPage) {
        $currentPage++;
        $html .= "<li><a href='{$link}".$currentPage."'>Next</a></li>";
        $html .= "<li><a href='{$link}".$totalPage."'>Last</a></li>";
    }
    $html .= '</ul>';
    return $html;
}
 ?>