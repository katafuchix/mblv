{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�������ޥ˥奢��FAQ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<table>
				<tr>
					<td valign="top">
						<ul>
							<li>�桼������</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_user_list&TB_iframe=true&height=700&width=700" title="�桼������" class="thickbox">�桼������</a></li>
								<li><a href="?action_admin_util=true&page=faq_media&TB_iframe=true&height=700&width=700" title="�����ϩ����" class="thickbox">�����ϩ����</a></li>
								<li><a href="?action_admin_util=true&page=faq_analytics&TB_iframe=true&height=700&width=700" title="�����������ݡ���" class="thickbox">�����������ݡ���</a></li>
							</ul>
							<li>���ޥ�����</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_magazine_list&TB_iframe=true&height=700&width=700" title="���ޥ���������" class="thickbox">���ޥ���������</a></li>
								<li><a href="?action_admin_util=true&page=faq_magazine_add&TB_iframe=true&height=700&width=700" title="���ޥ��ɲ�" class="thickbox">���ޥ��ɲ�</a></li>
								<li><a href="?action_admin_util=true&page=faq_segment&TB_iframe=true&height=700&width=700" title="�������ȴ���" class="thickbox">�������ȴ���</a></li>
							</ul>
							<li>��ƴ���</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_blog_article_list&TB_iframe=true&height=700&width=700" title="��������" class="thickbox">��������</a></li>
								<li><a href="?action_admin_util=true&page=faq_blog_comment_list&TB_iframe=true&height=700&width=700" title="���������ȸ���" class="thickbox">���������ȸ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_add&TB_iframe=true&height=700&width=700" title="���ߥ�˥ƥ���Ͽ" class="thickbox">���ߥ�˥ƥ���Ͽ</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_list&TB_iframe=true&height=700&width=700" title="���ߥ�˥ƥ�����" class="thickbox">���ߥ�˥ƥ�����</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_article_list&TB_iframe=true&height=700&width=700" title="���ߥ�˥ƥ��ȥԥå�����" class="thickbox">���ߥ�˥ƥ��ȥԥå�����</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_comment_list&TB_iframe=true&height=700&width=700" title="���ߥ�˥ƥ������ȸ���" class="thickbox">���ߥ�˥ƥ������ȸ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_comment_list&TB_iframe=true&height=700&width=700" title="�ե����븡��" class="thickbox">�����ȸ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_message_list&TB_iframe=true&height=700&width=700" title="��å���������" class="thickbox">��å���������</a></li>
								<li><a href="?action_admin_util=true&page=faq_bbs_list&TB_iframe=true&height=700&width=700" title="������å���������" class="thickbox">������å���������</a></li>
								<li><a href="?action_admin_util=true&page=faq_black_list_list&TB_iframe=true&height=700&width=700" title="�֥�å��ꥹ�ȴ���" class="thickbox">�֥�å��ꥹ�ȴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_report_list&TB_iframe=true&height=700&width=700" title="�������" class="thickbox">�������</a></li>
								<li><a href="?action_admin_util=true&page=faq_file_list&TB_iframe=true&height=700&width=700" title="��������" class="thickbox">��������</a></li>
								<li><a href="?action_admin_util=true&page=faq_user_introduction_list&TB_iframe=true&height=700&width=700" title="�Ҳ�ʸ����" class="thickbox">�Ҳ�ʸ����</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>��������</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_config_edit&TB_iframe=true&height=700&width=700" title="���ܾ������" class="thickbox">���ܾ������</a></li>
								<li><a href="?action_admin_util=true&page=faq_profile_edit&TB_iframe=true&height=700&width=700" title="�ץ�ե�������ܴ���" class="thickbox">�ץ�ե�������ܴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_category_edit&TB_iframe=true&height=700&width=700" title="���ߥ�˥ƥ����ƥ����ѹ�" class="thickbox">���ߥ�˥ƥ����ƥ����ѹ�</a></li>
								<li><a href="?action_admin_util=true&page=faq_account_list&TB_iframe=true&height=700&width=700" title="�����ԥ�������ȴ���" class="thickbox">�����ԥ�������ȴ���</a></li>
							</ul>
							<li>�������</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_ad_list&TB_iframe=true&height=700&width=700" title="�������" class="thickbox">�������</a></li>
								<li><a href="?action_admin_util=true&page=faq_admenu_edit&TB_iframe=true&height=700&width=700" title="�����˥塼����" class="thickbox">�����˥塼����</a></li>
								<li><a href="?action_admin_util=true&page=faq_banner_list&TB_iframe=true&height=700&width=700" title="�Хʡ�����" class="thickbox">�Хʡ�����</a></li>
							</ul>
							<li>����ƥ�Ĵ���</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_news_list&TB_iframe=true&height=700&width=700" title="�˥塼������" class="thickbox">�˥塼������</a></li>
								<li><a href="?action_admin_util=true&page=faq_point_list&TB_iframe=true&height=700&width=700" title="�ʥѥݴ���" class="thickbox">�ʥѥݴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_avatar_list&TB_iframe=true&height=700&width=700" title="���Х�������" class="thickbox">���Х�������</a></li>
								<li><a href="?action_admin_util=true&page=faq_decomail_list&TB_iframe=true&height=700&width=700" title="�ǥ��᡼�����" class="thickbox">�ǥ��᡼�����</a></li>
								<li><a href="?action_admin_util=true&page=faq_game_list&TB_iframe=true&height=700&width=700" title="���������" class="thickbox">���������</a></li>
								<li><a href="?action_admin_util=true&page=faq_sound_list&TB_iframe=true&height=700&width=700" title="������ɴ���" class="thickbox">������ɴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_contents_list&TB_iframe=true&height=700&width=700" title="�ե꡼�ڡ�������" class="thickbox">�ե꡼�ڡ�������</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>�桼�ƥ���ƥ�</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_stats_list&TB_iframe=true&height=700&width=700" title="������������" class="thickbox">������������</a></li>
								<li><a href="?action_admin_util=true&page=faq_mailtemplate_list&TB_iframe=true&height=700&width=700" title="�᡼��ƥ�ץ졼�ȴ���" class="thickbox">�᡼��ƥ�ץ졼�ȴ���</a></li>
								<li><a href="?action_admin_util=true&page=faq_util&TB_iframe=true&height=700&width=700" title="�������ޥ˥奢��" class="thickbox">�������ޥ˥奢��</a></li>
								<li><a href="?action_admin_util=true&page=faq_emoji&TB_iframe=true&height=700&width=700" title="��ʸ���ѥ�å�" class="thickbox">��ʸ���ѥ�å�</a></li>
								<li><a href="?action_admin_util=true&page=faq_ngword_edit&TB_iframe=true&height=700&width=700" title="NG�������" class="thickbox">NG�������</a></li>
							</ul>
							<li>��������</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_logout&TB_iframe=true&height=700&width=700" title="��������" class="thickbox">��������</a></li>
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
