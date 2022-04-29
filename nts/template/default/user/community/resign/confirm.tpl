<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`退会確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_community_resign_do"}
		{form_input name="community_id"}
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			この{$ft.community.name}を退会します｡<br>
			よろしいですか？<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="resign"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
