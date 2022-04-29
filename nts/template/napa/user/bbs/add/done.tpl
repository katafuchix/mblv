<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.bbs_name.name`書き込み完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.bbs.name}への書き込みが完了しました。<br />
		<a href="{html_style type='mailto' account='bbs_image' hash=$app.bbs_hash}">{$ft.image_add.name}</a><br />
	<span style="font-size:xx-small;">※添付画像の推奨ｻｲｽﾞは1MB以下です。</span><br />
		{ad type="bbs_add_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_bbs_list=true&user_id={$form.to_user_id}">書き込んだ{$ft.bbs.name}へ戻る</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.to_user_id}">{$ft.profile.name}へ戻る</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
