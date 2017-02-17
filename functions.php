
<?php
function  themeConfig ($form){
	$nversion='1.0';
	$lversion=file_get_contents("https://i.chainwon.com/version.txt");
	if ($lversion>$nversion){
		echo '<p style="font-size:18px;">你正在使用 <a>'.$nversion.'</a> 版本的Cat UI，最新版本为 <a style="color:red;">'.$lversion.'</a><a href="https://i.chainwon.com/catui.html"><button type="submit" class="btn btn-warn" style="margin-left:10px;">前往更新</button></a></p>';
	}else {
		echo '<p style="font-size:18px;">你正在使用最新版的Cat  UI！</p>';
	}
	$logoUrl=new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,NULL,_t ('站点LOGO地址'),_t ('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput ($logoUrl);
	$duoshuo=new Typecho_Widget_Helper_Form_Element_Text('duoshuo',NULL,NULL,_t ('多说short_name'),_t ('暂时仅支持多说评论框'));
	$form->addInput ($duoshuo);
	$tongji=new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,NULL,_t ('统计代码'),_t ('为你的网站添加统计代码'));
	$form->addInput ($tongji);
	$Cover=new Typecho_Widget_Helper_Form_Element_Radio('Cover',array ('1'=>_t ('第一张图片+标题'),'2'=>_t ('文章标题'),'3'=>_t ('第一张图片'),'4'=>_t ('关闭Cover')),'1',_t ('Cover模式'),_t ("<b>第一张图片+标题：</b>若文章有图片，则优先将文章内第一张图片设置为Cover，当没有图片时，会将标题设置为Cover。<br><b>文章标题：</b>标题设置为Cover。<br><b>第一张图片：</b>将文章内第一张图片设置为Cover。"));
	$form->addInput ($Cover);
	$OtherTool=new Typecho_Widget_Helper_Form_Element_Checkbox('OtherTool',array ('copyright'=>_t ('原创文章保护信息'),'hitokoto'=>_t ('文章内显示一言一句话'),'share'=>_t ('文章内显示社交分享按钮')),array ('copyright','hitokoto','share'),_t ('其他工具'));
	$form->addInput ($OtherTool->multiMode ());
}
function  Cover ($cid){
	$options=Typecho_Widget::widget ('Widget_Options');
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text','table.contents.title')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$rs['text'],$thumbUrl);
	$img_src=$thumbUrl[1][0];
	$img_counter=count($thumbUrl[0]);
	$colorid=rand(1,3);
	switch ($colorid){
		case  1:
			$color='rgb(43, 195, 206)';
			break ;
		case  2:
			$color='rgb(244, 164, 164)';
			break ;
		case  3:
			$color='rgb(130, 124, 170)';
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
	echo mb_strlen($rs['text'],'UTF-8');
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
