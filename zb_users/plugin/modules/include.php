<?php
RegisterPlugin("modules","ActivePlugin_modules");

function ActivePlugin_modules() {
    Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax','modules_UploadAjax');
    Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','modules_Style');
    Add_Filter_Plugin('Filter_Plugin_PostModule_Succeed', 'modules_CreateModule');
    Add_Filter_Plugin('Filter_Plugin_PostComment_Succeed', 'modules_CreateModule');
    Add_Filter_Plugin('Filter_Plugin_DelComment_Succeed', 'modules_CreateModule');
    Add_Filter_Plugin('Filter_Plugin_CheckComment_Succeed', 'modules_CreateModule');
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Succeed', 'modules_CreateModule');
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Del', 'modules_CreateModule');
}

function modules_UploadAjax($src)
{
    global $zbp;
    if ($src == 'modules_upload'){

        if (!$zbp->CheckRights('UploadPst')) {
            $zbp->ShowError(6);
        }

        Add_Filter_Plugin('Filter_Plugin_Upload_SaveFile','modules_Upload_SaveFile_Ajax');
        $_POST['auto_rename'] = 1;
        PostUpload();
        echo json_encode(array('url' => $GLOBALS['tmp_ul']->Url));
        exit;
    }
}

function modules_Upload_SaveFile_Ajax($tmp, $ul)
{
    $GLOBALS['tmp_ul'] = $ul;
}

function modules_Style()
{
    global $zbp;
    $zbp->header .= '<link type="text/css" href="'.$zbp->host.'zb_users/plugin/modules/style/style.css" rel="stylesheet">' . "\r\n";
    if($zbp->Config('modules')->PostCUSTOMCSS){
        $zbp->header .= '<link type="text/css" href="'.$zbp->host.'zb_users/plugin/modules/style/skin.css" rel="stylesheet">' . "\r\n";
    }
    $zbp->header .= '<script src="'.$zbp->host.'zb_users/plugin/modules/script/common.js"></script>' . "\r\n";
}

//主题自带模块(热门阅读/热评文章/最新文章/推荐阅读/最新评论/站长简介)
function modules_CreateModule()
{
    global $zbp;
    //刷新浏览总量
    $all_views = ($zbp->option['ZC_LARGE_DATA'] == true || $zbp->option['ZC_VIEWNUMS_TURNOFF'] == true) ? 0 : GetValueInArrayByCurrent($zbp->db->Query('SELECT SUM(log_ViewNums) AS num FROM ' . $GLOBALS['table']['Post']), 'num');
    $zbp->cache->all_view_nums = $all_views;
    $zbp->SaveCache();

    $module_list = array(
        array("modules_hotviewarticle", "modules_HotViewArticle", "ul", "热门阅读","0"),
        array("modules_hotcmtarticle", "modules_HotCmtArticle", "ul", "热评文章","0"),
        array("modules_newarticle", "modules_NewArticle", "ul", "最新文章","0"),
        array("modules_recarticle", "modules_RecArticle", "ul", "推荐阅读","0"),
        array("modules_avatarcomment", "modules_AvatarComment", "ul", "最近评论","0"),
        array("modules_newcomment", "modules_NewComment", "ul", "最新评论","0"),
        array("modules_user", "modules_User", "div", "站长简介","1"),
        array("modules_readers", "modules_Readers", "ul", "读者墙","0"),
    );
    $module_filenames = array();
    foreach ($module_list as $item) {
        array_push($module_filenames, $item[0]);
    }
    $modules = $zbp->GetModuleList(array("*"), array(
        array("IN", "mod_FileName", $module_filenames),
    ));
    $has_modules = array();
    foreach ($modules as $item) {
        $item->Content = modules_SideContent($item);
        $item->Save();
        //$zbp->AddBuildModule($item->FileName);
        array_push($has_modules, $item->FileName);
    }
    foreach ($module_filenames as $k => $item) {
        if(!array_search($item, $has_modules)){
            $module = $module_list[$k];
            $t = new Module();
            $t->Name = $module[3];
            $t->IsHideTitle = $module[4];
            $t->FileName = $module[0];
            $t->Source = "plugin_modules";
            $t->SidebarID = 0;
            $t->Content = modules_SideContent($t);
            $t->HtmlID = $module[1];
            $t->Type = $module[2];
            $t->Save();
        }
    }
}

