
<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$session.user.user_nickname`さんのﾏｲﾍﾟｰｼﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--エラー表示開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
</div>
<!--エラー表示終了-->

<!--お知らせ開始-->
<div align="center" style="text-align:center;font-size:small;">
	{ad type="home"}
	{if $app.new_message_count > 0}
		<span style="color:red;font-size:small"><a href="?action_user_message_list_received=true">新着{$ft.message.name}が{$app.new_message_count}件あります</a></span><br />
	{/if}
	{if $app.waiting_friend_count > 0}
		<span style="color:red;font-size:small"><a href="?action_user_friend_accept=true">承認待ちの{$ft.friend_name.name}が{$app.waiting_friend_count}名います</a></span><br />
	{/if}
	{if $app.waiting_community_user_count > 0}
		<a href="?action_user_community_accept=true">{$ft.community.name}参加承認待ちのﾒﾝﾊﾞｰが{$app.waiting_community_user_count}名います</a><br />
	{/if}
	{if $app.waiting_blog_comment_count > 0}
		<span style="color:#FF0000;font-size:small"><a href="?action_user_blog_article_view=true&blog_article_id={$app.waiting_blog_article_id}"><span style="color:#FF0000;font-size:small">[x:0112]&nbsp;{$app.waiting_blog_comment_count}件の{$ft.blog_article.name}に新着ｺﾒﾝﾄあり</span></a></span><br />
	{/if}
	{if $app.waiting_bbs_count > 0}
		<span style="color:#FF0000;font-size:small"><a href="?action_user_bbs_list=true&user_id={$session.user.user_id}"><span style="color:#FF0000;font-size:small">[x:0112]&nbsp;{$ft.bbs.name}に新着{$ft.bbs_name.name}が{$app.waiting_bbs_count}件あります</span></a></span><br />
	{/if}
	{if $app_ne.sns_information}
		{$app_ne.sns_information|nl2br}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{/if}
</div>
<!--お知らせ終了-->

<!--上部メニュー開始-->
	<div align="left" style="text-align:left;float:left;">
		<table width="100%">
			<tr>
				<td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
					<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
					{if $config.option.avatar}
					{if !$session.user.avatar_config_first}<div style="font-size:small;text-align:left;"><a href="?action_user_avatar_config_first=true">初期設定</a></div>{/if}
					<!--アバター画像開始-->
					<img src="?action_user_file_avatar_preview=true&attr=s&user_id={$app.user.user_id}&SESSID={$SESSID}&uniqid={$smarty.now|uniqid}" alt="画像" style="float:left;" />
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
					[x:0037]<a href="?action_user_profile_view=true&user_id={$session.user.user_id}">ﾏｲ{$ft.profile.name}</a><br />
					[x:0074]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}">{$ft.blog_article.name}を書く</a><br />
					[x:0068]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}">{$ft.blog_article.name}を読む</a>{if $app.waiting_blog_comment_count > 0}&nbsp;[x:0112]{/if}<br />
					[x:0166]<a href="?action_user_bbs_list=true&user_id={$session.user.user_id}">{$ft.bbs.name}</a><br />
					[x:0129]<a href="?action_user_friend_list=true">{$ft.friend_list.name}</a><br />
					[x:0024]<a href="?action_user_community_list=true">参加{$ft.community.name}</a><br />
					[x:0089]<a href="?action_user_footprint=true">あしあと</a><br />
					[x:0182]<a href="?action_user_friend_introduction_list=true&to_user_id={$session.user.user_id}">{$ft.friend_introduction.name}を見る</a>
					</div>
				</td>
			</tr>
		</table>
	</div>
	{html_style type="title" title="ｺﾝﾃﾝﾂﾒﾆｭｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div style="font-size:small;text-align:center;">
		{if $config.option.avatar}[x:0138]<a href="?action_user_avatar=true">ｱﾊﾞﾀｰ</a>　{/if}
		{if $config.option.decomail}[x:0164]<a href="?action_user_decomail=true">ﾃﾞｺﾒｰﾙ</a><br />{/if}
		{if $config.option.game}[x:0076]<a href="?action_user_game=true">ｹﾞｰﾑ</a>　{/if}
		{if $config.option.sound}[x:0135]<a href="?action_user_sound=true">ｻｳﾝﾄﾞ</a>{/if}
	</div>
	{html_style type="title" title="検索ﾒﾆｭｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;font-size:small;">
		<div style="font-size:small;text-align:center;">
			[x:0001]<a href="?action_user_search=true">{$ft.friend_name.name}検索</a>　
			[x:0023]<a href="?action_user_community_search=true">{$ft.community.name}検索</a><br />
			[x:0135]<a href="?action_user_blog_article_search=true">{$ft.blog_article.name}検索</a>　
			[x:0079]<a href="?action_user_community_article_search=true">{$ft.community_article.name}検索</a><br />
		</div>
	</div>
<!--上部メニュー終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.friend_name.name`の最新`$ft.blog_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--最新日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*友達の最新日記を５件まで表示します*}
	{foreach from=$app.blog_article_list item=item name=blog key =k}
		{if $smarty.foreach.blog.iteration <= 5}
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
					(<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん)
				</span>
			</div>
			{html_style type="line" color="gray"}
		{/if}
		{if $smarty.foreach.blog.iteration == 5 && !$smarty.foreach.blog.last}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;→<a href="?action_user_blog_recent=true">もっと見る</a>[x:0082]
			</div>
		{/if}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			まだありません。<br />
			&nbsp;→<a href="?action_user_search=true">友達を探そう!</a>[x:0111]
		</div>
	{/foreach}
</div>
<!--最新日記終了-->

<!--タイトル-->
{html_style type="title" title="最新`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--最新コミュニティコメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*コミュニティの最新コメントを５件まで表示します*}
	{foreach from=$app.community_article_list item=item name=community key=k}
		{if $smarty.foreach.community.iteration <= 5}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" /-->
				{else}
					{if $item.community_image_id}
					<img src="f.php?type=image&id={$item.community_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
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

<!--下部メニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	{html_style type="line" color="gray"}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_menu=true">ｻﾎﾟｰﾄﾒﾆｭｰ</a><br />
</div>
<!--下部メニュー終了-->

<!--banner start>
<center>
<hr color="orange">
now banner test
{banner id="72,82,83,84,92,95,96" dsn=$config.dsn}
</center> 
<!--banner end>

<!--フッター-->
{include file="user/footer.tpl"}
