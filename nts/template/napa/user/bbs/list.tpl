<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user.user_nickname`�����`$ft.bbs.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	<!--��ʬ�ξ�糫��-->
	{if $app.isMyself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		[x:0166]<a href="?action_user_bbs_add=true&to_user_id={$form.user_id}">�񤭹���</a>
		/
		[x:0082]����
		]
		</div>
	{/if}
	<!--��ʬ�ξ�罪λ-->
	<!--��ʬ�ǤϤʤ���糫��-->
	{if !$app.isMyself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		[x:0166]<a href="?action_user_bbs_add=true&to_user_id={$form.user_id}">�񤭹���</a>
		/
		[x:0082]����
		]
		</div>
	{/if}
	<!--��ʬ�ǤϤʤ���罪λ-->
	{include file="user/pager.tpl"}
	{if $app.listview_total == 0}
		{$ft.bbs_body.name}������ޤ���
	{/if}
	<br>
	{foreach from=$app.listview_data item=item}
		<div align="left" style="text-align:left;float:left;">
			{if $config.option.avatar}
				<img src="f.php?type=avatar&user_id={$item.from_user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
			{else}
				{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
				{/if}
			{/if}
			<span>
				<span style="color:{$timecolor}">{$item.bbs_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
				{*if $form.user_id == $session.user.user_id || $item.from_user_id == $session.user.user_id *}
				{if $item.from_user_id == $session.user.user_id}
				[<a href="?action_user_bbs_edit=true&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">�Խ�</a>]
				{/if}
				{if $form.user_id == $session.user.user_id}
				[<a href="?action_user_bbs_delete_confirm=true&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">���</a>]
				{/if}
				<br />
				<a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>����<br />
				{if $form.user_id == $session.user.user_id && $item.bbs_notice==1}<span style="color:red">{/if}
				{$item.bbs_body}
				{if $form.user_id == $session.user.user_id && $item.bbs_notice==1}</span>{/if}
				</span>
				{if $item.image_id}
				<a href="?action_user_file_image_view=true&image_id={$item.image_id}&bbs_id={$item.image_id}&to_user_id={$form.user_id}">
				<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" alt="����">
				</a>
				{/if}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	<br>
	{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
