<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.point.name`��(�����ʎގݎ����)" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	�����Х󥯶�Ԥθ��¤˿����Ǥ��ޤ���<br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	<span style="color:{$form_name_color}">
	�Ǿ���{$ft.point.name}:
	</span>
	1000{$ft.point_unit.name}��<br />
	
	<span style="color:{$form_name_color}">
	��ñ��:</span>
	10{$ft.point_unit.name}<br />
	
	<span style="color:{$form_name_color}">
	�����:</span>
	105�ߡ�105{$ft.point_unit.name}��<br />
	
	<span style="color:{$form_name_color}">
	������λ��:
	</span>
	4������������˽�����<br />
	
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
		<div style="text-align:center">{form_submit value="`$ft.point.name`�򴹳�ǧ"}</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}�Ύߎ����٤�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}��Ģ��</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
