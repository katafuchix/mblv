<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`交換(ﾎﾟｲﾝﾄｵﾝ)" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	ポイントオンに交換<br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	<span style="color:{$form_name_color}">
	最少交換{$ft.point.name}:
	</span>
	1000{$ft.point_unit.name}〜<br />
	
	<span style="color:{$form_name_color}">
	交換単位:
	</span>
	10{$ft.point_unit.name}<br />
	
	<span style="color:{$form_name_color}">
	手数料:
	</span>
	0円<br />
	
	<span style="color:{$form_name_color}">
	完了日:
	</span>
	ﾘｱﾙﾀｲﾑ<br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	{if $form.pon_id}
		{form action="$script" ethna_action="user_point_exchange_confirm"}
			{form_input name="point_exchange_type"}
			<span style="color:{$form_name_color}">
			{form_name name="point"}:
			</span><br />
			{form_input name="point" istyle="4"}<br />
			<div style="text-align:center">{form_submit value="`$ft.point.name`交換確認"}</div>
		{/form}
	{else}
		<form method="post" action="{$config.pon_id_url}">
		<input type="hidden" name="penparam" value="{$form.penparam}">
		<input type="hidden" name="mobiletopid" value="{$config.pon_mobiletopid}">
		<input type="hidden" name="partnerid" value="{$config.pon_partnerid}">
		<input type="hidden" name="serviceid" value="{$config.pon_serviceid}">
		<input type="hidden" name="hdl" value="{$config.pon_hdl}">
		<div style="text-align:center"><input type="submit" value="{$ft.point.name}交換準備をする"></div>
		</form>
	{/if}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}ﾎﾟｰﾀﾙへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
