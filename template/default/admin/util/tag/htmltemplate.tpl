{include file="admin/util/tag/header.tpl"}

<h2>������ե���󥹡�{$ft.htmltemplate.name}��</h2>

<table class="sheet">
	<tr>
		<th>�ե�����URL�����ʲ�����ư��ؤ�URL�Ǥ���</th>
		<td>
			src=f.php?type=file&id=�֥ե������ֹ��<br />
			���㡧<input type="text" value="src=f.php?type=file&id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ե�����URL�����ʲ�����ư��ؤ�URL�Ǥ���</th>
		<td>
			src=f.php?type=file&id=�֥ե������ֹ��<br />
			���㡧<input type="text" value="src=f.php?type=file&id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ե꡼�ڡ���URL����1</th>
		<td>
			?action_user_contents=true&contents_id=�֥ե꡼�ڡ���ID��<br />
			���㡧<input type="text" value="?action_user_contents=true&contents_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ե꡼�ڡ���URL����2</th>
		<td>
			?action_user_contents=true&code=�֥ե꡼�ڡ��������ɡ�]<br />
			���㡧<input type="text" value="?action_user_contents=true&code=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>���ʥڡ���URL����</th>
		<td>
			?action_user_ec_item=true&item_id=�־���ID��<br />
			���㡧<input type="text" value="?action_user_ec_item=true&item_id=1" size="50">��
		</td>
	</tr>
<!--
	<tr>
		<th>���ʲ�������</th>
		<td>
			##item_img�־���ID��##<br />
			���㡧<input type="text" value="##item_img1##" size="50">��
		</td>
	</tr>
	<tr>
		<th>���ʥ��ƥ����������</th>
		<td>
			##ic_img�־��ʥ��ƥ���ID��##<br />
			���㡧<input type="text" value="##ic_img1##" size="50">��<br />
		</td>
	</tr>
-->
	<tr>
		<th>���Х����ܺ٥ڡ���URL����</th>
		<td>
			?action_user_avatar_buy=true&avatar_id=�֥��Х���ID��<br />
		���㡧<input type="text" value="?action_user_avatar_buy=true&avatar_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ǥ��᡼��ܺ٥ڡ���URL����</th>
		<td>
			?action_user_decomail_buy=true&decomail_id=�֥ǥ��᡼��ID��<br />
			���㡧<input type="text" value="?action_user_decomail_buy=true&decomail_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ǥ��᡼���������ɥ���</th>
		<td>
			?action_user_decomail_buy_do=true&decomail_id=�֥ǥ��᡼��ID��<br />
			���㡧<input type="text" value="?action_user_decomail_buy_do=true&decomail_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>������ܺ٥ڡ���URL����</th>
		<td>
			?action_user_game_buy=true&game_id=�֥�����ID��<br />
			���㡧<input type="text" value="?action_user_game_buy=true&game_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>������ɾܺ٥ڡ���URL����</th>
		<td>
			?action_user_sound_buy=true&sound_id=�֥������ID��<br />
			���㡧<input type="text" value="?action_user_sound_buy=true&sound_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>���ߥ�˥ƥ��ȥåץڡ���URL����</th>
		<td>
			?action_user_community_view=true&community_id=�֥��ߥ�˥ƥ�ID��<br />
			���㡧<input type="text" value="?action_user_community_view=true&community_id=1" size="50">��
		</td>
	</tr>
	<tr>
		<th>���ȥåץڡ���URL����</th>
		<td>
			?action_user_top=true<br />
			���㡧<input type="text" value="?action_user_top=true" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ޥ��ڡ���URL����</th>
		<td>
			?action_user_home=true<br />
			���㡧<input type="text" value="?action_user_home=true" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����Ͽ�᡼�륢�ɥ쥹����</th>
		<td>
			{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}<br />
			���㡧<input type="text" value="{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�᡼��ɥᥤ�󥿥�</th>
		<td>
			{literal}{$config.mail_domain}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.mail_domain}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ϩ�����Ѥ��᡼�륢�ɥ쥹����</th>
		<td>
			{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}<br />
			���㡧<input type="text" value="{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>������̾����</th>
		<td>
			{literal}{$config.site_name}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_name}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ȱ��Ĳ�ҥ���</th>
		<td>
			{literal}{$config.site_company_name}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_company_name}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ȱ��Ĳ�������ֹ楿��</th>
		<td>
			{literal}{$config.site_phone}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_phone}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>HTML�����ȥ륿��</th>
		<td>
			{literal}{$config.site_html_title}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_html_title}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>META Description����</th>
		<td>
			{literal}{$config.site_meta_description}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_meta_description}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>META Keywords����</th>
		<td>
			{literal}{$config.site_meta_keywords}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_meta_keywords}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>META robots����</th>
		<td>
			{literal}{$config.site_meta_robots}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_meta_robots}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>META author����</th>
		<td>
			{literal}{$config.site_meta_robots}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_meta_author}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ʥӥ��������ƥ�ץ졼�ȥ���</th>
		<td>
			{literal}{$config.site_navi_template}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_navi_template}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�������Ϳ�ݥ���ȥ���</th>
		<td>
			{literal}{$config.site_navi_template}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_regist_point}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>ͧã�����������Ϳ�ݥ���ȡʾ��Լԡ˥���</th>
		<td>
			{literal}{$config.site_invite_from_point}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_invite_from_point}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>ͧã�����������Ϳ�ݥ���ȡ��ﾷ�Լԡ˥���</th>
		<td>
			{literal}{$config.site_invite_to_point}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_invite_to_point}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�طʿ�����</th>
		<td>
			{literal}{$config.site_bg_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_bg_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>ʸ��������</th>
		<td>
			{literal}{$config.site_text_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_text_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>��󥯿�����</th>
		<td>
			{literal}{$config.site_link_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_link_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ƥ��֥�󥯿�����</th>
		<td>
			{literal}{$config.site_alink_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_alink_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>ˬ��Ѥߥ�󥯿�����</th>
		<td>
			{literal}{$config.site_vlink_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_vlink_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ȥ��طʿ�����</th>
		<td>
			{literal}{$config.site_title_bg_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_title_bg_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�����ȥ�ʸ��������</th>
		<td>
			{literal}{$config.site_title_font_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_title_font_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>��˥塼������</th>
		<td>
			{literal}{$config.site_menu_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_menu_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>��ʿ��������</th>
		<td>
			{literal}{$config.site_hr_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_hr_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>���￧����</th>
		<td>
			{literal}{$config.site_time_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_time_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ե�����̾������</th>
		<td>
			{literal}{$config.site_form_name_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_form_name_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>���顼ʸ��������</th>
		<td>
			{literal}{$config.site_error_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_error_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ڡ�����ʸ��������</th>
		<td>
			{literal}{$config.site_pager_text_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_pager_text_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>�ڡ������طʿ�����</th>
		<td>
			{literal}{$config.site_pager_bg_color}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_pager_bg_color}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>DOCOMO����ü������</th>
		<td>
			{literal}{$config.site_low_term_d}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_low_term_d}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>AU����ü������</th>
		<td>
			{literal}{$config.site_low_term_a}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_low_term_a}{/literal}" size="50">��
		</td>
	</tr>
	<tr>
		<th>SOFTBANK����ü������</th>
		<td>
			{literal}{$config.site_low_term_s}{/literal}<br />
			���㡧<input type="text" value="{literal}{$config.site_low_term_s}{/literal}" size="50">��
		</td>
	</tr>
</table>


{include file="admin/util/tag/footer.tpl"}
