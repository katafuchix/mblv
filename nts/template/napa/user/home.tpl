<!--�إå���-->
{include file="user/header.tpl"}

<div align="center" style="text-align:center;font-size:small;">

<a name="mypage_top" id="mypage_top"></a>

<!--top��-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=268" alt="���ʎގ����ʤ�Ŏʎߎ�����,TOP�ێ���">
</div>

<!--�����ʎގŎ�-->
{ad type="home"}
<!--<img src="img_napa/top/np_avatar03.gif" alt="NAPATOWN���ʎގ���"><br><br>-->
</div>
<span style="color:#6666FF;font-size:xx-small;">[x:0760]<a href="?action_user_top=true">�ʥѥ�����TOP��</a></span><br />

<!--���顼ɽ������-->
<div align="left" style="text-align:left;font-size:xx-small;">
	{include file="user/errors.tpl"}
</div>
<!--���顼ɽ����λ-->


<!--���Τ餻����-->
<div align="center" style="text-align:center;font-size:xx-small;">
	{if $app_ne.sns_information}
		{$app_ne.sns_information|nl2br}<br />
	{/if}
	{if $app.new_message_count > 0}
		<span style="color:red;font-size:xx-small"><a href="?action_user_message_list_received=true">����{$ft.message.name}��{$app.new_message_count}�濫��ޤ�</a></span><br />
	{/if}
	{if $app.waiting_friend_count > 0}
		<span style="color:red;font-size:xx-small"><a href="?action_user_friend_accept=true">��ǧ�Ԥ���{$ft.friend_name.name}��{$app.waiting_friend_count}̾���ޤ�</a></span><br />
	{/if}
	{if $app.waiting_community_user_count > 0}
		<a href="?action_user_community_accept=true">{$ft.community.name}���þ�ǧ�Ԥ��ΎҎݎʎގ���{$app.waiting_community_user_count}̾���ޤ�</a><br />
	{/if}
	{if $app.waiting_blog_comment_count > 0}
		<span style="color:#FF0000;font-size:xx-small"><a style="color:#FF0000" href="?action_user_blog_article_view=true&blog_article_id={$app.waiting_blog_article_id}"><span style="color:#FF0000;font-size:xx-small">{$ft.blog_article.name}�˿��厺�ҎݎĤ���</span></a></span><br />
	{/if}
	{if $app.waiting_bbs_count > 0}
		<span style="color:#FF0000;font-size:xx-small"><a style="color:#FF0000" href="?action_user_bbs_list=true&user_id={$session.user.user_id}"><span style="color:#FF0000;font-size:xx-small">�����˿��厺�ҎݎĤ���</span></a></span><br />
	{/if}

		<!--<hr color="#ff6699" style="border:solid 1px #ff6699;">-->

</div>
<!--���Τ餻��λ-->

