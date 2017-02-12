
<?php
function  img_postthumb ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$rs['text'],$thumbUrl);
	//通过正则式获取图片地址
	$img_src=$thumbUrl[1][0];
	//将赋值给img_src
	$img_counter=count($thumbUrl[0]);
	//一个src地址的计数器
	switch ($img_counter>0){
		case  $allPics=1:
			echo $img_src;
			//当找到一个src地址的时候，输出缩略图
			break ;
		default :
			echo "";
			//没找到(默认情况下)，不输出任何内容
		}
	}
	function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	echo mb_strlen($rs['text'],'UTF-8');
}
function hitokoto () {
    $html = file_get_contents("http://api.hitokoto.us/rand");
    $json = json_decode($html);
    echo $json->hitokoto;
}
function themeConfig($form) {
    $nversion = '0.9';
    $lversion = file_get_contents("https://i.chainwon.com/version.txt");
    if($lversion > $nversion){
        echo '<p style="font-size:18px;">你正在使用 <a>'.$nversion.'</a> 版本的Cat UI，最新版本为 <a style="color:red;">'.$lversion.'</a><a href="https://i.chainwon.com/catui.html"><button type="submit" class="btn btn-warn" style="margin-left:10px;">前往更新</button></a></p>';
    }else{
        echo '<p style="font-size:18px;">你正在使用最新版的Cat  UI！</p>';
    }
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $duoshuo = new Typecho_Widget_Helper_Form_Element_Text('duoshuo', NULL, NULL, _t('多说short_name'), _t('暂时仅支持多说评论框'));
    $form->addInput($duoshuo);
    
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('统计代码'), _t('为你的网站添加统计代码'));
    $form->addInput($tongji);
    
    $OtherTool = new Typecho_Widget_Helper_Form_Element_Checkbox('OtherTool', 
    array(
    'copyright' => _t('原创文章保护信息'),
    'hitokoto' => _t('文章内显示一言一句话'),
    'cover' => _t('获取文章内第一张图片为cover图片'),
    'share' => _t('文章内显示社交分享按钮')
    ),
    array('copyright', 'hitokoto', 'share'), _t('其他工具'));

    $form->addInput($OtherTool->multiMode());
}