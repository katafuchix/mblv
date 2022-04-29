{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>コミュニティカテゴリ管理</h2>
				<blockquote><a href="?action_admin_util=true&page=faq_community_category_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">コミュニティカテゴリ管理FAQ</a></blockquote>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				
				<!--コミュニティカテゴリ追加開始-->
				{form action="$script" ethna_action="admin_config_community_category_add_do"}
				{uniqid}
				<table class="sheet">
					<tr>
						<th>追加するコミュニティカテゴリ名<br /><span class="required"></span></th>
						<th>優先度</th>
						<th>追加</th>
					</tr>
					<tr>
						<td>{form_input name="community_category_name"}</td>
						<td>{form_input name="community_category_priority_id"}</td>
						<td>{form_submit value="追加"}</td>
					</tr>
				</table>
				{/form}
				<!--コミュニティカテゴリ追加終了-->
				
				<!--コミュニティカテゴリ一覧開始-->
				<table class="sheet">
					<tr>
						<th>コミュニティカテゴリ名</th>
						<th>編集 / 優先度</th>
						<th>削除</th>
					</tr>
					{foreach from=$app.category_list item=item}
						<tr>
							<td>{$item.community_category_name}</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_edit_do"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_input name="community_category_name" value="`$item.community_category_name`"}
								{form_input name="community_category_priority_id" value="`$item.community_category_priority_id`"}
								{form_submit value="　編集　"}
								{/form}
							</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_delete_do" onSubmit="return confirm('本当にこのコミュニティカテゴリを削除してよろしいですか？');"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_submit value="　削除　"}
								{/form}
							</td>
						</tr>
					{/foreach}
				</table>
				<!--コミュニティカテゴリ一覧終了-->
					<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
