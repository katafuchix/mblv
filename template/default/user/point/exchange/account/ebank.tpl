<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`交換(ｲｰﾊﾞﾝｸ銀行)" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	イーバンク銀行の口座に振込できます。<br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	<span style="color:{$form_name_color}">
	最少交換{$ft.point.name}:
	</span>
	1000{$ft.point_unit.name}〜<br />
	
	<span style="color:{$form_name_color}">
	交換単位:</span>
	10{$ft.point_unit.name}<br />
	
	<span style="color:{$form_name_color}">
	手数料:</span>
	105円（105{$ft.point_unit.name}）<br />
	
	<span style="color:{$form_name_color}">
	振込完了日:
	</span>
	4日以内（土日祝除く）<br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	{form action="$script" ethna_action="user_point_exchange_confirm"}
		{form_input name="point_exchange_type"}
		<span style="color:{$form_name_color}">
		{form_name name="point"}:
		</span><br />
		{form_input name="point" istyle="4"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="ebank_branch"}:
		</span><br />
		{form_input name="ebank_branch"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="ebank_account_number"}:
		</span><br />
		{form_input name="ebank_account_number" istyle="4"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="ebank_account_name"}:
		</span><br />
		{form_input name="ebank_account_name"}<br />
		<div style="text-align:center">{form_submit value="`$ft.point.name`交換確認"}</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}ﾎﾟｰﾀﾙへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
