{if !$no_navi && $session.user.user_status==2}
{$sns_navi_template}
{/if}
<hr color="#ff6699" style="border:solid 1px #ff6699;">
{if !$no_footer}
<div align="left" style="text-align:left;font-size:small;">
{if $session.user.user_id && !$app.logout && $session.user.user_status==2}
	<!--ログイン時フッター開始-->
	{if $view_name != 'user_top'}<a href="?action_user_top=true" accesskey="0"><span style="font-size:xx-small">総合TOPへ</span></a><br />
  {/if} {if $view_name != 'user_home'}<a href="?action_user_home=true" accesskey="1"><span style="font-size:xx-small">マイページ</span></a>{/if} 
  <!--ログイン時フッター終了-->
  {else} 
  <!--未ログイン時フッター開始-->
  {if $view_name != 'user_index' && $session.user.user_status==2}<a href="?action_user_index=true" accesskey="0"><span style="font-size:xx-small">総合TOPへ</span></a>{/if} 
  <!--未ログイン時フッター終了-->
  {/if} </div>
{/if}
<div style="background-color:#ffffff;text-align:center;font-size:x-small">(c)ｽﾍﾟｰｽｱｳﾄ</div>
{*if $title}
	{html_style type="title" title="$title" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
	{html_style type="title" title="(c)$sns_name" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if*}

<!--コンテナ終了-->
</body>
</html>
