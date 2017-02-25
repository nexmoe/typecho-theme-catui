<?php
function  themeConfig ($form){
	$nversion='1.1';
	$lversion=file_get_contents("https://i.chainwon.com/version.txt");
	if ($lversion>$nversion){
		echo '<p style="font-size:18px;">你正在使用 <a>'.$nversion.'</a> 版本的Cat UI，最新版本为 <a style="color:red;">'.$lversion.'</a><a href="https://i.chainwon.com/catui.html"><button type="submit" class="btn btn-warn" style="margin-left:10px;">前往更新</button></a></p>';
	}else {
		echo '<p style="font-size:18px;">你正在使用最新版的Cat  UI！</p>';
	}
	$logoUrl=new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,NULL,_t ('喵咪の主人的头像'),_t ('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput ($logoUrl);
	
	$duoshuo=new Typecho_Widget_Helper_Form_Element_Text('duoshuo',NULL,NULL,_t ('喵咪の主人的多说short_name'),_t ('暂时仅支持多说评论框'));
	$form->addInput ($duoshuo);
	
	$supportzfb=new Typecho_Widget_Helper_Form_Element_Text('supportzfb',NULL,NULL,_t ('喵咪の主人的支付宝付款二维码'),_t (''));
	$form->addInput ($supportzfb);
	
	$supportqq=new Typecho_Widget_Helper_Form_Element_Text('supportqq',NULL,NULL,_t ('喵咪の主人的腾讯QQ付款二维码'),_t (''));
	$form->addInput ($supportqq);
	
	$supportwx=new Typecho_Widget_Helper_Form_Element_Text('supportwx',NULL,NULL,_t ('喵咪の主人的微信付款二维码'),_t (''));
	$form->addInput ($supportwx);
	
	$tongji=new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,NULL,_t ('喵咪の主人的统计代码'),_t ('为你的网站添加统计代码'));
	$form->addInput ($tongji);
	
	$Cover=new Typecho_Widget_Helper_Form_Element_Radio('Cover',array ('1'=>_t ('第一张图片+标题'),'2'=>_t ('文章标题'),'3'=>_t ('第一张图片'),'4'=>_t ('关闭Cover')),'1',_t ('喵咪の主人的Cover模式'),_t ("<b>第一张图片+标题：</b>若文章有图片，则优先将文章内第一张图片设置为Cover，当没有图片时，会将标题设置为Cover。<br><b>文章标题：</b>标题设置为Cover。<br><b>第一张图片：</b>将文章内第一张图片设置为Cover。"));
	$form->addInput ($Cover);
	$OtherTool=new Typecho_Widget_Helper_Form_Element_Checkbox('OtherTool',array ('copyright'=>_t ('喵咪の绒毛（原创文章保护信息）'),'hitokoto'=>_t ('喵咪の鸡汤（文章内显示一言一句话）'),'share'=>_t ('喵咪の分享（文章内显示社交分享按钮）'),'smoothscroll'=>_t ('喵咪の柔软（开启SmoothScroll平滑滚动）'),'pages'=>_t ('喵咪の两身（文章内显示上一篇文章以及下一篇文章）'),'footercopyright'=>_t ('喵咪の尾巴（博客页脚版权信息）')),array ('copyright','hitokoto','share','smoothscroll','pages','footercopyright'),_t ('其他工具'));
	$form->addInput ($OtherTool->multiMode ());
}
function  Cover ($cid){
	$options=Typecho_Widget::widget ('Widget_Options');
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text','table.contents.title')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$rs['text'],$thumbUrl);
	$img_src=$thumbUrl[1][0];
	$img_counter=count($thumbUrl[0]);
	$colorid=rand(1,6);
	switch ($colorid){
		case  1:
			$color='rgb(255, 156, 173)';
			break ;
		case  2:
			$color='rgb(244, 164, 164)';
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
	if ($options->Cover =='1'){
		if ($img_counter>0){
			echo '<div class="cover flat-icon-light waves-effect waves-circle waves-light"><img src="'.$img_src.'"></div>';
		}else {
			echo '<div class="cover flat-icon-light waves-effect waves-circle waves-light"><p style="background:'.$color.';">'.$rs['title'].'</p></div>';
		}
	}elseif ($options->Cover =='2'){
		echo '<div class="cover flat-icon-light waves-effect waves-circle waves-light"><p style="background:'.$color.';">'.$rs['title'].'</p></div>';
	}elseif ($options->Cover =='3'){
		if ($img_counter>0){
			echo '<div class="cover flat-icon-light waves-effect waves-circle waves-light"><img src="'.$img_src.'"></div>';
		}else {
			echo '';
		}
	}elseif ($options->Cover =='4'){
		echo '';
	}
}
function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	$text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
	echo mb_strlen($text,'UTF-8');
}
function  hitokoto (){
	$html=file_get_contents("http://api.hitokoto.us/rand");
	$json=json_decode($html);
	echo $json->hitokoto ;
}
function  img_postthumb ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$rs['text'],$thumbUrl);
	$img_src=$thumbUrl[1][0];
	$img_counter=count($thumbUrl[0]);
	if ($img_counter>0){
		echo $img_src;
	}else {
		echo "";
	}
}
function get_post_view($archive){
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('viewsNum', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `viewsNum` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('viewsNum')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_viewsNum');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('viewsNum' => (int) $row['viewsNum'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_viewsNum', $views); //记录查看cookie
        }
    }
    echo $row['viewsNum'];
}