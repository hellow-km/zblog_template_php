<?php
$myTest="This is my test API file.";

// 使用链式语法生成 SQL 语句
$sql = $zbp->db->sql->get()
    ->select('log_Title')  // 使用 '*' 来选择所有字段
    ->from($zbp->table['Post'])  // 指定查询的表
                    ->where(array('=', 'log_ID', "1"))
                    ->sql;
// 执行 SQL 语句并返回结果
$array = $zbp->db->Query($sql);
$log_Title= "";
// 提取 log_Title 字段并输出
if (!empty($array)) {
   $log_Title=htmlspecialchars($array[0]['log_Title']);
}