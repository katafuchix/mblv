{include file="admin/util/faq/header.tpl"}
<ul>
	{foreach from=$app_ne.faq item=i key=k}
		{if $i.title}<li class="question"><span class="purple">{$i.title}</span></li>{/if}
		{if $i.body}<span class="arrow_green">{$i.body|nl2br}</span>{/if}
		<br />
	{/foreach}
</ul>
{include file="admin/util/faq/footer.tpl"}
