{include file="admin/header.tpl"}

<div id="main">
	<h2>����</h2>
	{if count($errors)}<span class="ethna-error">���顼��ȯ�����ޤ����������ԤޤǤ�Ϣ��������<br />{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

{include file="admin/footer.tpl"}