//卸载主题时判断是否删除自定义模块
function modules_DelModule()
{
    global $zbp;
    $modules = array('modules_hotviewarticle', 'modules_hotcmtarticle', 'modules_newarticle', 'modules_recarticle', 'modules_avatarcomment', 'modules_newcomment', 'modules_user', 'modules_readers');
    $w = array();
    $w[] = array('IN', 'mod_FileName', $modules);
    $modules = $zbp->GetModuleList(array('*'),$w);
    foreach ($modules as $item) {
        $item->Del();
    }
}

//模块内容
function modules_SideContent(&$module)
{
    global $zbp;
    $str = "";
    if($zbp->Config('modules')->PostBLANKSTYLE == 2){
        $blankstyle = ' target="_blank"';
    }else{
        $blankstyle = '';
    }
    switch ($module->FileName) {
        case 'modules_hotviewarticle':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 5;
            $hotArtList = modules_GetHotArticleList($num);
            foreach ($hotArtList as $item) {
                $str .= '<li class="sideitem">';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){
                    $str .= '<div class="sideimg">
                        <a href="'.$item->Url.'"'. $blankstyle .'>
                            <img src="'.modules_Thumb($item).'" alt="'.$item->Title.'">
                        </a>
                    </div>';
                }
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '<div class="hasimg">'; }
                $str .= '<a href="'.$item->Url.'"'. $blankstyle .' title="'.$item->Title.'" class="itemtitle">'.$item->Title.'</a>';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '</div>'; }
                $str .= '<p class="sideinfo"><span class="view">'.$item->ViewNums.' 浏览</span>'.$item->Category->Name.'</p>
            </li>';
            }
        break;
        case 'modules_hotcmtarticle':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 5;
            $hotArtList = modules_GetHotArticleList($num, "cmt");
            foreach ($hotArtList as $item) {
                $str .= '<li class="sideitem">';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){
                    $str .= '<div class="sideimg">
                        <a href="'.$item->Url.'"'. $blankstyle .'>
                            <img src="'.modules_Thumb($item).'" alt="'.$item->Title.'">
                        </a>
                    </div>';
                }
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '<div class="hasimg">'; }
                $str .= '<a href="'.$item->Url.'"'. $blankstyle .' title="'.$item->Title.'" class="itemtitle">'.$item->Title.'</a>';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '</div>'; }
                $str .= '<p class="sideinfo"><span class="cmt">'.$item->CommNums.' 评论</span>'.$item->Category->Name.'</p>
            </li>';
            }
        break;
        case 'modules_newarticle':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 5;
            $hotArtList = GetList($num);
            foreach ($hotArtList as $item) {
                $str .= '<li class="sideitem">';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){
                    $str .= '<div class="sideimg">
                        <a href="'.$item->Url.'"'. $blankstyle .'>
                            <img src="'.modules_Thumb($item).'" alt="'.$item->Title.'">
                        </a>
                    </div>';
                }
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '<div class="hasimg">'; }
                $str .= '<a href="'.$item->Url.'"'. $blankstyle .' title="'.$item->Title.'" class="itemtitle">'.$item->Title.'</a>';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){ $str .= '</div>'; }
                $str .= '<p class="sideinfo"><em class="view">'.modules_TimeAgo($item->Time(),$zbp->Config('modules')->PostTIMESTYLE).'</em></p>
            </li>';
            }
        break;
        case 'modules_recarticle':
            $recArtList = modules_GetRecArticle();
            foreach ($recArtList as $item) {
                if($item->CateID){
                    $itemCategoryName = $item->Category->Name;
                }else{
                    $itemCategoryName = '';
                }
                $image = modules_Thumb($item);
                $str .= '<li class="sideitem';if(modules_Thumb($item) == '' || $zbp->Config('modules')->PostSIDEIMGON == '0'){$str .= ' noimg';}$str .= '">';
                if(modules_Thumb($item) != '' && $zbp->Config('modules')->PostSIDEIMGON == '1'){
                    if($zbp->Config('modules')->PostRANDTHUMBON == '1'){$IsThumb='2';}else{$IsThumb='1';}
                $str .= '<div class="sideitemimg">
                    <a href="'.$item->Url.'"'. $blankstyle .'>
                        <img src="'.modules_Thumb($item,$IsThumb).'" alt="'.$item->Title.'">
                    </a>
                </div>';
                }
                $str .= '<div class="sidelink">
                    <a href="'.$item->Url.'"'. $blankstyle .' title="'.$item->Title.'">'.$item->Title.'</a>
                    <p class="sideinfo"><em class="date">'.modules_TimeAgo($item->Time(),$zbp->Config('modules')->PostTIMESTYLE).'</em>'.$itemCategoryName.'</p>
                </div>
            </li>';
            }
        break;
        case 'modules_avatarcomment':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 5;
            $newCmtList = modules_GetNewComment($num);
            foreach ($newCmtList as $item) {
                $str .= '<li class="sideitem">
                    <div class="avatarcmt">
                        <div class="avatarimg"><span><img src="'.modules_MemberAvatar($item->Author,$item->Author->Email).'" alt="'.$item->Author->StaticName.'"/></span></div>
                        <div class="avatarinfo">
                            <p><em class="avatarname">'.$item->Author->StaticName.'</em><span>评论文章：</span></p>
                            <p><a href="'.$item->Post->Url.'"'. $blankstyle .' title="'.$item->Post->Title.'" class="avatartitle">'.$item->Post->Title.'</a></p>
                        </div>
                        <div class="avatarcon"><i>'.$item->Content.'</i></div>
                    </div>
                </li>';
            }
        break;
        case 'modules_newcomment':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 5;
            $newCmtList = modules_GetNewComment($num);
            foreach ($newCmtList as $item) {
                $str .= '<li class="sideitem">
                <div class="sidecmtinfo"><em>'.$item->Author->StaticName.'</em>'.modules_TimeAgo($item->Time(),$zbp->Config('modules')->PostTIMESTYLE).'</div>
                <div class="sidecmtcon"><a href="'.$item->Post->Url.'#cmt'.$item->ID.'"'. $blankstyle .' title="'.$item->Content.'">'.$item->Content.'</a></div>
                <div class="sidecmtarticle"><a href="'.$item->Post->Url.'"'. $blankstyle .' title="'.$item->Post->Title.'">'.$item->Post->Title.'</a></div>
            </li>';
            }
        break;
        case 'modules_user':
            if($zbp->Config('modules')->PostSIDEUSERBG){$sideuserbg = $zbp->Config('modules')->PostSIDEUSERBG;}else{$sideuserbg = $zbp->host.'zb_users/plugin/modules/style/images/banner.jpg';}
            if($zbp->Config('modules')->PostSIDEUSERIMG){$sideuserimg = $zbp->Config('modules')->PostSIDEUSERIMG;}else{$sideuserimg = $zbp->host.'zb_users/avatar/0.png';}
            if($zbp->Config('modules')->PostSIDEUSERNAME){$sideusername = $zbp->Config('modules')->PostSIDEUSERNAME;}else{$sideusername = $zbp->name;}
            if($zbp->Config('modules')->PostSIDEUSERINTRO){$sideuserintro = $zbp->Config('modules')->PostSIDEUSERINTRO;}else{$sideuserintro = $zbp->name;}
            if($zbp->Config('modules')->PostSIDEUSERQQ){$sideuserqq = '<p><a href="https://wpa.qq.com/msgrd?v=3&uin='.$zbp->Config('modules')->PostSIDEUSERQQ.'&site=qq&menu=yes" target="_blank" title="qq" class="qq"></a></p>';}else{$sideuserqq = '';}
            if($zbp->cache->all_article_nums > 10000){$all_article_nums = round($zbp->cache->all_article_nums / 10000,2).'万';}else{$all_article_nums = $zbp->cache->all_article_nums;}
            if($zbp->cache->all_comment_nums > 10000){$all_comment_nums = round($zbp->cache->all_comment_nums / 10000,2).'万';}else{$all_comment_nums = $zbp->cache->all_comment_nums;}
            if($zbp->cache->all_view_nums > 10000){$all_view_nums = round($zbp->cache->all_view_nums / 10000,2).'<em>万</em>';}else{$all_view_nums = $zbp->cache->all_view_nums;}
            if($zbp->Config('modules')->PostSIDEUSERWECHAT){$sideuserwechat = '<p><a href="javascript:;" title="微信" class="wechat"><span><img src="'.$zbp->Config('modules')->PostSIDEUSERWECHAT.'" alt="微信"></span></a></p>';}else{$sideuserwechat = '';}
            if($zbp->Config('modules')->PostSIDEUSERDOUYIN){$sideuserdouyin = '<p><a href="'.$zbp->Config('modules')->PostSIDEUSERDOUYIN.'" target="_blank" title="抖音" class="douyin"></a></p>';}else{$sideuserdouyin = '';}
            if($zbp->Config('modules')->PostSIDEUSEREMAIL){$sideuseremail = '<p><a href="mailto:'.$zbp->Config('modules')->PostSIDEUSEREMAIL.'" target="_blank" title="邮箱" class="email"></a></p>';}else{$sideuseremail = '';}
            if($zbp->Config('modules')->PostSIDEUSERWEIBO){$sideuserweibo = '<p><a href="'.$zbp->Config('modules')->PostSIDEUSERWEIBO.'" target="_blank" title="微博" class="weibo"></a></p>';}else{$sideuserweibo = '';}
            if($zbp->Config('modules')->PostSIDEUSERGROUP){$sideusergroup = '<p><a href="'.$zbp->Config('modules')->PostSIDEUSERGROUP.'" target="_blank" title="群组" class="group"></a></p>';}else{$sideusergroup = '';}
            $str .= '<div class="sideuser">
            <div class="sideuserhead" style="background-image:url('.$sideuserbg.')!important;"></div>
            <div class="sideusercon">
            <div class="avatar"><img src="'.$sideuserimg.'" alt="'.$sideusername.'"></div>
            <h4>'.$sideusername.'</h4>
            <p>'.$sideuserintro.'</p>
            <div class="sideuserlink">
                '.$sideuserqq.$sideuserwechat.$sideuserdouyin.$sideuseremail.$sideuserweibo.$sideusergroup.'
            </div>';
            if($zbp->Config('modules')->PostSIDEUSERCOUNT == '1'){
            $str .= '<div class="sideuserfoot">
                <p><strong>'.$all_article_nums.'</strong><span>文章数</span></p>
                <p><strong>'.$all_comment_nums.'</strong><span>评论数</span></p>
                <p><strong>'.$all_view_nums.'</strong><span>浏览数</span></p>
            </div>';
            }
            $str .= '</div>
            </div>';
        break;
        case 'modules_readers':
            $num = $module->MaxLi > 0 ? $module->MaxLi : 8;
            $Readers = modules_Readers($num);
            foreach ($Readers as $item) {
                $str .= '<li class="readeritem">';
                if($item['url']){ $str .= '<a href="'. $item['url'] .'" target="_blank" rel="nofollow">';}
                $str .= '<span class="readerimg"><img src="'. modules_MemberAvatar($item['member'],$item['email']) .'" alt="'. $item['name'] .'"></span>';
                $str .= '<span class="readername">'. $item['name'] .'</span><span class="readernum">'. $item['count'] .'</span>';
                if($item['url']){ $str .= '</a>';}
            $str .= '</li>';
            }
        break;
    }
    return $str;
}

