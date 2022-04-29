{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>広告カテゴリ管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_adcategory_add=true">{$ft.ad_category.name}新規登録</a><br />
			{form action="$script" ethna_action="admin_adcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.ad_category_priority.name}</th>
					<th nowrap>{$ft.ad_category_name.name}</th>
					<th nowrap>{$ft.ad.name}一覧</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.ad_category_list item=i}
				<tr>
					<td><input name="ad_category_priority_id[{$i.ad_category_id}]" value="{$i.ad_category_priority_id}" size="4"></td>
					<td>{$i.ad_category_name}</td>
					<td nowrap><a href="?action_admin_ad_list=true&ad_category_id={$i.ad_category_id}">広告一覧</td>
					<td><a href="?action_admin_adcategory_edit=true&ad_category_id={$i.ad_category_id}">編集</a></td>
					<td><a href="?action_admin_adcategory_delete_do=true&ad_category_id={$i.ad_category_id}" onClick="return confirm('本当にこの{$ft.ad_category.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			※{$ft.ad_category.name}優先度が「0」の場合、ユーザ画面には表示されません。<br />
			{form_submit value="`$ft.ad_category.name`優先度更新"}
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
