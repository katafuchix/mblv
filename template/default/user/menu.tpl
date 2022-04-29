<!--ヘッダー-->
{include file="user/header.tpl"}

<!--エラー表示開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
</div>
<!--エラー表示終了-->

<!--タイトル-->
<a name="support" name="support"></a>
{html_style type="title" title="ｻﾎﾟｰﾄﾒﾆｭｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	<div style="font-size:small;text-align:center;">
		{if $config.option.point}[x:0167]<a href="?action_user_ad=true">{$ft.point.name}Get</a>　/{/if}
		[x:0031]<a href="?action_user_invite=true">招待</a>　/
		[x:0165]<a href="?action_user_config=true">設定</a><br />
		[x:0142]<a href="?action_user_blacklist_list=true">{$ft.blacklist.name}管理</a>　/
		[x:0190]<a href="?action_user_logout_do=true">ﾛｸﾞｱｳﾄ</a>　/
		[x:0186]<a href="?action_user_resign_confirm=true">退会</a>
	</div>
</div>

<!--フッター-->
{include file="user/footer.tpl"}