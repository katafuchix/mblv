<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.comment.name`��ƴ�λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

	<!-- �ŎʎߎΎ���Ϳ -->
	<div align="center" style="text-align:center;font-size:xx-small;">
	{adpoint id="49" message="�Ύގ��Ŏ��Ύߎ��ݎ�2�ŎʎߎΎߡ�"}
	</div>

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.comment.name}����Ƥ���λ���ޤ�����<br />
		{* ad type="comment_add_done" *}<br />
	</div>
	<br />
{if $form.comment_type == 2}
	<a href="?action_user_game_buy=true">{$ft.game.name}�����</a>
{/if}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
