<!--₯Ψ₯Γ₯ΐ‘Ό-->
{include file="user/header.tpl"}

<div align="center" style="color:{$title_fontcolor};font-size:small;background:{$title_bgcolor};text-align:center;">
	<span style="display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite">
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">‘ϊ‘ω‘ϊ</span>
		ΏΝ΅€Κ¨Ζ­Γζ
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">‘ϊ‘ω‘ϊ</span>
	</span>
</div>
<!--₯¨₯ι‘Ό₯α₯Γ₯»‘Ό₯ΈΙ½Ό¨³«»Ο-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--₯¨₯ι‘Ό₯α₯Γ₯»‘Ό₯ΈΙ½Ό¨½ͺΞ»-->
<!--₯ν₯΄²θΑό³«»Ο-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="snsv_logo.gif" align="center" style="text-align:center"><br />
</div>
<!--₯ν₯΄²θΑό½ͺΞ»-->

<!--₯³₯σ₯Ζ₯σ₯Δ³«»Ο-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
	{/if}
	{html_style type="title" title="±Κήΐ°" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">±Κήΐ°</a><br />
			±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°<br />
			±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">±Κήΐ°</a><br />
			±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°<br />
			±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°±Κήΐ°<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="ΓήΊ?" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ΓήΊ?</a><br />
			ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">ΓήΊ?</a><br />
			ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?ΓήΊ?<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="Ήή°Ρ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g1.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">Ήή°Ρ</a><br />
			Ήή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°Ρ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g2.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">Ήή°Ρ</a><br />
			Ήή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°ΡΉή°Ρ<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
</div>
<!--₯³₯σ₯Ζ₯σ₯Δ½ͺΞ»-->

<!--₯Ώ₯€₯Θ₯λ-->
{html_style type="title" title="»Ξί°Δ?Ζ­°" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--₯΅₯έ‘Ό₯Θ₯α₯Λ₯ε‘Ό³«»Ο-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=caution">Γν°Υ»φΉΰ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=support">Μδ€€Ήη€ο€»</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-device">ΒΠ±ώ΅‘Όο</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=privacy">ΜίΧ²ΚήΌ°ΞίΨΌ°</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=terms">ΝψΝΡ΅¬Μσ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=company">²ρΌ?³΅ΝΧ</a>
</div>
<!--₯΅₯έ‘Ό₯Θ₯α₯Λ₯ε‘Ό½ͺΞ»-->

<!--₯Υ₯Γ₯Ώ‘Ό-->
{include file="user/footer.tpl"}
