{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="ethna-error">エラーが発生しました。管理者までご連絡下さい。<br />{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
