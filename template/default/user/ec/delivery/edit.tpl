{include file="user/header.tpl"}

<!--�����ǧ����-->
{html_style type="title" title="�������;����Խ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	<br />
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.delivery_insufficient}
		�����轻�꤬���ꤵ��Ƥ��ޤ���<br />
		�ʲ��ι��ܤˤ����ͤ��������������Ϥ��Ƥ���������<br />
	{/if}
	<span style="color:#ff0000">*</span>���ΤĤ������ܤ�ɬ�����Ϥ��Ƥ���������<br /><br />
	
	{form action="$script" ethna_action="user_ec_delivery_edit_do"}
	<div align="center" style="text-align:center;font-size:small;"> 
		{$app_ne.hidden_vars}
	</div>
	{form_name  name="user_name"}<span style="color:red;">*</span><br />
	{form_input name="user_name" istyle="1"}<br /><br />
	
	{form_name  name="user_name_kana"}<span style="color:red;">*</span><br />
	{form_input name="user_name_kana" istyle="2"}<br /><br />
	
	{form_name  name="user_zipcode"}<span style="color:red;">*</span><br />
	���1234567<br />
	{form_input name="user_zipcode" size="10" istyle="4"}<br /><br />
	
	{form_name  name="region_id"}<span style="color:red;">*</span><br />
	{form_input name="region_id"}<br /><br />
	
	{form_name  name="user_address"}<span style="color:red;">*</span><br />
	{form_input name="user_address" size="25" istyle="1"}<br /><br />
	
	{form_name  name="user_address_building"}<br />
	��ˎˎގ�1001<br />
	{form_input name="user_address_building" size="25" istyle="1"}<br /><br />
	
	{form_name  name="user_phone"}<span style="color:red;">*</span><br />
	{form_input name="user_phone" size="20" istyle="4"}<br /><br />
	
	<br />
	<div style="text-align:center">
	{form_submit value="���Խ����롡"}
	</div>
	{/form}
</div>

<!--�եå���-->
{include file="user/footer.tpl"}
