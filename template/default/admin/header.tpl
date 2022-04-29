<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$site_html_title} ´ÉÍý²èÌÌ</title>
<meta http-equiv="Content-Type" content="text/html; charset={$io_encoding}">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$site_meta_description}">
<meta name="keywords" content="{$site_meta_keywords}">
<meta name="robots" content="{$site_meta_robots}">
<meta name="author" content="{$site_meta_author}">
<link rel="stylesheet" type="text/css" href="common/common.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/thickbox.css" >
<link rel="stylesheet" type="text/css" href="css/wysiwyg.css">
<script type="text/javascript" src="js/prototype.js"></script>
<script language="text/javascript" src="common/common.js" ></script>
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">var $j = jQuery.noConflict();</script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script src="js/master.js" language="JavaScript"></script>

</head>
<body>
{literal}
<script type="text/javascript">
<!--
	// ¥×¥ë¥À¥¦¥ó¥á¥Ë¥å¡¼·Ï½èÍý
	function openPullDown(id) {
		closeAllPullDown();
		$j('#'+id).css('visibility','visible');
		$j('select').css('visibility','hidden');
	}
	function closePullDown(id) {
		$j('#'+id).css('visibility','hidden');
		$j('select').css('visibility','visible');
	}
	function closeAllPullDown() {
		closePullDown('nv_1');
		closePullDown('nv_2');
		closePullDown('nv_3');
		closePullDown('nv_4');
		closePullDown('nv_5');
		closePullDown('nv_6');
		closePullDown('nv_7');
		closePullDown('nv_8');
	}
	function insertTextForm(type){
		if(type == "type"){
			var obj=document.getElementById('type');
		}else if(type == "new_type"){
			var obj=document.getElementById('new_type');
		}else if(type == "exchange_range"){
			var obj=document.getElementById('exchange_range');
		}else if(type == "new_exchange_range"){
			var obj=document.getElementById('new_exchange_range');
		}else if(type == "sample"){
			var obj=document.getElementById('sample');
		}else{
			var obj=document.getElementById('new_sample');
		}
		if(type == "type"){
			var html='<br /><input type="text" name="item_type[]" value="">¡ß<input type="text" name="stock_num[]" value="">';
		}else if(type == "new_type"){
			var html='<br /><input type="text" name="new_item_type[]" value="">¡ß<input type="text" name="new_stock_num[]" value="">';
		}else if(type == "exchange_range"){
			var html='<br /><input type="text" name="exchange_range_start[]" value="">&nbsp;¡Á&nbsp;<input type="text" name="exchange_range_end[]" value="">¡§<input type="text" name="exchange_range_price[]" value="">';
		}else if(type == "new_exchange_range"){
			var html='<br /><input type="text" name="new_exchange_range_start[]" value="">&nbsp;¡Á&nbsp;<input type="text" name="new_exchange_range_end[]" value="">¡§<input type="text" name="new_exchange_range_price[]" value="">';
		}else if(type == "sample"){
			var html='<br /><input type="text" name="sample_name[]" value="">¡ß<input type="file" name="sample_image_file[]" value="">';
		}else{
			var html='<br /><input type="text" name="new_sample_name[]" value="">¡ß<input type="file" name="new_sample_image_file[]" value="">';
		}
		obj.insertAdjacentHTML('beforeBegin',html);
	}
