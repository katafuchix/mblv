<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.point.name`��(Edy)" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	Edy�˸�<br /><br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	<span style="color:{$form_name_color}">
	�Ǿ���{$ft.point.name}:
	</span>
	1000{$ft.point_unit.name}��<br />
	
	<span style="color:{$form_name_color}">
	��ñ��:
	</span>
	10{$ft.point_unit.name}<br />
	
	<span style="color:{$form_name_color}">
	�����:
	</span>
	52��(52{$ft.point_unit.name})<br />
	
	<span style="color:{$form_name_color}">
	��λ��:
	</span>
	4������������˽�����<br />
	
	<span style="color:{$form_name_color}">
	�������:
	</span>
	60��<br />
	
	<span style="color:{$form_name_color}">
	������ˡ:
	</span>
	�򴹿����̎����Ѥ�Edy�ֹ����ꤷ�Ʋ�������Edy�Τ�����ˤϽ���μ�³����ɬ�פǤ�<br />
	<a href="#detail"><span style="color:red">����ջ���</span></a>
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	{form action="$script" ethna_action="user_point_exchange_confirm"}
		{form_input name="point_exchange_type"}
		<span style="color:{$form_name_color}">
		{form_name name="point"}:
		</span><br />
		{form_input name="point" istyle="4"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="edy_number"}:
		</span>16��ο���<br />
		{form_input name="edy_number" istyle="4"}<br />
		<div style="text-align:center">{form_submit value="`$ft.point.name`�򴹳�ǧ"}</div>
	{/form}
	<a id="detail"></a>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">�������̎�������[x:0192]�ξ��</span><br />
	�������̎�������[x:0192]�ξ��<br /><br />
	���ץ���Żҥޥ͡���Edy�סɢ�[[x:0117]Edy���ե�]�ʤޤ���[[x:0116]��ʥ�˥塼]��[[x:0116]Edy���ե�]��<br />
	�������ե�������[x:0192]��Edy�򤪼�����ꤹ��ˤϡ��������ե����������Żҥޥ͡���Edy�ץ��ץ��ư������Edy���եȡײ��̤�ꤪ����겼������<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">Edy�����Ďޡ��������̎�������[x:0192]�ξ��</span><br />
	Edy�����Ďޡ��������̎�������[x:0192]�ξ��<br /><br />
	����ü���Ρ�Edy���ގ̎ġ׎ҎƎ����������꤬�Ǥ��ޤ�<br />
	[x:0115]PC�ʥѥ��ꡦFeliCa�ݡ��ȡ�<br />
	[x:0116]ANAWebKIOSK<br />
	[x:0117]am/pm appoint��s<br />
	��appoint��s�ϡ����졦������Ź�ޡʰ��������ˤȶᵦ�϶��10Ź�ޤ����֤���Ƥ��ޤ���<br />
	[x:0118]DAM���ơ������<br />
	���ʥӥå����������Ρ˥��饪��Ź�Υ롼���������֤���Ƥ��ޤ���<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">Edy�ֹ�γ�ǧ��ˡ</span><br />
	Edy�����ɡ��������ե��������ˤϡ���ͭ��Edy�ֹ��16��ο����ˤ�����ޤ���<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>Edy�����ĎޤǤγ�ǧ��ˡ<br />
	Edy�����ɤ�΢�̡ʤ⤷����ɽ�̡ˤ˵��ܤ��줿��Edy No.�������θ�˵��ܤ���Ƥ���16��ο����� ���쥸�åȥ������ֹ�Ȥϰۤʤ�ޤ���<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>�������ե��������Ǥγ�ǧ��ˡ<br />
	�Żҥޥ͡���Edy�ץ��ץ��TOP���̤ˤ���ޤ���<br />
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}�Ύߎ����٤�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}��Ģ��</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
