<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾛｸﾞｲﾝ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $form.ad_id}
	<span style="color:{$menucolor}">◆</span><a href="?action_user_ad_redirect=true&ad_id={$form.ad_id}&no_check=true">ﾛｸﾞｲﾝ・会員登録しないでそのまま進む</a><br />
	{/if}
	<span style="color:{$menucolor}">◆</span><a href="?action_user_util=true&page=about-regist">会員登録</a><br />
	<span style="color:{$menucolor}">◆</span><a href="?action_user_login_do=true&easy_login=true&guid=ON">簡単ﾛｸﾞｲﾝ</a><br />

	前ページへは<!--携帯-->[x:0073]のバックボタンで戻ってください。<br />


</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
