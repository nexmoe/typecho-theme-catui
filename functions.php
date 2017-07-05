<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);
function  themeConfig ($form){
	$nversion='2.0';
	$lversion=file_get_contents("https://i.chainwon.com/version.txt");
	if ($lversion>$nversion){
		echo '<p style="font-size:18px;">你正在使用 <a>'.$nversion.'</a> 版本的Cat UI，最新版本为 <a style="color:red;">'.$lversion.'</a><a href="https://i.chainwon.com/catui.html"><button type="submit" class="btn btn-warn" style="margin-left:10px;">前往更新</button></a></p>';
	}else {
		echo '<p style="font-size:18px;">你正在使用最新版的Cat  UI！</p>';
	}
	$logoUrl=new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,NULL,_t ('喵咪の男主人的头像'),_t ('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput ($logoUrl);
	$background=new Typecho_Widget_Helper_Form_Element_Text('background',NULL,NULL,_t ('喵咪の背景'),_t ('在这里填入一个图片URL地址, 给猫咪添加一个背景图片'));
	$form->addInput ($background);
	$supportzfb=new Typecho_Widget_Helper_Form_Element_Text('supportzfb',NULL,NULL,_t ('喵咪の主人的支付宝付款二维码'),_t (''));
	$form->addInput ($supportzfb);
	$supportqq=new Typecho_Widget_Helper_Form_Element_Text('supportqq',NULL,NULL,_t ('喵咪の主人的腾讯QQ付款二维码'),_t (''));
	$form->addInput ($supportqq);
	$supportwx=new Typecho_Widget_Helper_Form_Element_Text('supportwx',NULL,NULL,_t ('喵咪の主人的微信付款二维码'),_t (''));
	$form->addInput ($supportwx);
	$tongji=new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,NULL,_t ('喵咪の主人的统计代码'),_t ('为你的网站添加统计代码'));
	$form->addInput ($tongji);
	$Cover=new Typecho_Widget_Helper_Form_Element_Radio('Cover',array ('2'=>_t ('文章标题'),'5'=>_t ('自定义Cover'),'6'=>_t ('自定义Cover+标题')),'1',_t ('喵咪の主人的Cover模式'),_t ("<b>第一张图片+标题：</b>若文章有图片，则优先将文章内第一张图片设置为Cover，当没有图片时，会将标题设置为Cover。<br><b>文章标题：</b>标题设置为Cover。<br><b>第一张图片：</b>将文章内第一张图片设置为Cover。"));
	$form->addInput ($Cover);
	$OtherTool=new Typecho_Widget_Helper_Form_Element_Checkbox('OtherTool',array ('copyright'=>_t ('喵咪の绒毛（原创文章保护信息）'),'hitokoto'=>_t ('喵咪の鸡汤（文章内显示一言一句话）'),'share'=>_t ('喵咪の分享（文章内显示社交分享按钮）'),'smoothscroll'=>_t ('喵咪の柔软（开启SmoothScroll平滑滚动）'),'pages'=>_t ('喵咪の两身（文章内显示上一篇文章以及下一篇文章）'),'footercopyright'=>_t ('喵咪の尾巴（博客页脚版权信息）')),array ('copyright','hitokoto','share','smoothscroll','pages','footercopyright'),_t ('其他工具'));
	$form->addInput ($OtherTool->multiMode ());
}
function themeFields($layout) {
    $Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover', NULL, NULL, _t('自定义缩略图'), _t('输入缩略图地址'));
    $layout->addItem($Cover);
}
function  Cover ($cid,$Cover){
	$options=Typecho_Widget::widget ('Widget_Options');
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text','table.contents.title')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	
	$colorid=rand(1,6);
	switch ($colorid){
		case  1:
			$color='rgb(255, 156, 173)';
			break ;
		case  2:
			$color='rgb(244, 167, 185)';
			break ;
		case  3:
			$color='rgb(162, 153, 218)';
			break ;
		case  4:
			$color='rgb(253, 205, 155)';
			break ;
		case  5:
			$color='rgb(140, 223, 207)';
			break ;
		case  6:
			$color='rgb(162, 197, 253)';
			break ;
	}
	if ($options->Cover =='2'){
		echo '<div class="cover btn"><p style="background:'.$color.';">'.$rs['title'].'</p></div>';
	}
	elseif ($options->Cover =='5'){
		if ($Cover != ""){
			echo '<div class="cover btn"><img src="'.$Cover.'"><div class="title">'.$rs['title'].'</div></div>';
		}else {
			echo '<div class="cover btn"><img src="'.$options->background.'"><div class="title">'.$rs['title'].'</div></div>';
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo '<div class="cover btn"><img src="'.$Cover.'"><div class="title">'.$rs['title'].'</div></div>';
		}else {
			echo '<div class="cover btn"><p style="background:'.$color.';">'.$rs['title'].'</p></div>';
		}
	}
}
function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	$text=preg_replace("/[^\x{4e00}-\x{9fa5}]/u","",$rs['text']);
	echo mb_strlen($text,'UTF-8');
}
function  img_postthumb ($cid,$Cover){
	$options=Typecho_Widget::widget ('Widget_Options');

    if ($options->Cover =='2'){
		echo $options->background;
	}
	elseif ($options->Cover =='5'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
}
function  get_post_view ($archive){
	$cid=$archive->cid ;
	$db=Typecho_Db::get ();
	$prefix=$db->getPrefix ();
	if (!array_key_exists('viewsNum',$db->fetchRow ($db->select ()->from ('table.contents')))){
		$db->query ('ALTER TABLE `'.$prefix.'contents` ADD `viewsNum` INT(10) DEFAULT 0;');
		echo 0;
		return ;
	}
	$row=$db->fetchRow ($db->select ('viewsNum')->from ('table.contents')->where ('cid = ?',$cid));
	if ($archive->is ('single')){
		$views=Typecho_Cookie::get ('extend_contents_viewsNum');
		if (empty($views)){
			$views=array ();
		}else {
			$views=explode(',',$views);
		}
		if (!in_array($cid,$views)){
			$db->query ($db->update ('table.contents')->rows (array ('viewsNum'=>(int )$row['viewsNum']+1))->where ('cid = ?',$cid));
			array_push($views,$cid);
			$views=implode(',',$views);
			Typecho_Cookie::set ('extend_contents_viewsNum',$views);
			//记录查看cookie
		}
	}
	echo $row['viewsNum'];
}
function  girlname (){
	$uid=Typecho_Widget::widget ('Widget_Options')->girlid ;
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.users.screenName')->from ('table.users')->where ('table.users.uid=?',$uid)->order ('table.users.uid',Typecho_Db::SORT_ASC)->limit (1));
	echo $rs['screenName'];
}
function getCommentAt($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a class="at" href="#comment-'.$parent.'">回复 '.$author.':</a> ';
        echo $href;
    } else {
        echo '';
    }
}
?>