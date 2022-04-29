<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.community.community_title`のﾒﾝﾊﾞｰ管理" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	管理人:{$app.owner_nickname}さん
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		{if $item.user_status == 2}
			<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
			<a href="?action_user_community_admin_member_remove_confirm=true&community_id={$form.community_id}&community_member_id={$item.community_member_id}">ﾒﾝﾊﾞｰから外す</a> |
			<a href="?action_user_community_admin_power_give_confirm=true&community_id={$form.community_id}&community_member_id={$item.community_member_id}&new_admin_user_id={$item.user_id}">管理権を渡す</a>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
	<a href="?action_user_community_view=true&community_id={$app.community.community_id}">{$ft.community.name}へ戻る</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
