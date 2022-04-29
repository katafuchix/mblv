<!--ヘッダー-->
{include file="user/header.tpl"}

<div align="center" style="text-align:center;font-size:small;">

<a name="mypage_top" id="mypage_top"></a>

<!--topロゴ-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=268" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,TOPﾛｺﾞ">
</div>

<!--広告ﾊﾞﾅｰ-->
{ad type="home"}
<!--<img src="img_napa/top/np_avatar03.gif" alt="NAPATOWNｱﾊﾞﾀｰ"><br><br>-->
</div>
<span style="color:#6666FF;font-size:xx-small;">[x:0760]<a href="?action_user_top=true">ナパタウンTOPへ</a></span><br />

<!--エラー表示開始-->
<div align="left" style="text-align:left;font-size:xx-small;">
	{include file="user/errors.tpl"}
</div>
<!--エラー表示終了-->


<!--お知らせ開始-->
<div align="center" style="text-align:center;font-size:xx-small;">
	{if $app_ne.sns_information}
		{$app_ne.sns_information|nl2br}<br />
	{/if}
	{if $app.new_message_count > 0}
		<span style="color:red;font-size:xx-small"><a href="?action_user_message_list_received=true">新着{$ft.message.name}が{$app.new_message_count}件あります</a></span><br />
	{/if}
	{if $app.waiting_friend_count > 0}
		<span style="color:red;font-size:xx-small"><a href="?action_user_friend_accept=true">承認待ちの{$ft.friend_name.name}が{$app.waiting_friend_count}名います</a></span><br />
	{/if}
	{if $app.waiting_community_user_count > 0}
		<a href="?action_user_community_accept=true">{$ft.community.name}参加承認待ちのﾒﾝﾊﾞｰが{$app.waiting_community_user_count}名います</a><br />
	{/if}
	{if $app.waiting_blog_comment_count > 0}
		<span style="color:#FF0000;font-size:xx-small"><a style="color:#FF0000" href="?action_user_blog_article_view=true&blog_article_id={$app.waiting_blog_article_id}"><span style="color:#FF0000;font-size:xx-small">{$ft.blog_article.name}に新着ｺﾒﾝﾄあり</span></a></span><br />
	{/if}
	{if $app.waiting_bbs_count > 0}
		<span style="color:#FF0000;font-size:xx-small"><a style="color:#FF0000" href="?action_user_bbs_list=true&user_id={$session.user.user_id}"><span style="color:#FF0000;font-size:xx-small">伝言に新着ｺﾒﾝﾄあり</span></a></span><br />
	{/if}

		<!--<hr color="#ff6699" style="border:solid 1px #ff6699;">-->

</div>
<!--お知らせ終了-->

<!--タイトル開始-->
{html_style type="title" title="`$session.user.user_nickname`さんのマイページ" bgcolor=#fa6b73 fontcolor=#ffffff}
<!--タイトル終了-->

<!--上部メニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if $config.option.avatar && !$session.user.avatar_config_first}
		<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}初期設定</a><br />
	{/if}

	<div style="background-color:#ffffcc;">

	<div align="left" style="text-align:left;float:left;">
	<table width="100%"><tr><td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
		<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
			{if $config.option.avatar}
			<!--アバター画像開始-->
			<img src="?action_user_file_avatar_preview=true&attr=s&SESSID={$SESSID}&uniqid={$smarty.now|uniqid}" alt="画像" style="float:left;" />
			<!--アバター画像終了-->
			{else}
			<!--マイ画像開始-->
			<img src="f.php?type=image&?type=image&id={$app.user.image_id}&attr=t&SESSID={$SESSID}" alt="画像" style="float:left;" />
			<!--マイ画像終了-->
			{/if}
		</div>
	</td>
	<td>
		<div style="float:left;font-size:small;">
			[x:0105]<a href="?action_user_message_list_received=true">{$ft.message.name}{if $app.new_message_count > 0}({$app.new_message_count}){/if}</a><br />
			[x:0085]<a href="?action_user_blog_article_add=true">{$ft.blog_article.name}を書く</a><br />
			[x:0082]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}">{$ft.blog_article.name}を読む</a>{if $app.waiting_blog_comment_count > 0}[x:0199]{/if}<br />
			[x:0068]<a href="?action_user_bbs_list=true&user_id={$session.user.user_id}">{$ft.bbs.name}</a><br />
			[x:0182]<a href="?action_user_community_list=true">{$ft.community.name}{if $app.community_count > 0}({$app.community_count}){/if}</a><br />
			[x:0089]<a href="?action_user_footprint=true">あしあと</a><br />
			{if $config.option.avatar && !$session.user.avatar_config_first}
				[x:0156]<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}</a><br />
			{else}
				[x:0156]<a href="?action_user_avatar=true">{$ft.avatar.name}</a><br />
			{/if}
			<!--<a href="?action_user_invite=true">友達招待</a><br />-->
			[x:0162]<a href="?action_user_point_home=true">ﾅﾊﾟﾎﾟ通帳</a><br />
			<!--<a href="?action_user_ad=true">ﾅﾊﾟﾎﾟGET</a><br />-->
		</div>
	</td></tr></table>
			<br />

	</div>

			<div align="center" style="text-align:center;">[x:0139]<a href="?action_user_game=true">ﾊﾞｲﾊﾞｲ!ﾒﾀﾎﾞくん</a>[x:0139]<br /><span style="font-size:xx-small;">燃焼系大連鎖ﾊﾟｽﾞﾙ登場</span><br /><br /></div>

	</div>

	<!--{html_style type="br"}-->

	<div style=";text-align:center;color:#ffffff;background-color:#fa6b73;">新着のお知らせ</div>

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
		<td valign="middle"><div style="float:left;font-size:xx-small;">ﾅﾊﾟ友[x:0129]一覧</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0199]<a href="?action_user_search=true">{$ft.friend_name.name}検索</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">ﾅﾊﾟ友[x:0180]探そう</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0203]<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">書いてもらお[x:0085]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0167]<a href="?action_user_community_search=true">{$ft.community.name}検索</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">みんな[x:0135]集まろ</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0098]<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}検索</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">何してるの[x:0181]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;">[x:0111]<a href="?action_user_community_article_search=true">{$ft.community_article.name}検索</a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">見つかる[x:0151]</div></td>
		</tr>
		<tr>
		<td valign="middle"><div style="float:left;font-size:xx-small;"><span style="color:#46ace8">[x:0139]</span><a href="#kanri"><span style="color:#46ace8">管理ﾒﾆｭｰ</span></a></div></td>
		<td valign="middle"><div style="float:left;font-size:xx-small;">迷ったら[x:0175]</div></td>
		</tr>
		</table>

		<div align="right" style="color:#6666FF;font-size:xx-small;text-align:right;">[x:0760]<a href="?action_user_top=true">ナパタウンTOPへ</a></div>

