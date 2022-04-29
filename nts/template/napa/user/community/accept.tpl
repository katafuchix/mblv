<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`参加承認待ちのﾕｰｻﾞ一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{* 承認待ちユーザがいる場合 *}
	{if $app.waiting_user_list[0] > 0}
		{foreach from=$app.waiting_user_list[1] item=community}
			{* コミュニティ参加ユーザがいる場合 *}
			{if $community.user_list[0] > 0}
				<!--タイトル-->
				{html_style type="title" title=$community.community_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
				{foreach from=$community.user_list[1] item=user}
					<a href="?action_user_profile_view=true&user_id={$user.user_id}">{$user.user_nickname}</a>さん<br />
					<a href="?action_user_community_accept_do=true&community_member_id={$user.community_member_id}&accept=1">承認</a>
					<a href="?action_user_community_accept_do=true&community_member_id={$user.community_member_id}&accept=0">拒否</a><br />
					<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
				{/foreach}
			{/if}
		{/foreach}
	{/if}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
