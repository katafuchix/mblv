{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>アバター台座登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_avatarstand_add_do" enctype="multipart/form-data"}
			{uniqid}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="avatar_stand_name"}</th>
					<td>{form_input name="avatar_stand_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_image"}</th>
					<td>{form_input name="avatar_stand_image"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_x"}</th>
					<td>
						※アバター台座切り出し開始X座標<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_base_x"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_y"}</th>
					<td>
						※アバター台座切り出し開始Y座標<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_base_y"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_w"}</th>
					<td>
						※アバター台座切り出し幅<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_base_w"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_h"}</th>
					<td>
						※アバター台座切り出し高さ<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_base_h"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_w"}</th>
					<td>
						※アバター台座表示幅<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_w"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_h"}</th>
					<td>
						※アバター台座表示高さ<br />
						不要な場合は空にして下さい。<br />
						{form_input name="avatar_stand_h"}
					</td>
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