//获取热门文章列表
function modules_GetHotArticleList($num = 5, $type = "view")
{
    global $zbp;
    if($type == "cmt"){
        $time = $zbp->Config('modules')->PostSIDECMTDAY;
    }else{
        $time = $zbp->Config('modules')->PostSIDEVIEWDAY;
    }
    if(empty($time)){
        $time = 90 * 10;
    }
    $time = time() - $time * 24 * 60 * 60;
    $w = array();
    $w[] = array("=", "log_Type", "0");
    $w[] = array("=", "log_Status", "0");
    $w[] = array(">", "log_PostTime", $time);
    if($type == "view"){
        $order = array("log_ViewNums" => "DESC");
    }else{
        $order = array("log_CommNums" => "DESC");
    }
    $articles = $zbp->GetArticleList(array('*'), $w, $order, array($num));
    return $articles;
}

//推荐阅读模块
function modules_GetRecArticle()
{
    global $zbp;
    $w = array();
    $w[] = array("=", "log_Type", "0");
    $w[] = array("=", "log_Status", "0");
    $ids = $zbp->Config('modules')->PostSIDERECID;
    $ids = explode(",", $ids);
    $w[] = array("IN", "log_ID", $ids);
    $list = $zbp->GetArticleList(array('*'), $w);
    $articles = array();
    foreach ($ids as $item) {
        $articles[] = $zbp->GetPostByID($item);
    }
    return $articles;
}