<!--�����ȥ볫��-->
{html_style type="title" title="`$session.user.user_nickname`����Υޥ��ڡ���" bgcolor=#fa6b73 fontcolor=#ffffff}
<!--�����ȥ뽪λ-->

<!--������˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	{if $config.option.avatar && !$session.user.avatar_config_first}
		<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}�������</a><br />
	{/if}

	<div style="background-color:#ffffcc;">

	<div align="left" style="text-align:left;float:left;">
	<table width="100%"><tr><td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
		<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
			{if $config.option.avatar}
			<!--���Х�����������-->
			<img src="?action_user_file_avatar_preview=true&attr=s&SESSID={$SESSID}&uniqid={$smarty.now|uniqid}" alt="����" style="float:left;" />
			<!--���Х���������λ-->
			{else}
			<!--�ޥ���������-->
			<img src="f.php?type=image&?type=image&id={$app.user.image_id}&attr=t&SESSID={$SESSID}" alt="����" style="float:left;" />
			<!--�ޥ�������λ-->
			{/if}
		</div>
	</td>
	<td>
		<div style="float:left;font-size:small;">
			[x:0105]<a href="?action_user_message_list_received=true">{$ft.message.name}{if $app.new_message_count > 0}({$app.new_message_count}){/if}</a><br />
			[x:0085]<a href="?action_user_blog_article_add=true">{$ft.blog_article.name}���</a><br />
			[x:0082]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}">{$ft.blog_article.name}���ɤ�</a>{if $app.waiting_blog_comment_count > 0}[x:0199]{/if}<br />
			[x:0068]<a href="?action_user_bbs_list=true&user_id={$session.user.user_id}">{$ft.bbs.name}</a><br />
			[x:0182]<a href="?action_user_community_list=true">{$ft.community.name}{if $app.community_count > 0}({$app.community_count}){/if}</a><br />
			[x:0089]<a href="?action_user_footprint=true">��������</a><br />
			{if $config.option.avatar && !$session.user.avatar_config_first}
				[x:0156]<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}</a><br />
			{else}
				[x:0156]<a href="?action_user_avatar=true">{$ft.avatar.name}</a><br />
			{/if}
			<!--<a href="?action_user_invite=true">ͧã����</a><br />-->
			[x:0162]<a href="?action_user_point_home=true">�ŎʎߎΎ���Ģ</a><br />
			<!--<a href="?action_user_ad=true">�ŎʎߎΎ�GET</a><br />-->
		</div>
	</td></tr></table>
			<br />

	</div>

			<div align="center" style="text-align:center;">[x:0139]<a href="?action_user_game=true">�ʎގ��ʎގ�!�Ҏ��Ύޤ���</a>[x:0139]<br /><span style="font-size:xx-small;">ǳ�Ʒ���Ϣ���ʎߎ��ގ��о�</span><br /><br /></div>

	</div>

	<!--{html_style type="br"}-->

	<div style=";text-align:center;color:#ffffff;background-color:#fa6b73;">����Τ��Τ餻</div>

	<div style="font-size:small;text-align:left;">
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=avatar">{$news.news_title}</a><br />
		{/foreach}
	</div>
	<hr color="#ff6699" style="border:solid 1px #ff6699;">
	<div style="font-size:small;text-align:left;">

		<table width="100%">

		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0183]<a href="?action_user_friend_list=true">{$ft.friend_list.name}{if $app.friend_count > 0}({$app.friend_count}){/if}</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�Ŏʎ�ͧ[x:0129]����</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0199]<a href="?action_user_search=true">{$ft.friend_name.name}����</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�Ŏʎ�ͧ[x:0180]õ����</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0203]<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�񤤤Ƥ�餪[x:0085]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0167]<a href="?action_user_community_search=true">{$ft.community.name}����</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�ߤ��[x:0135]���ޤ�</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0098]<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}����</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�����Ƥ��[x:0181]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0111]<a href="?action_user_community_article_search=true">{$ft.community_article.name}����</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">���Ĥ���[x:0151]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;"><span style="color:#46ace8">[x:0139]</span><a href="#kanri"><span style="color:#46ace8">�����ҎƎ���</span></a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">�¤ä���[x:0175]</div></td>
		</tr>
		</table>

		<div align="right" style="color:#6666FF;font-size:xx-small;text-align:right;">[x:0760]<a href="?action_user_top=true">�ʥѥ�����TOP��</a></div>

<!--
		<a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a>&nbsp;
		<a href="?action_user_config=true">����</a>&nbsp;
		<a href="?action_user_friend_list=true">{$ft.friend_list.name}{if $app.friend_count > 0}({$app.friend_count}){/if}</a>&nbsp;
		<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}</a>&nbsp;
		<a href="?action_user_blacklist_list=true">{$ft.blacklist.name}����</a>&nbsp;
		<a href="?action_user_search=true">{$ft.friend_name.name}����</a>&nbsp;
		<a href="?action_user_community_search=true">{$ft.community.name}����</a>&nbsp;
		<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}����</a>&nbsp;
		<a href="?action_user_community_article_search=true">{$ft.community_article.name}����</a>&nbsp;
		<a href="?action_user_ad=true">�Ύߎ��ݎ�Get</a>
-->
	</div>
