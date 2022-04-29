<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="あしあと" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	あなたのﾌﾟﾛﾌｨｰﾙﾍﾟｰｼﾞを訪れたﾕｰｻﾞを表示します｡<br />
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item}
		<span style="color:{$timecolor}">{$item.footprint_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		&nbsp;&nbsp;<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
