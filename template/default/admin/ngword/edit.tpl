{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.ngword.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_ngword_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.ngword.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_ngword_edit_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="site_ngword"}</th>
					<td>
						※投稿を禁止させたいキーワードを改行で区切って入力して下さい。<br />
						{form_input name="site_ngword" rows="40" cols="80"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
				</tr>
			</table>
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