<!--
		<a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a>&nbsp;
		<a href="?action_user_config=true">設定</a>&nbsp;
		<a href="?action_user_friend_list=true">{$ft.friend_list.name}{if $app.friend_count > 0}({$app.friend_count}){/if}</a>&nbsp;
		<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}</a>&nbsp;
		<a href="?action_user_blacklist_list=true">{$ft.blacklist.name}管理</a>&nbsp;
		<a href="?action_user_search=true">{$ft.friend_name.name}検索</a>&nbsp;
		<a href="?action_user_community_search=true">{$ft.community.name}検索</a>&nbsp;
		<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}検索</a>&nbsp;
		<a href="?action_user_community_article_search=true">{$ft.community_article.name}検索</a>&nbsp;
		<a href="?action_user_ad=true">ﾎﾟｲﾝﾄGet</a>
-->
	</div>
</div>
<!--上部メニュー終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.friend_name.name`の最新`$ft.blog_article.name`" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--最新日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*友達の最新日記を3件まで表示します*}
	{foreach from=$app.blog_article_list item=item name=blog key =k}
		{if $smarty.foreach.blog.iteration <= 3}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}さん)
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.blog.iteration == 3 && !$smarty.foreach.blog.last}
			<div align="right" style="text-align:right;font-size:xx-small;">
				&nbsp;→<a href="?action_user_blog_recent=true">もっと見る</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			まだありません。<br />
			&nbsp;→<a href="?action_user_search=true">友達を探そう!</a>[x:0111]
			<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}検索</a>
		</div>
	{/foreach}
</div>
<!--最新日記終了-->

<!--タイトル-->
{html_style type="title" title="最新`$ft.community_article.name`" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--最新コミュニティコメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*コミュニティの最新コメントを３件まで表示します*}
	{foreach from=$app.community_article_list item=item name=community key=k}
		{if $smarty.foreach.community.iteration <= 3}
			<div align="left" style="text-align:left;float:left;">
				{* 今回はアバターオプションだが、コミュニティ画像を表示させる *}
				{* if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" /-->
				{else *}
					{if $item.community_image_id}
					<img src="f.php?type=image&id={$item.community_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
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
				&nbsp;→<a href="?action_user_community_recent=true">もっと見る</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			まだありません。<br />
			&nbsp;→<a href="?action_user_community_search=true">ｺﾐｭﾆﾃｨに入ろう!</a>[x:0129]
		</div>
	{/foreach}
</div>
<!--最新コミュニティコメント終了-->

<!--タイトル-->
{html_style type="title" title="新着`$ft.blog_article.name`一覧" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--全体ユーザーの最新日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*全体ユーザーの最新日記を5件まで表示します*}
	{foreach from=$app.whole_blog_article_list item=item name=blog key =k}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}さん)
				</span>
			</div>
			{html_style type="line" color="gray"}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			まだありません。<br />
		</div>
	{/foreach}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;→<a href="?action_user_blog_article_whole=true">もっと見る</a>[x:0082]
			</div>
</div>
<!--全体ユーザーの最新日記終了-->


<!--タイトル-->
<a name="kanri" id="kanri"></a>
{html_style type="title" title="管理ﾒﾆｭｰ" bgcolor=#327ae5  fontcolor=#ffffff}

<!--下部メニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:#0099cc">■</span><a href="?action_user_profile_view=true&user_id={$session.user.user_id}">{$ft.profile.name}</a><br />
	<span style="color:#0099cc">■</span><a href="?action_user_config=true">設定</a><br />
	<span style="color:#0099cc">■</span><a href="?action_user_invite=true">友達招待</a><br />
	<span style="color:#0099cc">■</span><a href="?action_user_blacklist_list=true">{$ft.blacklist.name}管理</a><br />
	<span style="color:#0099cc">■</span><a href="fp.php?code=guide_point">{$ft.point.name}の集め方</a><br />
	<span style="color:#0099cc">■</span><a href="fp.php?code=napapoget_top">ﾅﾊﾟﾎﾟGET</a><br />
	<span style="color:#0099cc">■</span><a href="fp.php?code=guide_inquiry">問い合わせ</a><br />
	<span style="color:#0099cc">■</span><a href="?action_user_logout_do=true">ﾛｸﾞｱｳﾄ</a><br />
	<span style="color:#0099cc">■</span><a href="?action_user_resign_confirm=true">退会</a><br />
</div>

<div align="right" style="color:#6666FF;font-size:xx-small;text-align:right;"><a href="#mypage_top">▲ﾍﾟｰｼﾞTOPへ</a></div>

<!--下部メニュー終了-->

<!--フッター-->
{include file="user/footer.tpl"}
