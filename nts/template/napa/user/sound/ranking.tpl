<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.sound.name`�׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{foreach from=$app.ranking item=item name=sound key =k}
			��{$k+1}��<br />
			{if $item.sound_file1}<img src="f.php?file=sound/{$item.sound_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">{$item.sound_name}</a>&nbsp;&nbsp;{$item.sound_desc}
		{html_style type="line" color="gray"}
	{/foreach}

	{html_style type="br"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
