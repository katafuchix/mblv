<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$sns_html_title} ファイルアップロード管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset={$io_encoding}">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$sns_meta_description}">
<meta name="keywords" content="{$sns_meta_keywords}">
<meta name="robots" content="{$sns_meta_robots}">
<meta name="author" content="{$sns_meta_author}">
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
	{form_input name="file"}{form_input name="upload"}
	{/form}
	<form name="fm">
	<span style="font-size:small">↓選択したい画像またはファイル名をクリックすると、選択されたファイルを表示させるタグが表示されます。</span><br />
	<input type="text" name="file" size="15">
	</form>
	{include file="admin/pager.tpl"}
	<table class="sheet" id="list">
		{foreach from=$app.listview_data item=item}
		<tr>
			<td>
				<a href="Javascript:JsFile('{$item.file_id}');">{html_style type="file" filename="f.php&file=file/`$item.file_name`" text="`$item.file_name_o`"}</a>
			</td>
			<td>
				<a href="Javascript:JsFile('{$item.file_id}');">{$item.file_name_o}</a><br />
				{form action="$script" ethna_action="admin_file" enctype="multipart/form-data"}
				{form_input name="file_id" value="`$item.file_id`"}
				{form_input name="file"}{form_input name="edit"}
				{/form}
			</td>
			<td>
				<a href="?action_admin_file=true&file_id={$item.file_id}&delete=true" onClick="return confirm('本当にこのファイルを削除してよろしいですか？');">削除</a>
			</td>
		</tr>
		{/foreach}
	</table>
	{include file="admin/pager.tpl"}
</div>
</body>
</html>
