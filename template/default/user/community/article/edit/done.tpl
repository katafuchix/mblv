<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_article.name`�Խ���λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community_article.name}���Խ�����λ���ޤ�����<br />
		{ad type="community_article_edit_done"}<br />
	</div>
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_view=true&community_article_id={$form.community_article_id}">�Խ�����{$ft.community_article.name}�����</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}�����</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
