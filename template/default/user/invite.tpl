<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.invite_name.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	
	<!--ͧã���Գ���-->
	�����˾��Ԥ�����ͧã�ΎҎ��َ��Ďގڎ��������Ƥ���������<br />
	{form action="$script" ethna_action="user_invite_confirm"}
		{uniqid}
		<span style="color:{$form_name_color};">
		{form_name  name="to_user_mailaddress"}:
		</span>
		<br />
		{form_input name="to_user_mailaddress" istyle="3" mode="alphabet"}<br /><br />
		<span style="color:{$form_name_color};">
		{form_name  name="message"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="message"}
		</div>
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit value="����ǧ���̤ء�"}</div>
	{/form}
	
	<br />
	
	<!--�����ȥ�-->
	{html_style type="title" title="���������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<!--�����泫��-->
	{if $app.now_inviting_list}
		{html_style type="line" color="gray"}
		{foreach from=$app.now_inviting_list item=item}
			<a href="mailto:{$item.to_user_mailaddress}">{$item.to_user_mailaddress}</a> 
				[<a href="?action_user_invite_delete_confirm=true&invite_id={$item.invite_id}">���</a>]
			<br />
			{html_style type="line" color="gray"}
		{/foreach}
	{else}
		���߾������{$ft.user.name}�Ϥ��ޤ���
	{/if}
	<!--�����潪λ-->
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