-->
</script>
{/literal}
<!--****************** /*  #cotainer **********************-->
	<div id="container">
		<!--********* /* #header  **********-->
		<div id="header">
			<div id="header_inner">
				<h1><a href="./" id="top0">´ÉÍý²èÌÌ¥È¥Ã¥×</a></h1>
				{if $app.menu_hidden !=1}
				<!-- /* tnavi -->
				<div class="tnavi">
					<ul>
						<li class="menu1"><a onmouseover="openPullDown('nv_1')"></a></li>
						<li class="menu2"><a onmouseover="openPullDown('nv_2')"></a></li>
						<li class="menu3"><a onmouseover="openPullDown('nv_3')"></a></li>
						<li class="menu4"><a onmouseover="openPullDown('nv_4')"></a></li>
						<li class="menu5"><a onmouseover="openPullDown('nv_5')"></a></li>
						<li class="menu6"><a onmouseover="openPullDown('nv_6')"></a></li>
						<li class="menu7"><a onmouseover="openPullDown('nv_7')"></a></li>
						<li class="menu8"><a onmouseover="openPullDown('nv_8')"></a></li>
					</ul>
				</div>
				<!-- tnavi */ -->
				<!-- /* javascript menu box -->
				<div class="navi_children">
					<div id="nv_1" onmouseover="openPullDown('nv_1')" onmouseout="closePullDown('nv_1')">
						<ul>
							{if $smarty.session.auth_action_list.admin_user_list}
							<li><a href="?action_admin_user_list=true">{$ft.user.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_media_list}
							<li><a href="?action_admin_media_list=true">{$ft.media.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_analytics_day}
							<li><a href="?action_admin_analytics_day=true">{$ft.analytics.name}</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_blacklist_list}
							<li><a href="?action_admin_blacklist_list=true">{$ft.blacklist.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_report_list}
							<li><a href="?action_admin_report_list=true">{$ft.report.name}´ÉÍý</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_2" onmouseover="openPullDown('nv_2')" onmouseout="closePullDown('nv_2')">
						<ul>
							{if $smarty.session.auth_action_list.admin_magazine_list}
							<li><a href="?action_admin_magazine_list=true">{$ft.magazine.name}¥«¥ì¥ó¥À¡¼</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_magazine_add}
							<li><a href="?action_admin_magazine_add=true">{$ft.magazine.name}ÅÐÏ¿</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_segment_list}
							<li><a href="?action_admin_segment_list=true">{$ft.segment.name}´ÉÍý</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_3" onmouseover="openPullDown('nv_3')" onmouseout="closePullDown('nv_3')">
						<ul>
							{if $smarty.session.auth_action_list.admin_blog_article_list}
							<li><a href="?action_admin_blog_article_list=true">{$ft.blog_article.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_blog_comment_list}
							<li><a href="?action_admin_blog_comment_list=true">{$ft.blog_article.name}{$ft.blog_comment.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_community_list}
							<li><a href="?action_admin_community_list=true">{$ft.community.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_community_article_list}
							<li><a href="?action_admin_community_article_list=true">{$ft.community_article.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_community_comment_list}
							<li><a href="?action_admin_community_comment_list=true">{$ft.community.name}{$ft.community_comment.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_comment_list}
							<li><a href="?action_admin_comment_list=true">{$ft.comment.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_message_list}
							<li><a href="?action_admin_message_list=true">{$ft.message.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_bbs_list}
							<li><a href="?action_admin_bbs_list=true">{$ft.bbs.name}¸¡º÷</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_image_list}
							<li><a href="?action_admin_image_list=true">{$ft.image.name}¸¡º÷</a></li>
							{/if}
							{if $config.option.movie}
							{if $smarty.session.auth_action_list.admin_movie_list}
							<li><a href="?action_admin_movie_list=true">{$ft.movie.name}¸¡º÷</a></li>
							{/if}
							{/if}
							{if $smarty.session.auth_action_list.admin_user_friend_introduction_list}
							<li><a href="?action_admin_user_friend_introduction_list=true">{$ft.friend_introduction.name}¸¡º÷</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_4" onmouseover="openPullDown('nv_4')" onmouseout="closePullDown('nv_4')">
						<ul>
							{if $smarty.session.auth_action_list.admin_config_edit}
							<li><a href="?action_admin_config_edit=true">{$ft.config.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_config_user_prof}
							<li><a href="?action_admin_config_user_prof=true">{$ft.profile.name}¹àÌÜ´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_config_community_category}
							<li><a href="?action_admin_config_community_category=true">{$ft.community_category.name}ÊÑ¹¹</a></li>
							{/if}
							{if $session.admin.admin_status > 0}
							{if $smarty.session.auth_action_list.admin_account_list}
							<li><a href="?action_admin_account_list=true">{$ft.account.name}´ÉÍý</a></li>
							{/if}
							{/if}
						</ul>
					</div>
					<div id="nv_5" onmouseover="openPullDown('nv_5')" onmouseout="closePullDown('nv_5')">
						<ul>
							{if $config.option.point}
							{if $smarty.session.auth_action_list.admin_ad_list}
							<li><a href="?action_admin_ad_list=true">{$ft.ad.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_admenu_edit}
							<li><a href="?action_admin_admenu_edit=true">{$ft.admenu.name}´ÉÍý</a></li>
							{/if}
							{/if}
							{if $smarty.session.auth_action_list.admin_banner_list}
							<li><a href="?action_admin_banner_list=true">{$ft.banner.name}´ÉÍý</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_6" onmouseover="openPullDown('nv_6')" onmouseout="closePullDown('nv_6')">
						<ul>
							{if $smarty.session.auth_action_list.admin_news_list}
							<li><a href="?action_admin_news_list=true">{$ft.news.name}´ÉÍý</a></li>
							{/if}
							{if $config.option.point}
							{if $smarty.session.auth_action_list.admin_point_list}
							<li><a href="?action_admin_point_list=true">{$ft.point.name}´ÉÍý</a></li>
							{/if}
							{/if}
							{if $config.option.avatar}
							{if $smarty.session.auth_action_list.admin_avatarcategory_list}
							<li><a href="?action_admin_avatar_list=true">{$ft.avatar.name}´ÉÍý</a></li>
							{/if}
							{/if}	
							{if $config.option.decomail}
							{if $smarty.session.auth_action_list.admin_decomailcategory_list}
							<li><a href="?action_admin_decomail_list=true">{$ft.decomail.name}´ÉÍý</a></li>
							{/if}
							{/if}
							{if $config.option.game}
							{if $smarty.session.auth_action_list.admin_gamecategory_list}
							<li><a href="?action_admin_game_list=true">{$ft.game.name}´ÉÍý</a></li>
							{/if}
							{/if}
							{if $config.option.sound}
							{if $smarty.session.auth_action_list.admin_soundcategory_list}
							<li><a href="?action_admin_sound_list=true">{$ft.sound.name}´ÉÍý</a></li>
							{/if}
							{/if}
							{if $smarty.session.auth_action_list.admin_contents_list}
							<li><a href="?action_admin_contents_list=true">{$ft.contents.name}´ÉÍý</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_7" onmouseover="openPullDown('nv_7')" onmouseout="closePullDown('nv_7')">
						<ul>
							{if $smarty.session.auth_action_list.admin_ec_review_list}
							<li><a href="?action_admin_ec_review_list=true">{$ft.review.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_userorder_list}
							<li><a href="?action_admin_ec_userorder_list=true">{$ft.user_order.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_shop_list}
							<li><a href="?action_admin_ec_shop_list=true">{$ft.shop.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_itemcategory_list}
							<li><a href="?action_admin_ec_itemcategory_list=true">{$ft.item_category.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_item_list}
							<li><a href="?action_admin_ec_item_list=true">{$ft.item.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_supplier_list}
							<li><a href="?action_admin_ec_supplier_list=true">{$ft.supplier.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_postage_list}
							<li><a href="?action_admin_ec_postage_list=true">{$ft.postage.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_ec_exchange_list}
							<li><a href="?action_admin_ec_exchange_list=true">{$ft.exchange.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_config_edit}
							<li><a href="?action_admin_config_edit=true&site_type=mall">{$ft.ec.name}{$ft.config.name}´ÉÍý</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_8" onmouseover="openPullDown('nv_8')" onmouseout="closePullDown('nv_8')">
						<ul>
							{if $smarty.session.auth_action_list.admin_stats_list}
							<li><a href="?action_admin_stats_list=true&type=access&term=month">{$ft.stats.name}</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_htmltemplate_list}
							<li><a href="?action_admin_htmltemplate_list=true">{$ft.htmltemplate.name}´ÉÍý</a></li>
							{/if}
							{if $smarty.session.auth_action_list.admin_mailtemplate_list}
							<li><a href="?action_admin_mailtemplate_list=true">{$ft.mailtemplate.name}´ÉÍý</a></li>
							{/if}
							<li><a href="?action_admin_util=true&page=faq_index">{$ft.faq.name}</a></li>
							{if $smarty.session.auth_action_list.admin_emoji}
							<li><a href="#" onClick="javascript:void(window.open('?action_admin_emoji=true','{$ft.emoji.name}','width=400,height=400,scrollbars=yes'))">{$ft.emoji.name}</a></li>
							{/if}
							{if $config.option.ngword}
							{if $smarty.session.auth_action_list.admin_ngword_edit}
							<li><a href="?action_admin_ngword_edit=true">{$ft.ngword.name}ÀßÄê</a></li>
							{/if}
							{/if}
							<li><a href="?action_admin_logout_do=true">{$ft.logout.name}</a></li>
						</ul>
					</div>
				</div>
				<!-- javascript menu box */-->
				{/if}
			</div>
		</div>
		<!--********* #header */ **********-->
