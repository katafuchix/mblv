<!--�إå���-->
{include file="user/header.tpl"}

<div align="center" style="text-align:center;font-size:small;">
{ad type="home"}
<!--<img src="img_napa/top/np_avatar03.gif" alt="NAPATOWN���ʎގ���"><br><br>-->
<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">�������ˎߎݎ���</a>/<a href="?action_user_decomail=true">�Îގ���</a>/<a href="?action_user_sound=true">�夦��</a>/<a href="?action_user_game=true">���ގ���</a>/<a href="fp.php?code=fortune_index">���ǎ��ꤤ</a></font><br>
</div>

<!--�����ȥ�-->
{html_style type="title" title="`$session.user.user_nickname`����Υޥ��ڡ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--���顼ɽ������-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
</div>
<!--���顼ɽ����λ-->

<!--���Τ餻����-->
<div align="center" style="text-align:center;font-size:small;">
	{if $app.new_message_count > 0}
		<span style="color:red;font-size:small"><a href="?action_user_message_list_received=true">����{$ft.message.name}��{$app.new_message_count}�濫��ޤ�</a></span><br />
	{/if}
	{if $app.waiting_friend_count > 0}
		<span style="color:red;font-size:small"><a href="?action_user_friend_accept=true">��ǧ�Ԥ���{$ft.friend_name.name}��{$app.waiting_friend_count}̾���ޤ�</a></span><br />
	{/if}
	{if $app.waiting_community_user_count > 0}
		<a href="?action_user_community_accept=true">{$ft.community.name}���þ�ǧ�Ԥ��ΎҎݎʎގ���{$app.waiting_community_user_count}̾���ޤ�</a><br />
	{/if}
	{if $app_ne.sns_information}
		{$app_ne.sns_information|nl2br}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{/if}
</div>
<!--���Τ餻��λ-->

<!--������˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	{if $config.option.avatar && !$session.user.avatar_config_first}
		<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}�������</a><br />
	{/if}
	<div align="left" style="text-align:left;float:left;">
	<table width="100%"><tr><td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
		<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
			{if $config.option.avatar}
			<!--���Х�����������-->
			<img src="?action_user_file_avatar_preview=true&attr=s&SESSID={$SESSID}" alt="����" style="float:left;" />
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
			<a href="?action_user_message_list_received=true">{$ft.message.name}{if $app.new_message_count > 0}({$app.new_message_count}){/if}</a><br />
			<a href="?action_user_blog_article_add=true">{$ft.blog_article.name}���</a><br />
			<a href="?action_user_blog_view=true&user_id={$session.user.user_id}">{$ft.blog_article.name}���ɤ�</a><br />
			<a href="?action_user_community_list=true">{$ft.community.name}{if $app.community_count > 0}({$app.community_count}){/if}</a><br />
			<a href="?action_user_footprint=true">��������</a><br />
			{if $config.option.avatar && !$session.user.avatar_config_first}
				<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}</a><br />
			{else}
				<a href="?action_user_avatar=true">{$ft.avatar.name}</a><br />
			{/if}
			<a href="?action_user_invite=true">ͧã����</a><br />
			<a href="?action_user_point_home=true">�ŎʎߎΎ���Ģ</a><br />
			<a href="?action_user_ad=true">�ŎʎߎΎ�GET</a><br />
		</div>
	</td></tr></table>
	</div>
	{html_style type="br"}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<div style="font-size:small;text-align:left;">
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=avatar">{$news.news_title}</a><br />
		{/foreach}
	</div>
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<div style="font-size:small;text-align:center;">
		<a href="?action_user_friend_list=true">{$ft.friend_list.name}{if $app.friend_count > 0}({$app.friend_count}){/if}</a>&nbsp;
		<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}</a>&nbsp;
		<br />
		<a href="?action_user_search=true">{$ft.friend_name.name}����</a>&nbsp;
		<a href="?action_user_community_search=true">{$ft.community.name}����</a>&nbsp;
		<br />
		<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}����</a>&nbsp;
		<a href="?action_user_community_article_search=true">{$ft.community_article.name}����</a>&nbsp;
		<br />
		<a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a>&nbsp;
		<a href="?action_user_config=true">����</a>&nbsp;
		<br />

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
{html_style type="title" title="`$ft.friend_name.name`�κǿ�`$ft.blog_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--�ǿ���������-->
<div align="left" style="text-align:left;font-size:small;">
	{*ͧã�κǿ������򣵷�ޤ�ɽ�����ޤ�*}
	{foreach from=$app.blog_article_list item=item name=blog key =k}
		{if $smarty.foreach.blog.iteration <= 5}
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
					(<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����)
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.blog.iteration == 5 && !$smarty.foreach.blog.last}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;��<a href="?action_user_blog_recent=true">��äȸ���</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			�ޤ�����ޤ���<br />
			&nbsp;��<a href="?action_user_search=true">ͧã��õ����!</a>[x:0111]
		</div>
	{/foreach}
</div>
<!--�ǿ�������λ-->

<!--�����ȥ�-->
{html_style type="title" title="�ǿ�`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--�ǿ����ߥ�˥ƥ������ȳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{*���ߥ�˥ƥ��κǿ������Ȥ򣵷�ޤ�ɽ�����ޤ�*}
	{foreach from=$app.community_article_list item=item name=community key=k}
		{if $smarty.foreach.community.iteration <= 5}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
				{else}
					{if $item.community_image_id}
					<img src="f.php?type=image&id={$item.community_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.community_article_comment_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}({$item.community_article_comment_num})</a>
					(<a href="?action_user_community_view=true&community_id={$item.community_id}">{$item.community_title}</a>)
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.community.iteration == 5 && !$smarty.foreach.community.last}
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
{html_style type="title" title="�����ҎƎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--������˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:#ffcc00">��</span><a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a><br />
	<span style="color:#ffcc00">��</span><a href="?action_user_config=true">����</a><br />
	<span style="color:#ffcc00">��</span><a href="?action_user_invite=true">ͧã����</a><br />
	<span style="color:#ffcc00">��</span><a href="?action_user_blacklist_list=true">{$ft.blacklist.name}����</a><br />
	<span style="color:#ffcc00">��</span><a href="fp.php?code=guide_point">{$ft.point.name}�ν�����</a><br />
	<span style="color:#ffcc00">��</span><a href="fp.php?code=guide_inquiry">�䤤��碌</a><br />
	<span style="color:#ffcc00">��</span><a href="?action_user_logout_do=true">�ێ��ގ�����</a><br />
	<span style="color:#ffcc00">��</span><a href="?action_user_resign_confirm=true">���</a><br />
</div>
<!--������˥塼��λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
