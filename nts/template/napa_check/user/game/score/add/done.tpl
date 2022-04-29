<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.score.name`登録完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	今回の{$ft.score.name}:{$form.score}<br />
	今回の順位:{$app.rank}位<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
