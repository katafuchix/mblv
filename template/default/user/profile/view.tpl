<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.user.user_nickname`さんの`$ft.profile.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<!--上部メニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	<div align="left" style="text-align:left;float:left;">
	<table width="100%"><tr><td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
		<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
			{if $config.option.avatar}
			<!--アバター画像開始-->
			<img src="?action_user_file_avatar_preview=true&attr=s&user_id={$app.user.user_id}&SESSID={$SESSID}" alt="画像" style="float:left;" />
			<!--アバター画像終了-->
			{else}
			<!--マイ画像開始-->
			<img src="f.php?type=image&id={$app.user.image_id}&attr=t&SESSID={$SESSID}" alt="画像" style="float:left;" />
			<!--マイ画像終了-->
			{/if}
		</div>
	</td>
	<td>
		<div style="float:left;font-size:small;">
			<!--このプロフィールを見るのが自分の場合開始-->
			{if $app.is_myself}
				[x:0138]<a href="?action_user_profile_edit=true">{$ft.profile.name}変更</a><br />
				{if !$config.option.avatar}
				<!--アバターオプションがない場合のみマイ画像変更可能-->
				[x:0066]<a href="{html_style type='mailto' account='my_image' hash=$app.user.user_hash}">画像変更</a><br />
				{/if}
			{/if}
			<!--このプロフィールを見るのが自分の場合終了-->
			<!--このプロフィールを見るのが自分ではない場合開始-->
			{if !$app.is_myself}
				[x:0105]<a href="?action_user_message_send=true&to_user_id={$form.user_id}">{$ft.message.name}を送る</a><br />
				<!--友達リンク・紹介文開始-->
				{if $app.friend_status == 0}
					[x:0078]<a href="?action_user_friend_apply=true&to_user_id={$form.user_id}">{$ft.friend.name}申請</a><br />
				{elseif $app.friend_status == 1}
					{$ft.friend.name}申請中...<br />
				{elseif $app.friend_status == 2}
					[x:0182]<a href="?action_user_friend_introduction_edit=true&to_user_id={$form.user_id}">{$ft.friend_introduction.name}を書く</a><br />
				{/if}
				<!--友達リンク・紹介文終了-->
			{/if}
			[x:0182]<a href="?action_user_friend_introduction_list=true&to_user_id={$form.user_id}">{$ft.friend_introduction.name}を見る</a><br />
			<!--このプロフィールを見るのが自分ではない場合終了-->
			<!--共通開始-->
			[x:0129]<a href="?action_user_friend_list=true&user_id={$form.user_id}">{$ft.friend_list.name}</a><br />
			[x:0024]<a href="?action_user_community_list=true&user_id={$form.user_id}">参加{$ft.community.name}</a><br />
			[x:0768]<a href="?action_user_blog_view=true&user_id={$form.user_id}">{$ft.blog_article.name}</a><br />
			<!--共通終了-->
		</div>
	</td></tr></table>
	</div>
	{html_style type="line" color="gray"}
</div>
<!--上部メニュー終了-->

