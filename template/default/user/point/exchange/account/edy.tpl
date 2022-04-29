<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`交換(Edy)" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	Edyに交換<br /><br />
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	<span style="color:{$form_name_color}">
	最少交換{$ft.point.name}:
	</span>
	1000{$ft.point_unit.name}〜<br />
	
	<span style="color:{$form_name_color}">
	交換単位:
	</span>
	10{$ft.point_unit.name}<br />
	
	<span style="color:{$form_name_color}">
	手数料:
	</span>
	52円(52{$ft.point_unit.name})<br />
	
	<span style="color:{$form_name_color}">
	完了日:
	</span>
	4日以内（土日祝除く）<br />
	
	<span style="color:{$form_name_color}">
	受取期間:
	</span>
	60日<br />
	
	<span style="color:{$form_name_color}">
	受取方法:
	</span>
	交換申請ﾌｫｰﾑでEdy番号を指定して下さい。Edyのお受取には所定の手続きが必要です<br />
	<a href="#detail"><span style="color:red">※注意事項</span></a>
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	
	{form action="$script" ethna_action="user_point_exchange_confirm"}
		{form_input name="point_exchange_type"}
		<span style="color:{$form_name_color}">
		{form_name name="point"}:
		</span><br />
		{form_input name="point" istyle="4"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="edy_number"}:
		</span>16桁の数字<br />
		{form_input name="edy_number" istyle="4"}<br />
		<div style="text-align:center">{form_submit value="`$ft.point.name`交換確認"}</div>
	{/form}
	<a id="detail"></a>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">おｻｲﾌｹｰﾀｲ[x:0192]の場合</span><br />
	おｻｲﾌｹｰﾀｲ[x:0192]の場合<br /><br />
	アプリ“電子マネー「Edy」”→[[x:0117]Edyギフト]（または[[x:0116]主なメニュー]→[[x:0116]Edyギフト]）<br />
	おサイフケータイ[x:0192]でEdyをお受け取りするには、おサイフケータイの電子マネー「Edy」アプリを起動し、「Edyギフト」画面よりお受取り下さい。<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">Edyｶｰﾄﾞ・おｻｲﾌｹｰﾀｲ[x:0192]の場合</span><br />
	Edyｶｰﾄﾞ・おｻｲﾌｹｰﾀｲ[x:0192]の場合<br /><br />
	専用端末の「Edyｷﾞﾌﾄ」ﾒﾆｭｰから受取りができます<br />
	[x:0115]PC（パソリ・FeliCaポート）<br />
	[x:0116]ANAWebKIOSK<br />
	[x:0117]am/pm appoint‘s<br />
	※appoint’sは、関東・山梨の店舗（一部除く）と近畿地区の10店舗に設置されています。<br />
	[x:0118]DAMステーション<br />
	※（ビッグエコー等の）カラオケ店のルームの中に設置されています。<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><span style="color:#000080">Edy番号の確認方法</span><br />
	Edyカード、おサイフケータイには、固有のEdy番号（16桁の数字）があります。<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>Edyｶｰﾄﾞでの確認方法<br />
	Edyカードの裏面（もしくは表面）に記載された「Edy No.〜」等の後に記載されている16桁の数字。 クレジットカード番号とは異なります。<br />
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>おサイフケータイでの確認方法<br />
	電子マネー「Edy」アプリのTOP画面にあります。<br />
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}ﾎﾟｰﾀﾙへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
