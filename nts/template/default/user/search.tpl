<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend_name.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_search_do"}
	<span style="color:{$form_name_color};">
	{form_name name="user_nickname"}:
	</span>
	<br />
	{form_input name="user_nickname"}<br />
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	{$ft.friend_name.name}を検索します｡<br />
	<br />
	<div  style="text-align:center;font-size:small;">{form_input name="search"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
