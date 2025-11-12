<?php
// 彻底清除所有输出缓冲区
while (ob_get_level()) {
    ob_end_clean();
}

// 引入 ZBP 核心
require '../../../../zb_system/function/c_system_base.php';
require '../../../../zb_system/function/c_system_admin.php';

// 在加载ZBP前再次清理
ob_clean();

$zbp->Load();

// 保证返回的是纯 JSON
header("Content-Type: application/json; charset=utf-8");

// 支持 GET/POST


function getData() {
    global $zbp;
    $type = $_REQUEST['type'] ?? '';
    if ($type === 'categorys') {
        $arr = [];
        foreach ($zbp->categorys as $c) {
            $arr[] = [
                'id'       => $c->ID,
                'title'    => $c->Name,
                'alias'    => $c->Alias,
                'order'    => $c->Order,
                'count'    => $c->Count,
                'parentId' => $c->ParentID,
                'url'      => $c->Url
            ];
        }
        return $arr;
    } else if ($type === 'articles') {
        $arr = [];
        $tagId    = $_REQUEST['tagId'] ?? '';
        $page     = max(1, (int)($_REQUEST['page'] ?? 1));       // 页码，默认 1
        $pageSize = max(1, (int)($_REQUEST['pageSize'] ?? 10)); // 每页数量，默认 10

        $where = array();
        if (!empty($tagId)) {
            $where = array(array( "=","log_CateID", $tagId));
        }

        // 分页 offset
        $offset = ($page - 1) * $pageSize;

        $articles = $zbp->GetArticleList(
        array('*'),
        array(array('=','log_Status','0'),$where),
        array('log_ViewNums'=>'DESC'),
        array($pageSize),'');

        foreach ($articles as $a) {
            $arr[] = [
                'id'         => $a->ID,
                'title'      => $a->Title,
                'alias'      => $a->Alias,
                'author'     => $a->Author->StaticName??"",
                'cateId'     => $a->Category->ID,
                'cateName'   => $a->Category->Name,
                'tags'       => $a->Tags,
                'url'        => $a->Url,
                'createTime' => $a->Time('Y-m-d H:i:s'),
                'ViewNums'    => $a->ViewNums,
                'CommNums' => $a->CommNums,
                'likeNum'    => $a->Metas->Likes ?? 0,
            ];
        }

        return $arr;
    }else if($type=='navBar'){
        return getNavBar();
    }
    else if($type=='single'){

    }

    return null;
}

function getNavBar() {
    global $zbp, $table;
    
    // 查询链接表
    $sql = $zbp->db->sql->Select(
        $table['Link'], 
        array('*'), 
        null, 
        array('link_Order' => 'ASC'), 
        null, 
        null
    );
    
    $links = $zbp->db->Query($sql);
    $linkList = array();
    
    foreach ($links as $link) {
        $linkList[] = [
            'id' => $link['link_ID'],
            'name' => $link['link_Name'],
            'url' => $link['link_Url'],
            'description' => $link['link_Description'],
            'order' => $link['link_Order'],
            'type' => $link['link_Type'],
            'logo' => $link['link_Logo'],
            'target' => $link['link_Target'],
            'position' => $link['link_Position']
        ];
    }
    
    return $linkList;
}

    // 获取数据前清理缓冲区
    ob_clean();
    $data = getData($_REQUEST);

    // 输出前再次清理
    ob_clean();

    // 返回 JSON
    echo json_encode([
    "code" => 200,
    "message" => "ok",
    "data" => $data
    ], JSON_UNESCAPED_UNICODE);

    // 立刻结束执行
    exit;
    ?>