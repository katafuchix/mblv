<!--�إå���-->
{include file="user/header.tpl"}

{html_style type="title" title="�����ˤĤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<div align="left" style="text-align:left;font-size:small">
	������<br />
	�������Ȥ��̤�������������ޤ���<br />
	������ɽ��<a href="?action_user_ec_item_postage_detail=true&item_id={$form.item_id}">������</a><br />
	�������ۤʤ뾦�ʤȤ�Ʊ���ϤǤ��ޤ���ͽ�ᤴλ������������<br />
	��������<br />
	�����ǤϾ������˴ޤޤ�ޤ���<br />
	��������Ψ 5��<br />
	�������Ƿ׻���ˡ:�������ʹ�פ��Ф��ƾ�����Ψ�׻�<br />
	��1��̤��������ü��: �ڤ�Τ�<br />
	<br />
	���ܺ٤�Ź�ޤ�ľ�ܤ��䤤��碌����������<br />
	���䤤��碌�衧{$mall_name}<br />
	e-mail:<a href="mailto:{$config.from_mailaddress}">{$config.from_mailaddress}</a><br />
	TEL:0422-70-0275 10:00-18:00�������������������<br />
	<br />
</div>

<!--�եå���-->
{include file="user/footer.tpl"}
