<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`削除完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community.name}削除が完了しました。<br />
		{ad type="community_delete_done"}<br />
	</div>
	<br />
	<!--コミュニティを削除してしまったため戻る場所がない-->
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
