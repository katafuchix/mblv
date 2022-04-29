<!--ヘッダー-->
{include file="user/header.tpl"}

<div align="center" style="color:{$title_fontcolor};font-size:small;background:{$title_bgcolor};text-align:center;">
	<span style="display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite">
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">★☆★</span>
		人気沸騰中
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">★☆★</span>
	</span>
</div>
<!--エラーメッセージ表示開始-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--エラーメッセージ表示終了-->
<!--ロゴ画像開始-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="snsv_logo.gif" align="center" style="text-align:center"><br />
</div>
<!--ロゴ画像終了-->

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
	{/if}
	{html_style type="title" title="ｱﾊﾞﾀｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ｱﾊﾞﾀｰ</a><br />
			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />
			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ｱﾊﾞﾀｰ</a><br />
			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />
			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="ﾃﾞｺﾒ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ﾃﾞｺﾒ</a><br />
			ﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ﾃﾞｺﾒ</a><br />
			ﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="ｹﾞｰﾑ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g1.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ｹﾞｰﾑ</a><br />
			ｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g2.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ｹﾞｰﾑ</a><br />
			ｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
</div>
<!--コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="ｻﾎﾟｰﾄﾒﾆｭｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--サポートメニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=caution">注意事項</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=support">問い合わせ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-device">対応機種</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=privacy">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=terms">利用規約</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=company">会社概要</a>
</div>
<!--サポートメニュー終了-->

<!--フッター-->
{include file="user/footer.tpl"}
