{include file="user/header.tpl"}

{html_style type="title" title="ͧã�؎ݎ�������ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{form action="$script" ethna_action="user_friend_apply_do"}
{$app_ne.hidden_vars}
<div align="left" style="text-align:left;font-size:small;">
<span style="color:{$form_name_color};">
���Τ�̾��:
</span>
<br />
&nbsp;{$app.toUser.user_nickname}����<br />
<br />
<span style="color:{$form_name_color};">
{form_name name="friend_message"}:
</span>
<br />
&nbsp;{$form.friend_message|nl2br}<br />
</div>
{uniqid}
<br />
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
<br />
<div align="left" style="text-align:left;font-size:small;">�������Ƥ�ͧã�؎ݎ��������ޤ���<br />������Ǥ���?<br /><br /></div>
<div style="text-align:center;font-size:small;">{form_input name="submit" value="���ϡ�����"}<br />{form_input name="back" value="����������"}</div>
{/form}

{include file="user/footer.tpl"}
