<!--�إå���-->
{include file="user/header.tpl"}

{html_style type="title" title="��ʧ����ˡ�ˤĤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<div align="left" style="text-align:left;font-size:small">
	������ʧ���ˤĤ���<br />
	�ʲ��λ�ʧ��ˡ�������Ѥˤʤ�ޤ���<br />
	<br />
	{if $app.item_use_credit_status == 1}
		�����쥸�åȥ����ɷ��<br />
	{/if}
	{if $app.item_use_conveni_status == 1}
	������ӥ˷��<br />
	�ե��ߥ꡼�ޡ���<br />
	������<br />
	���֥󥤥�֥�<br />
	{/if}
	{if $app.item_use_transfer_status == 1}
	����Կ�����ǧ��˾���ȯ��<br />
	{/if}
	{if $app.item_use_exchange_status == 1}
		����������<br />
		<br />
		��<a href="?action_user_ec_item_exchange_detail=ture&item_id={$form.item_id}">���������ˤĤ���</a><br />
	{/if}
	<br />
</div>

<!--�եå���-->
{include file="user/footer.tpl"}
