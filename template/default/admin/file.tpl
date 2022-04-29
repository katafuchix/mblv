<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$site_html_title} ファイルアップロード管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset={$io_encoding}">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$site_meta_description}">
<meta name="keywords" content="{$site_meta_keywords}">
<meta name="robots" content="{$site_meta_robots}">
<meta name="author" content="{$site_meta_author}">
<script src="common/common.js" language="JavaScript"></script>
<link rel="stylesheet" type="text/css" href="common/common.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/sns.css">
</head>
<body>
<div style="background:#fff;padding:10px 10px 100px 10px;">
	{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="admin_file" enctype="multipart/form-data"}
	{form_name name="file"} : {form_input name="file"}&nbsp;&nbsp;{form_name name="file_memo"} : {form_input name="file_memo"}&nbsp;&nbsp;{form_input name="upload"}
	{/form}
	<hr />
	<form name="search">
	{form action="$script" ethna_action="admin_file"}
		{form_input name="text"}&nbsp;&nbsp;{form_input name="search"}
	{/form}
	</form>
	<hr />
	<form name="fm">
	<span style="font-size:small">↓選択したい画像またはファイル名をクリックすると、選択されたファイルを表示させるタグが表示されます。</span><br />
	<input type="text" name="file" {if $form.mode}size="50"{else}size="15"{/if}>
	</form>
	<hr />
	{include file="admin/pager.tpl"}
	<table class="sheet" id="list">
		{foreach from=$app.listview_data item=item}
		<tr>
			<td>
				{if $form.mode}
					<a href="Javascript:JsFileHtml('{$item.file_id}');">
				{else}
					<a href="Javascript:JsFile('{$item.file_id}');">
				{/if}
					{html_style type="file" filename="f.php&file=file/`$item.file_name`" text="`$item.file_name_o`"}</a>
			</td>
			<td>
				{if $form.mode}
					<a href="Javascript:JsFileHtml('{$item.file_id}');">
				{else}
					<a href="Javascript:JsFile('{$item.file_id}');">
				{/if}
					{$item.file_name_o}</a>
				<br />
				{form action="$script" ethna_action="admin_file" enctype="multipart/form-data"}
				{form_input name="file_id" value="`$item.file_id`"}
				{form_name name="file"} : {form_input name="file"}<br />
				{form_name name="file_memo"} : {form_input name="file_memo" default=$item.file_memo}{form_input name="edit"}
				{/form}
			</td>
			<td>
				<a href="?action_admin_file=true&file_id={$item.file_id}&delete=true" onClick="return confirm('本当にこのファイルを削除してよろしいですか？');">削除</a>
			</td>
		</tr>
		{/foreach}
	</table>
	{include file="admin/pager.tpl"}
	</form>
</div>
</body>
</html>
