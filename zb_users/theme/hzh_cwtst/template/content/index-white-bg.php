{php}
// 指定的分类名称
$specialNames = array('长春新闻', '长春房产');

// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组

// 初始化数组
$specialCats = array(); // 长春新闻、长春房产
$otherCats1 = array();
$otherCats2 = array();

foreach ($allCategories as $i => $cat) {
    if (in_array($cat->Name, $specialNames)) {
        $specialCats[] = $cat;
    } else {
        if ($i <= 4) {
            $otherCats1[] = $cat;
        } else {
            $otherCats2[] = $cat;
        }
    }
}

// 合并成二维数组
$otherCats = array($otherCats1, $otherCats2);
{/php}

{foreach $specialCats as $cat}
{template:content/index-white-content1}
{/foreach}

{foreach $otherCats as $onceCates}
{template:content/index-white-content2}
{/foreach}

{template:content/index-white-content3}

{template:content/index-white-content4}