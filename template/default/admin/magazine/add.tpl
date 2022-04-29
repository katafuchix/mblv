{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.magazine.name}登録</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_magazine_add&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">メルマガ追加FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" method="post" ethna_action="admin_magazine_add_do" onsubmit="updateTextArea('magazine_body_html')"}
			<table class="sheet">
				<tr>
					<th>配信日時<br /><span class="required"></span></th>
					<td>
						{form_input name="year"}年
						{form_input name="month"}月
						{form_input name="day"}日
						{form_input name="hour"}時
						{form_input name="min"}分
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_signature"}</th>
					<td>
						※送信元が「署名&lt;{$config.magazine_mailaddress}&gt;」となります。（空欄の場合は署名が入りません。）<br />
						{form_input name="magazine_signature" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_title"}<br /><span class="required"></span></th>
					<td>
					{form_input name="magazine_title" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_text"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_magazine','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="magazine_body_text" cols=38 rows=30 style="float:left;margin-right:10px;padding-right:10px;"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_html"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_magazine','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="magazine_body_html_status"}<br />
						{form_input name="magazine_body_html" cols=40 rows=20 style="float:left;" id="magazine_body_html"}
{html_style type="j_emoji_replace"}
<script type="text/javascript">
generate_wysiwyg('magazine_body_html');
</script>
					</td>
				</tr>
				<tr>
					<th>テスト配送</th>
					<td>
						{form_name name="test_mailaddress"}：{form_input name="test_mailaddress" size="50"}<br />
						{form_input name="magazine_test"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="segment_id"}</th>
					<td>
						{form_input name="segment_id" emptyoption="全体"}<br />
						<span class="err">※セグメント配信を使用する場合、利用したいセグメントを選択してください。選択されない場合は全体配信となります。</span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.magazine.name`登録　"}</td>
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

