<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.sound.name`���ގ��ݎێ��Ď�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.sound_file2}<img src="f.php?file=sound/{$form.sound_file2}&SESSID={$SESSID}">{/if}
	</div>
	<span style="color:{$form_name_color};">
	{$ft.sound.name}̾:
	</span>
	{$form.sound_name}<br />
	<span style="color:{$form_name_color};">
	{$ft.sound.name}����:
	</span>
	{$form.sound_desc}<br />
	<span style="color:{$form_name_color};">
	����Ύߎ��ݎ�:
	</span>
	{$form.sound_point}pt<br />
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.sound_stock_status == 1 && 0 >= $form.sound_stock_num}
		{* ����ڤ� *}
		<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.sound.name}������ڤ�Ƥ��ޤ��ޤ�����</span>
		{elseif $form.sound_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.sound_end_time}
		{* �ۿ����ֽ�λ *}
		<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.sound.name}��������֤���λ���Ƥ��ޤ��ޤ�����</span>
		{else}
		{* ������ *}
		{form action="$script" ethna_action="user_sound_buy_do"}
			{form_input name="sound_id"}
			{form_submit value="���ގ��ݎێ��Ď�"}
		{/form}
	{/if}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