//获取最新评论
function modules_GetNewComment($num = 5)
{
    global $zbp;
    $w = array();
    $w[] = array("=", "comm_IsChecking", "0");
    $comments = $zbp->GetCommentList(array('*'), $w, array("comm_PostTime" => "DESC"), array($num));
    foreach ($comments as &$comment) {
        if ($comment->ParentID > 0) {
            $comment->Parent = $zbp->GetCommentByID($comment->ParentID);
            $comment->Parent->Content = TransferHTML($comment->Parent->Content, '[nohtml]');
        }
        $comment->Content = TransferHTML($comment->Content, '[nohtml]');
    }
    return $comments;
}

function modules_readers($limit = 100)
{
    global $zbp;
    $list = array();
    if($zbp->Config('modules')->PostREADERSURLON == '1'){
        $where = array(array('<>','comm_IsChecking','1'),array('<>','comm_HomePage',''));
    }else{
        $where = array('<>','comm_IsChecking','1');
    }
    $sql = $zbp->db->sql->get()->select($zbp->table['Comment'])->column('comm_Name,comm_Email,comm_AuthorID,comm_HomePage,count(*)')->where($where)->groupby('comm_Name,comm_Email,comm_AuthorID,comm_HomePage')->orderBy(array('count(*)' => 'DESC'))->limit($limit)->sql;
    foreach($zbp->db->Query($sql) as $value){
        $value = array_values($value);
        $list[] = array(
            'name'   => $value[0],
            'email'  => $value[1],
            'member' => $zbp->GetMemberByID($value[2]),
            'url'  => str_ireplace('{#ZC_BLOG_HOST#}',$zbp->host,$value[3]),
            'count'  => $value[4],
        );
    }
    return $list;
}

