{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>コミュニティカテゴリ管理</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				
				<!--コミュニティカテゴリ追加開始-->
				{form action="$script" ethna_action="admin_config_community_category_add_do"}
				{uniqid}
				<table class="sheet">
					<tr>
						<th>追加するコミュニティカテゴリ名</th>
						<th>追加</th>
					</tr>
					<tr>
						<td>{form_input name="community_category_name"}</td>
						<td>{form_submit value="追加"}</td>
					</tr>
				</table>
				{/form}
				<!--コミュニティカテゴリ追加終了-->
				
				<!--コミュニティカテゴリ一覧開始-->
				<table class="sheet">
					<tr>
						<th>コミュニティカテゴリ名</th>
						<th>編集</th>
						<th>削除</th>
					</tr>
					{foreach from=$app.category_list item=item}
						<tr>
							<td>{$item.community_category_name}</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_edit_do"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_input name="community_category_name" value="`$item.community_category_name`"}
								{form_submit value="編集"}
								{/form}
							</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_delete_do" onSubmit="return confirm('本当にこのコミュニティカテゴリを削除してよろしいですか？');"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_submit value="削除"}
								{/form}
							</td>
						</tr>
					{/foreach}
				</table>
				<!--コミュニティカテゴリ一覧終了-->
				<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
				<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
