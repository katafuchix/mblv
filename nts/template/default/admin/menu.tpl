{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>������˥塼</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<blockquote>
			<a href="?action_admin_util=true&page=faq_index">2008/02/28 �������ޥ˥奢��򹹿����ޤ�����</a>
			</blockquote>
			<!--table class="sheet"-->
			<table>
				<tr>
					<td valign="top">
						<ul>
							<li>�桼������</li>
							<ul>
								<li><a href="?action_admin_user_list=true">�桼������</a></li>
								<li><a href="?action_admin_media_list=true">�����ϩ����</a></li>
								<li><a href="?action_admin_analytics_day=true">�����������ݡ���</a></li>
							</ul>
							<li>���ޥ�����</li>
							<ul>
								<li><a href="?action_admin_magazine_list=true">���ޥ���������</a></li>
								<li><a href="?action_admin_magazine_add=true">���ޥ��ɲ�</a></li>
								<li><a href="?action_admin_segment_list=true">�������ȴ���</a></li>
							</ul>
							<li>��ƴ���</li>
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
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>��������</li>
							<ul>
								<li><a href="?action_admin_config_edit=true">���ܾ������</a></li>
								<li><a href="?action_admin_config_user_prof=true">�ץ�ե�������ܴ���</a></li>
								<li><a href="?action_admin_config_community_category=true">���ߥ�˥ƥ����ƥ����ѹ�</a></li>
								{if $session.admin.admin_status > 0}
								<li><a href="?action_admin_account_list=true">�����ԥ�������ȴ���</a></li>
								{/if}
							</ul>
							<li>�������</li>
							<ul>
								{if $config.option.point}
								<li><a href="?action_admin_ad_list=true">{$ft.ad.name}����</a></li>
								<li><a href="?action_admin_admenu_edit=true">{$ft.ad.name}��˥塼����</a></li>
								{/if}
								<li><a href="?action_admin_banner_list=true">�Хʡ�����</a></li>
							</ul>
							<li>����ƥ�Ĵ���</li>
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
								<li><a href="?action_admin_thema_edit=true">{$ft.thema.name}����</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>�桼�ƥ���ƥ�</li>
							<ul>
								<li><a href="?action_admin_stats_list=true&type=access&term=month">������������</a></li>
								<li><a href="?action_admin_mailtemplate_list=true">�᡼��ƥ�ץ졼�ȴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_index">�������ޥ˥奢��</a></li>
								<li><a href="#" onClick="javascript:void(window.open('?action_admin_emoji=true','��ʸ���ѥ�å�','width=400,height=400,scrollbars=yes'))">��ʸ���ѥ�å�</a></li>
								{if $config.option.ngword}
								<li><a href="?action_admin_ngword_edit=true">NG�������</a></li>
								{/if}
							</ul>
							<li>��������</li>
							<ul>
								<li><a href="?action_admin_logout_do=true">��������</a></li>
							</ul>
						</ul>
					</td>
				</tr>
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
