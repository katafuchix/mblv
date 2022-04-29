{include file="user/header.tpl"}

<!--注文完了開始-->
{html_style type="title" title="■ありがとうございます■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	ご利用ありがとうございます｡<br />
	ご注文内容確認ﾒｰﾙをお送りしますので、ご注文内容のご確認をお願い致します｡<br />
	<br />
</div>
<!--注文完了終了-->

{include file="user/footer.tpl"}
