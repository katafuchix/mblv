<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.bbs_name.name`�Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_bbs_edit_confirm"}
		{form_input name="bbs_id"}
		{form_input name="bbs_hash"}
		{form_input name="to_user_id" value="`$app.to_user.user_id`"}
		<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>����ؤ�{$ft.bbs_name.name}���Խ����ޤ���<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="bbs_body"}:
		</span><br />
		<div style="text-align:center;font-size:small;">
		{form_input name="bbs_body" rows="5"}
		</div>
		<br />
		{if $form.image_id}
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left" alt="����"><br />
			<span>
			<a href="{html_style type='mailto' account='bbs_image' hash=$form.bbs_hash}">{$ft.image_edit.name}</a><br />
			{form_input name="delete_image"}
			</span>
			<br />
		{else}
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='bbs_image' hash=$form.bbs_hash}">{$ft.image_add.name}</a><br />
			</div>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm" value="���Խ���ǧ���̤ء�"}</div>
	{/form}
	
	<br />
	
	<!--�����ȥ�-->
	{html_style type="title" title="`$ft.bbs_name.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_bbs_delete_confirm"}
		{form_input name="bbs_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit value="�������ǧ���̤ء�"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