</div>
<!--������˥塼��λ-->

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend_name.name`�κǿ�`$ft.blog_article.name`" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--�ǿ���������-->
<div align="left" style="text-align:left;font-size:small;">
	{*ͧã�κǿ�������3��ޤ�ɽ�����ޤ�*}
	{foreach from=$app.blog_article_list item=item name=blog key =k}
		{if $smarty.foreach.blog.iteration <= 3}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}����)
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.blog.iteration == 3 && !$smarty.foreach.blog.last}
			<div align="right" style="text-align:right;font-size:xx-small;">
				&nbsp;��<a href="?action_user_blog_recent=true">��äȸ���</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			�ޤ�����ޤ���<br />
			&nbsp;��<a href="?action_user_search=true">ͧã��õ����!</a>[x:0111]
			<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}����</a>
		</div>
	{/foreach}
</div>
<!--�ǿ�������λ-->

<!--�����ȥ�-->
{html_style type="title" title="�ǿ�`$ft.community_article.name`" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--�ǿ����ߥ�˥ƥ������ȳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{*���ߥ�˥ƥ��κǿ������Ȥ򣳷�ޤ�ɽ�����ޤ�*}
	{foreach from=$app.community_article_list item=item name=community key=k}
		{if $smarty.foreach.community.iteration <= 3}
			<div align="left" style="text-align:left;float:left;">
				{* ����ϥ��Х������ץ������������ߥ�˥ƥ�������ɽ�������� *}
				{* if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" /-->
				{else *}
					{if $item.community_image_id}
					<img src="f.php?type=image&id={$item.community_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{* /if *}
				<span>
					<span style="color:{$timecolor};">{$item.community_article_comment_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}({$item.community_article_comment_num})</a>
					({$item.community_title})
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.community.iteration == 3 && !$smarty.foreach.community.last}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;��<a href="?action_user_community_recent=true">��äȸ���</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			�ޤ�����ޤ���<br />
			&nbsp;��<a href="?action_user_community_search=true">���Ў��ƎÎ�������!</a>[x:0129]
		</div>
	{/foreach}
</div>
<!--�ǿ����ߥ�˥ƥ������Ƚ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="����`$ft.blog_article.name`����" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--���Υ桼�����κǿ���������-->
<div align="left" style="text-align:left;font-size:small;">
	{*���Υ桼�����κǿ�������5��ޤ�ɽ�����ޤ�*}
	{foreach from=$app.whole_blog_article_list item=item name=blog key =k}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}����)
				</span>
			</div>
			{html_style type="line" color="gray"}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			�ޤ�����ޤ���<br />
		</div>
	{/foreach}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;��<a href="?action_user_blog_article_whole=true">��äȸ���</a>[x:0082]
			</div>
</div>
<!--���Υ桼�����κǿ�������λ-->


<!--�����ȥ�-->
<a name="kanri" id="kanri"></a>
{html_style type="title" title="�����ҎƎ���" bgcolor=#327ae5  fontcolor=#ffffff}

<!--������˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:#0099cc">��</span><a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a><br />
	<span style="color:#0099cc">��</span><a href="?action_user_config=true">����</a><br />
	<span style="color:#0099cc">��</span><a href="?action_user_invite=true">ͧã����</a><br />
	<span style="color:#0099cc">��</span><a href="?action_user_blacklist_list=true">{$ft.blacklist.name}����</a><br />
	<span style="color:#0099cc">��</span><a href="fp.php?code=guide_point">{$ft.point.name}�ν�����</a><br />
	<span style="color:#0099cc">��</span><a href="fp.php?code=napapoget_top">�ŎʎߎΎ�GET</a><br />
	<span style="color:#0099cc">��</span><a href="fp.php?code=guide_inquiry">�䤤��碌</a><br />
	<span style="color:#0099cc">��</span><a href="?action_user_logout_do=true">�ێ��ގ�����</a><br />
	<span style="color:#0099cc">��</span><a href="?action_user_resign_confirm=true">���</a><br />
</div>

<div align="right" style="color:#6666FF;font-size:xx-small;text-align:right;"><a href="#mypage_top">���͎ߎ�����TOP��</a></div>

<!--������˥塼��λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