function modules_TimeAgo($ptime, $type = null)
{
    global $zbp;
    $ptime = strtotime($ptime);
    switch($type){
        case 1:
                return date('Y-m-d', $ptime);
        case 2:
            return date('Y-m-d H:i', $ptime);
        case 3:
            return date('Y-m-d H:i:s', $ptime);
        case 4:
            return date('Y年m月d日', $ptime);
        case 5:
            return date('Y年m月d日 H:i', $ptime);
        case 6:
            return date('Y年m月d日 H:i:s', $ptime);
        case 7:
            return date('F j, Y', $ptime);
        case 8:
            return date('d M Y', $ptime);
        default:
            $etime = time() - $ptime;
            if ($etime < 1) {
                return '刚刚';
            }
            $interval = array(
                12 * 30 * 24 * 60 * 60  => '年前<span class="datetime"> (' . date('Y-m-d', $ptime) . ')</span>',
                30 * 24 * 60 * 60       => '个月前<span class="datetime"> (' . date('m-d', $ptime) . ')</span>',
                7 * 24 * 60 * 60        => '周前<span class="datetime"> (' . date('m-d', $ptime) . ')</span>',
                24 * 60 * 60            => '天前',
                60 * 60                 => '小时前',
                60                      => '分钟前',
                1                       => '秒前',
            );
            foreach ($interval as $secs => $str) {
                $d = $etime / $secs;
                if ($d >= 1) {
                    $r = round($d);
                    return $r . $str;
                }
            }
    }
}

function modules_MemberAvatar($member, $email = null)
{
    global $zbp;
    $avatar = $member->Avatar;
    if(strpos($avatar, "zb_users/avatar/0.png") === false){
        return $avatar;
    }
    $targetEmail = isset($email) ? $email : $member->Email;
    if($member->Metas->memberimg){
        $avatar = $member->Metas->memberimg;
    }elseif($targetEmail){
        preg_match_all('/((\d)*)@qq.com/', $email, $vai);
        if (isset($vai[1][0])) {
            $qq = $vai[1][0];
            $avatar = "https://q2.qlogo.cn/headimg_dl?dst_uin={$qq}&spec=100";
        }
    }
    return $avatar;
}

//主题缩略图
function modules_Thumb($Source, $IsThumb = '0')
{
    global $zbp;
    if (ZC_VERSION_COMMIT >= 2800 && $zbp->Config('modules')->PostTHUMBNEWON == '1') {
        return modules_Thumb_new($Source, $IsThumb);
    }
    $ThumbSrc = $temp = '';
    $randnum = mt_rand(1, 10);
    $pattern = "/<img[^>]+src=\"(?<url>[^\"]+)\"[^>]*>/";
    $content = $Source->Content;
    $sideImgMetaName = $zbp->Config('modules')->PostSIDEIMGMETA;
    preg_match_all($pattern, $content, $matchContent);
    if ($zbp->Config('modules')->PostSIDEIMGON == '1'){
        if ($Source->Metas->$sideImgMetaName) {
            $temp = $Source->Metas->$sideImgMetaName;
        }elseif(isset($matchContent[1][0])){
            $temp = $matchContent[1][0];
        }else{
            if($zbp->Config('modules')->PostSIDETHUMBON == '1'){
                $temp = $zbp->Config('modules')->PostSIDETHUMB;
            }elseif($zbp->Config('modules')->PostSIDERANDTHUMBON == '1'){
                $temp = $zbp->host."zb_users/plugin/modules/include/thumb/".$randnum.".jpg";
            }elseif($IsThumb == '1'){
                $temp = $zbp->Config('modules')->PostSIDETHUMB;
            }else{
                $temp = '';
            }
        }
    }else{
        $temp = '';
    }
    $ThumbSrc = $temp;
    return $ThumbSrc;
}

