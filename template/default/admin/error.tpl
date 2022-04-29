{include file="admin/header.tpl"}

<div id="main">
	<h2>管理</h2>
	{if count($errors)}<span class="ethna-error">エラーが発生しました。管理者までご連絡下さい。<br />{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

{include file="admin/footer.tpl"}
