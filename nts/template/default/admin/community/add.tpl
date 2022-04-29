{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>コミュニティ登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_community_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="community_title"}</th>
					<td>{form_input name="community_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="community_category_id"}</th>
					<td>{form_input name="community_category_id"}</td>
				</tr>
					<th>{form_name name="community_join_condition"}</th>
					<td>{form_input name='community_join_condition'}</td>
				</tr>
				<tr>
					<th>{form_name name="community_topic_permission"}</th>
					<td>{form_input name="community_topic_permission"}</td>
				</tr>
				<tr>
					<th>{form_name name="community_description"}</th>
					<td>{form_input name="community_description" rows="20" cols="40"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_id"}</th>
					<td>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="登録"}</td>
				</tr>
			</table>
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
