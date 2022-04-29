<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$sns_html_title} ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset={$io_encoding}">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$sns_meta_description}">
<meta name="keywords" content="{$sns_meta_keywords}">
<meta name="robots" content="{$sns_meta_robots}">
<meta name="author" content="{$sns_meta_author}">
<link rel="stylesheet" type="text/css" href="common/common.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/sns.css">
<link rel="stylesheet" type="text/css" href="css/thickbox.css" >
<link rel="stylesheet" type="text/css" href="css/wysiwyg.css">
<script type="text/javascript" src="js/prototype.js"></script>
<script language="text/javascript" src="common/common.js" ></script>
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">var $j = jQuery.noConflict();</script>
<script type="text/javascript" src="js/thickbox.js"></script>
</head>
<body>
{literal}
<script type="text/javascript">
<!--
	// �ץ�������˥塼�Ͻ���
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
-->
</script>
{/literal}
<!--****************** /*  #cotainer **********************-->
	<div id="container">
		<!--********* /* #header  **********-->
		<div id="header">
				<h1><a href="./">�������̥ȥå�</a></h1>
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
							<li><a href="?action_admin_user_list=true">�桼������</a></li>
							<li><a href="?action_admin_media_list=true">�����ϩ����</a></li>
							<li><a href="?action_admin_analytics_day=true">�����������ݡ���</a></li>
						</ul>
					</div>
					<div id="nv_2" onmouseover="openPullDown('nv_2')" onmouseout="closePullDown('nv_2')">
						<ul>
							<li><a href="?action_admin_magazine_list=true">���ޥ���������</a></li>
							<li><a href="?action_admin_magazine_add=true">���ޥ��ɲ�</a></li>
							<li><a href="?action_admin_segment_list=true">�������ȴ���</a></li>
						</ul>
					</div>
					<div id="nv_3" onmouseover="openPullDown('nv_3')" onmouseout="closePullDown('nv_3')">
						<ul>
							<li><a href="?action_admin_blog_article_list=true">������������</a></li>
							<li><a href="?action_admin_blog_comment_list=true">���������ȸ���</a></li>
							<li><a href="?action_admin_community_add=true">���ߥ�˥ƥ���Ͽ</a></li>
							<li><a href="?action_admin_community_list=true">���ߥ�˥ƥ�����</a></li>
							<li><a href="?action_admin_community_article_list=true">���ߥ�˥ƥ��ȥԥå�����</a></li>
							<li><a href="?action_admin_community_comment_list=true">���ߥ�˥ƥ������ȸ���</a></li>
								<li><a href="?action_admin_comment_list=true">�����ȸ���</a></li>
							<li><a href="?action_admin_message_list=true">��å���������</a></li>
							<li><a href="?action_admin_bbs_list=true">������å���������</a></li>
							<li><a href="?action_admin_blacklist_list=true">�֥�å��ꥹ�ȴ���</a></li>
							<li><a href="?action_admin_report_list=true">�������</a></li>
							<li><a href="?action_admin_image_list=true">��������</a></li>
							<li><a href="?action_admin_user_friend_introduction_list=true">�Ҳ�ʸ����</a></li>
							{if $config.option.movie}
							<li><a href="?action_admin_movie_list=true">ư�踡��</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_4" onmouseover="openPullDown('nv_4')" onmouseout="closePullDown('nv_4')">
						<ul>
							<li><a href="?action_admin_config_edit=true">���ܾ������</a></li>
							<li><a href="?action_admin_config_user_prof=true">�ץ�ե�������ܴ���</a></li>
							<li><a href="?action_admin_config_community_category=true">���ߥ�˥ƥ����ƥ����ѹ�</a></li>
							{if $session.admin.admin_status > 0}
							<li><a href="?action_admin_account_list=true">�����ԥ�������ȴ���</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_5" onmouseover="openPullDown('nv_5')" onmouseout="closePullDown('nv_5')">
						<ul>
							{if $config.option.point}
							<li><a href="?action_admin_ad_list=true">{$ft.ad.name}����</a></li>
							<li><a href="?action_admin_admenu_edit=true">{$ft.ad.name}��˥塼����</a></li>
							{/if}
							<li><a href="?action_admin_banner_list=true">�Хʡ�����</a></li>
						</ul>
					</div>
					<div id="nv_6" onmouseover="openPullDown('nv_6')" onmouseout="closePullDown('nv_6')">
						<ul>
							<li><a href="?action_admin_news_list=true">�˥塼������</a></li>
							{if $config.option.point}
							<li><a href="?action_admin_point_list=true">{$ft.point.name}����</a></li>
							{/if}
							{if $config.option.avatar}
							<li><a href="?action_admin_avatar_list=true">{$ft.avatar.name}����</a></li>
							{/if}
							{if $config.option.decomail}
							<li><a href="?action_admin_decomail_list=true">{$ft.decomail.name}����</a></li>
							{/if}
							{if $config.option.game}
							<li><a href="?action_admin_game_list=true">{$ft.game.name}����</a></li>
							{/if}
							{if $config.option.sound}
							<li><a href="?action_admin_sound_list=true">{$ft.sound.name}����</a></li>
							{/if}
							<li><a href="?action_admin_contents_list=true">{$ft.contents.name}����</a></li>
						</ul>
					</div>
					<div id="nv_7" onmouseover="openPullDown('nv_7')" onmouseout="closePullDown('nv_7')">
						<ul>
							<li><a href="?action_admin_stats_list=true&type=access&term=month">������������</a></li>
							<li><a href="?action_admin_mailtemplate_list=true">�᡼��ƥ�ץ졼�ȴ���</a></li>
							<li><a href="?action_admin_util=true&page=faq_index">�������ޥ˥奢��</a></li>
							<li><a href="#" onClick="javascript:void(window.open('?action_admin_emoji=true','��ʸ���ѥ�å�','width=400,height=400,scrollbars=yes'))">��ʸ���ѥ�å�</a></li>
							{if $config.option.ngword}
							<li><a href="?action_admin_ngword_edit=true">NG�������</a></li>
							{/if}
						</ul>
					</div>
					<div id="nv_8" onmouseover="openPullDown('nv_8')" onmouseout="closePullDown('nv_8')">
						<ul>
							<li><a href="?action_admin_logout_do=true">��������</a></li>
						</ul>
					</div>
				</div>
				<!-- javascript menu box */-->
				{/if}
		</div>
		<!--********* #header */ **********-->
