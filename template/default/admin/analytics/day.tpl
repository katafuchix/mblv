{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.analytics.name}</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_analytics&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.analytics.name}FAQ</a></blockquote>
			{if count($errors)}<span class="ethna-error">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			{form action="$script" ethna_action="admin_analytics_day"}
				{form_input name="year"}年
				{form_input name="month"}月
				{form_submit value="の集計を表示"}
			{/form}
			<table class="sheet">
				<tr>
					<th>{$ft.analytics_date.name}</th>
					<th>{$ft.pre_regist_num.name}</th>
					<th>{$ft.regist_num.name}</th>
					<th>{$ft.friend_num.name}</th>
					<th>{$ft.natural_num.name}</th>
					<th>{$ft.resign_num.name}</th>
				</tr>
				{foreach from=$app.analytics_list item=i}
				<tr>
					<td nowrap>{$i.analytics_date|jp_date_format:"%Y/%m/%d(%a)"}</td>
					<td>{$i.pre_regist_num}</td>
					<td>{$i.regist_num}</td>
					<td>{$i.friend_num}</td>
					<td>{$i.natural_num}</td>
					<td>{$i.resign_num}</td>
				</tr>
				{/foreach}
			</table>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
