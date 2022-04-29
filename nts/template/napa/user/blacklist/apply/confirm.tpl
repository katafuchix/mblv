{include file="user/header.tpl"}

{html_style type="title" title="友達ﾘﾝｸ申請確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{form action="$script" ethna_action="user_friend_apply_do"}
{$app_ne.hidden_vars}
<div align="left" style="text-align:left;font-size:small;">
<span style="color:{$form_name_color};">
相手のお名前:
</span>
<br />
&nbsp;{$app.toUser.user_nickname}さん<br />
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
<div align="left" style="text-align:left;font-size:small;">この内容で友達ﾘﾝｸを申請します｡<br />よろしいですか?<br /><br /></div>
<div style="text-align:center;font-size:small;">{form_input name="submit" value="　は　い　"}<br />{form_input name="back" value="　いいえ　"}</div>
{/form}

{include file="user/footer.tpl"}