<!--プロフィール情報開始-->
<div align="left" style="text-align:left;font-size:small;">
	<!--共通開始-->
	[x:0129]ﾆｯｸﾈｰﾑ&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_nickname}
	{html_style type="line" color="gray"}
	
	{if $config.profile.user_sex}
	{if $config.user_sex[$app.user.user_sex].name}
	{if $app.user.user_sex_public}
	[x:0048]性　別&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_sex[$app.user.user_sex].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_birth_date}
	{if $app.user.user_birth_date}
	{if $app.user.user_birth_date_public}
	[x:0071]誕生日&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_birth_date|date_format:"%Y年%m月%d日"}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $app.user.user_address_public}
	{if $config.profile.prefecture_id}
	{if $config.prefecture_id[$app.user.prefecture_id].name}
	[x:0037]住　所&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.prefecture_id[$app.user.prefecture_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{*if $config.profile.user_address}
	<!--個人情報なので固定非表示-->
	{if $app.user.user_address}
	{if $app.user.user_address_public}
	住所(市区町村番地)&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_address}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if*}
	
	{*if $config.profile.user_address_building}
	<!--個人情報なので固定非表示-->
	{if $app.user.user_address_building}
	{if $app.user.user_address_public}
	住所(建物名)&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_address_building}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if*}
	
	{if $config.profile.user_blood_type}
	{if $config.user_blood_type[$app.user.user_blood_type].name}
	{if $app.user.user_blood_type_public}
	[x:0126]血液型&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_blood_type[$app.user.user_blood_type].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_is_married}
	{if $config.user_is_married[$app.user.user_is_married].name}
	{if $app.user.user_is_married_public}
	[x:0080]結　婚&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_is_married[$app.user.user_is_married].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.work_location_prefecture_id}
	{if $config.prefecture_id[$app.user.work_location_prefecture_id].name}
	{if $app.user.work_location_prefecture_id_public}
	[x:0198]勤務地&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.prefecture_id[$app.user.work_location_prefecture_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.job_family_id}
	{if $config.job_family_id[$app.user.job_family_id].name}
	{if $app.user.job_family_id_public}
	[x:0768]職　種&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.job_family_id[$app.user.job_family_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.business_category_id}
	{if $config.business_category_id[$app.user.business_category_id].name}
	{if $app.user.business_category_id_public}
	[x:0769]業　種&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.business_category_id[$app.user.business_category_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_hobby}
	{if $app.user.user_hobby}
	{if $app.user.user_hobby_public}
	[x:0022]趣　味&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_hobby}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_url}
	{if $app.user.user_url}
	{if $app.user.user_url_public}
	[x:0040]URL&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_url}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_introduction}
	{if $app.user.user_introduction}
	{if $app.user.user_introduction_public}
	自己紹介&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_introduction}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	<!--動的プロフィール項目開始-->
	{foreach from=$app.userProfList item=item}
		{if $item[1]}{$item[1]}&nbsp;<span style="color:{$hrcolor}">:</span>{/if}
		{if $item[2] == 5}
			{* チェックボックス *}
			{strip}
			{foreach from=$item[3] item=value name=checkbox}
				{$value}{if !$smarty.foreach.checkbox.last}、{/if}
			{/foreach}
				{html_style type="line" color="gray"}
			{/strip}
		{else}
		{* チェックボックス以外 *}
			{$item[3]|nl2br}
			{html_style type="line" color="gray"}
		{/if}
	{/foreach}
	<!--動的プロフィール項目終了-->
	<!--共通終了-->
</div>
<!--プロフィール情報終了-->

<!--伝言板開始-->
{html_style type="title" title="伝言板" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	<!--自分の場合開始-->
	{if $app.is_myself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		[x:0166]<a href="?action_user_bbs_add=true&to_user_id={$session.user.user_id}">書き込む</a>
		/
		[x:0082]<a href="?action_user_bbs_list=true&user_id={$session.user.user_id}">一覧</a>
		]
		</div>
	{/if}
	<!--自分の場合終了-->
	<!--自分ではない場合開始-->
	{if !$app.is_myself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		<a href="?action_user_bbs_add=true&to_user_id={$form.user_id}">書き込む[x:0166]</a>
		/
		<a href="?action_user_bbs_list=true&user_id={$form.user_id}">一覧[x:0082]</a>
		]
		</div>
	{/if}
	<!--自分ではない場合終了-->
	{html_style type="line" color="gray"}
	{foreach from=$app.bbs item=item}
		<div align="left" style="text-align:left;float:left;">
			{if $config.option.avatar}
				<img src="f.php?type=avatar&user_id={$item.from_user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
			{else}
				{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
				{/if}
			{/if}
			<span>
				<span style="color:{$timecolor}">{$item.bbs_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
				{if $app.is_myself || $item.from_user_id == $session.user.user_id}
				[<a href="?action_user_bbs_edit=true&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">編集</a>]
				{/if}
				<br />
				<a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>さん<br />
				{$item.bbs_body}
				{if $item.image_id}
				<a href="?action_user_file_image_view=true&image_id={$item.image_id}&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">
				<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" alt="画像">
				</a>
				{/if}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--伝言板終了-->

<!--下部メニュー開始-->
<div align="right" style="text-align:right;font-size:small;">
	<!--このプロフィールを見るのが自分ではない場合開始-->
	{if !$app.is_myself}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{if $app.friend_status == 2}
		<!--友達リンク開始-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_friend_delete=true&to_user_id={$form.user_id}">友達ﾘﾝｸを解除する</a><br />
		<!--友達リンク終了-->
		{/if}
		<!--ブラックリスト開始-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>
			{if $app.blacklist_status == 1}
				<a href="?action_user_blacklist_delete_confirm=true&black_list_deny_user_id={$form.user_id}">ﾌﾞﾗｯｸﾘｽﾄから削除する</a>
			{else}
				<a href="?action_user_blacklist_add_confirm=true&black_list_deny_user_id={$form.user_id}">ﾌﾞﾗｯｸﾘｽﾄに登録する</a>
			{/if}<br />
		<!--ブラックリスト終了-->
		<!--通報開始-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>
			<a href="?action_user_report_send=true&report_fail_user_id={$form.user_id}">通報する</a>
			<br />
		<!--通報終了-->
	{/if}
</div>
<!--下部メニュー終了-->
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