//Z-Blog1.7版本缩略图
function modules_Thumb_new($Source, $IsThumb)
{
    global $zbp;
    $ThumbSrc = '';
    $randnum = mt_rand(1, 10);
    $sideImgMetaName = $zbp->Config('modules')->PostSIDEIMGMETA;
    if($zbp->Config('modules')->PostSIDEIMGON == '1'){
        if(isset($Source->Metas->$sideImgMetaName)){
            $temp = $Source->Metas->$sideImgMetaName;
        }elseif($Source->ImageCount >= 1 && (count($thumbs = $Source->Thumbs(300, 210, 1)) > 0)){
            $temp = $thumbs[0];
        }else{
            if($zbp->Config('modules')->PostSIDETHUMBON == '1'){
                $temp = $zbp->Config('modules')->PostSIDETHUMB;
            }elseif($zbp->Config('modules')->PostSIDERANDTHUMBON == '1'){
                $temp = $zbp->host."zb_users/plugin/modules/include/thumb/".$randnum.".jpg";
            }elseif($IsThumb == '1'){
                $temp = $zbp->Config('modules')->PostSIDETHUMB;
            }else{
                $temp = '';
            }
        }
    }else{
        $temp = '';
    }
    $ThumbSrc = $temp;
    return $ThumbSrc;
}

function modules_FormatID($ids)
{
    $filter = str_replace('，', ',', $ids);
    $filter = preg_replace('/,+/', ',', $filter);
    return trim($filter, ',');
}

function modules_skin()
{
    global $zbp;
    $skin = '';
    $customcss = $zbp->Config('modules')->PostCUSTOMCSS;
    $skin .= "{$customcss}";
    return $skin;
}

function modules_Config()
{
    global $zbp;
    $array = array(
        'PostSIDEIMGON' => '1',
        'PostSIDEIMGMETA' => '',
        'PostSIDETHUMB' => '{#ZC_BLOG_HOST#}zb_users/plugin/modules/style/images/thumb.png',
        'PostSIDETHUMBON' => '0',
        'PostSIDERANDTHUMBON' => '0',
        'PostTIMESTYLE' => '2',
        'PostSIDECMTDAY' => '365',
        'PostSIDEVIEWDAY' => '365',
        'PostSIDERECID' => '',
        'PostSIDEUSERBG' => '{#ZC_BLOG_HOST#}zb_users/plugin/modules/style/images/banner.jpg',
        'PostSIDEUSERIMG' => '{#ZC_BLOG_HOST#}zb_users/plugin/modules/style/images/sethead.png',
        'PostSIDEUSERNAME' => $zbp->name,
        'PostSIDEUSERINTRO' => $zbp->title,
        'PostSIDEUSERQQ' => '#',
        'PostSIDEUSERWECHAT' => '{#ZC_BLOG_HOST#}zb_users/plugin/modules/style/images/qr.png',
        'PostSIDEUSERDOUYIN' => '#',
        'PostSIDEUSEREMAIL' => '#',
        'PostSIDEUSERWEIBO' => '#',
        'PostSIDEUSERGROUP' => '#',
        'PostSIDEUSERCOUNT' => '1',
        'PostCUSTOMCSS' => '',
        'PostSAVECONFIG' => '1',
    );
    foreach ($array as $value => $intro) {
        $zbp->Config('modules')->$value = $intro;
    }
}

function InstallPlugin_modules() {
    global $zbp;
    if (!$zbp->Config('modules')->HasKey('Version')) {
        modules_Config();
    }
    $zbp->Config('modules')->Version = '4.9';
    $zbp->SaveConfig('modules');
    modules_CreateModule();
}

function UninstallPlugin_modules() {
    global $zbp;
    if ($zbp->Config('modules')->PostSAVECONFIG == 0) {
        $zbp->DelConfig('modules');
    }
    //删除主题在模块管理中创建的模块
    modules_DelModule();
}