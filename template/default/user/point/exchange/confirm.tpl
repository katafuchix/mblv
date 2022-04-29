<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`交換確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_point_exchange_do"}
		{$app_ne.hidden_vars}
		
		<!--共通-->
		<span style="color:{$form_name_color}">
		{form_name name="point_exchange_type"}:
		</span>
		{$config.point_exchange[$form.point_exchange_type].name}<br />
		
		<span style="color:{$form_name_color}">
		{form_name name="point"}:
		</span>
		{$form.point}{$ft.point_unit.name}<br />
		
		{if $form.point_exchange_type == 1}
			<!--イーバンク-->
			<span style="color:{$form_name_color}">
			{form_name name="ebank_branch"}:
			</span>
			{$config.ebank_branch[$form.ebank_branch].name}<br />
			
			<span style="color:{$form_name_color}">
			{form_name name="ebank_account_number"}:
			</span>
			{$form.ebank_account_number}<br />
			
			<span style="color:{$form_name_color}">
			{form_name name="ebank_account_name"}:
			</span>
			{$form.ebank_account_name}<br />
			
		{elseif $form.point_exchange_type == 2}
			<!--Edy-->
			<span style="color:{$form_name_color}">
			{form_name name="edy_number"}:
			</span>
			{$form.edy_number}<br />
			
		{/if}
		
		<div style="text-align:center">{form_submit value="　`$ft.point.name`交換　"}</div>
		{uniqid}
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}ﾎﾟｰﾀﾙへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
