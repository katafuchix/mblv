<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user.user_nickname`�����`$ft.profile.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<!--������˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	<div align="left" style="text-align:left;float:left;">
	<table width="100%"><tr><td align="center" valign="middle" width="{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px">
		<div style="float:left;width:{if $config.option.avatar}{$config.avatar_s_width}{else}{$config.file_width_t}{/if}px;">
			{if $config.option.avatar}
			<!--���Х�����������-->
			<img src="?action_user_file_avatar_preview=true&attr=s&user_id={$app.user.user_id}&SESSID={$SESSID}" alt="����" style="float:left;" />
			<!--���Х���������λ-->
			{else}
			<!--�ޥ���������-->
			<img src="f.php?type=image&id={$app.user.image_id}&attr=t&SESSID={$SESSID}" alt="����" style="float:left;" />
			<!--�ޥ�������λ-->
			{/if}
		</div>
	</td>
	<td>
		<div style="float:left;font-size:small;">
			<!--���Υץ�ե�����򸫤�Τ���ʬ�ξ�糫��-->
			{if $app.is_myself}
				[x:0138]<a href="?action_user_profile_edit=true">{$ft.profile.name}�ѹ�</a><br />
				{if !$config.option.avatar}
				<!--���Х������ץ���󤬤ʤ����Τߥޥ������ѹ���ǽ-->
				[x:0066]<a href="{html_style type='mailto' account='my_image' hash=$app.user.user_hash}">�����ѹ�</a><br />
				{/if}
			{/if}
			<!--���Υץ�ե�����򸫤�Τ���ʬ�ξ�罪λ-->
			<!--���Υץ�ե�����򸫤�Τ���ʬ�ǤϤʤ���糫��-->
			{if !$app.is_myself}
				[x:0105]<a href="?action_user_message_send=true&to_user_id={$form.user_id}">{$ft.message.name}������</a><br />
				<!--ͧã��󥯡��Ҳ�ʸ����-->
				{if $app.friend_status == 0}
					[x:0078]<a href="?action_user_friend_apply=true&to_user_id={$form.user_id}">{$ft.friend.name}����</a><br />
				{elseif $app.friend_status == 1}
					{$ft.friend.name}������...<br />
				{elseif $app.friend_status == 2}
					[x:0182]<a href="?action_user_friend_introduction_edit=true&to_user_id={$form.user_id}">{$ft.friend_introduction.name}���</a><br />
				{/if}
				<!--ͧã��󥯡��Ҳ�ʸ��λ-->
			{/if}
			[x:0182]<a href="?action_user_friend_introduction_list=true&to_user_id={$form.user_id}">{$ft.friend_introduction.name}�򸫤�</a><br />
			<!--���Υץ�ե�����򸫤�Τ���ʬ�ǤϤʤ���罪λ-->
			<!--���̳���-->
			[x:0129]<a href="?action_user_friend_list=true&user_id={$form.user_id}">{$ft.friend_list.name}</a><br />
			[x:0024]<a href="?action_user_community_list=true&user_id={$form.user_id}">����{$ft.community.name}</a><br />
			[x:0768]<a href="?action_user_blog_view=true&user_id={$form.user_id}">{$ft.blog_article.name}</a><br />
			<!--���̽�λ-->
		</div>
	</td></tr></table>
	</div>
	{html_style type="line" color="gray"}
</div>
<!--������˥塼��λ-->

<!--�ץ�ե�������󳫻�-->
<div align="left" style="text-align:left;font-size:small;">
	<!--���̳���-->
	[x:0129]�Ǝ����Ȏ���&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_nickname}
	{html_style type="line" color="gray"}
	
	{if $config.profile.user_birth_date}
	{if $app.user.user_birth_date_public}
	{if $app.user.user_birth_date}
	[x:0071]������&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;
	{$app.user.user_birth_date|regex_replace:'/^(\d\d\d\d)-(\d\d)-(\d\d)/':'$1'}ǯ
	{$app.user.user_birth_date|regex_replace:'/^(\d\d\d\d)-(\d\d)-(\d\d)/':'$2'}��
	{$app.user.user_birth_date|regex_replace:'/^(\d\d\d\d)-(\d\d)-(\d\d)/':'$3'}��
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_sex}
	{if $app.user.user_sex_public}
	{if $config.user_sex[$app.user.user_sex].name}
	[x:0048]������&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_sex[$app.user.user_sex].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.prefecture_id}
	{if $app.user.user_address_public}
	{if $config.prefecture_id[$app.user.prefecture_id].name}
	[x:0037]������&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.prefecture_id[$app.user.prefecture_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	
	{if $config.profile.user_address}
	{if $app.user.user_address_public}
	{if $app.user.user_address}
	����(�Զ�Į¼����)&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_address}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_address_building}
	{if $app.user.user_address_public}
	{if $app.user.user_address_building}
	����(��ʪ̾)&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_address_building}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_blood_type}
	{if $app.user.user_blood_type_public}
	{if $config.user_blood_type[$app.user.user_blood_type].name}
	[x:0126]��շ�&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_blood_type[$app.user.user_blood_type].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_is_married}
	{if $app.user.user_is_married_public}
	{if $config.user_is_married[$app.user.user_is_married].name}
	[x:0080]�롡��&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.user_is_married[$app.user.user_is_married].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.work_location_prefecture_id}
	{if $app.user.work_location_prefecture_id_public}
	{if $config.prefecture_id[$app.user.work_location_prefecture_id].name}
	[x:0198]��̳��&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.prefecture_id[$app.user.work_location_prefecture_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.job_family_id}
	{if $app.user.job_family_id_public}
	{if $config.job_family_id[$app.user.job_family_id].name}
	[x:0768]������&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.job_family_id[$app.user.job_family_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.business_category_id}
	{if $app.user.business_category_id_public}
	{if $config.business_category_id[$app.user.business_category_id].name}
	[x:0769]�ȡ���&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$config.business_category_id[$app.user.business_category_id].name}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_hobby}
	{if $app.user.user_hobby_public}
	{if $app.user.user_hobby}
	[x:0022]��̣&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_hobby}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_url}
	{if $app.user.user_url_public}
	{if $app.user.user_url}
	[x:0040]URL&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_url}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	{if $config.profile.user_introduction}
	{if $app.user.user_introduction_public}
	{if $app.user.user_introduction}
	���ʾҲ�&nbsp;<span style="color:{$hrcolor}">:</span>&nbsp;{$app.user.user_introduction}
	{html_style type="line" color="gray"}
	{/if}
	{/if}
	{/if}
	
	<!--ưŪ�ץ�ե�������ܳ���-->
	{foreach from=$app.userProfList item=item}
		{if $item[1]}{$item[1]}&nbsp;<span style="color:{$hrcolor}">:</span>{/if}
		{if $item[2] == 5}
			{* �����å��ܥå��� *}
			{strip}
			{foreach from=$item[3] item=value name=checkbox}
				{$value}{if !$smarty.foreach.checkbox.last}��{/if}
			{/foreach}
				{html_style type="line" color="gray"}
			{/strip}
		{else}
		{* �����å��ܥå����ʳ� *}
			{$item[3]|nl2br}
			{html_style type="line" color="gray"}
		{/if}
	{/foreach}
	<!--ưŪ�ץ�ե�������ܽ�λ-->
	<!--���̽�λ-->
</div>
<!--�ץ�ե��������λ-->

<!--�����ĳ���-->
{html_style type="title" title="������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	<!--��ʬ�ξ�糫��-->
	{if $app.is_myself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		[x:0166]<a href="?action_user_bbs_add=true&to_user_id={$session.user.user_id}">�񤭹���</a>
		/
		[x:0082]<a href="?action_user_bbs_list=true&user_id={$session.user.user_id}">����</a>
		]
		</div>
	{/if}
	<!--��ʬ�ξ�罪λ-->
	<!--��ʬ�ǤϤʤ���糫��-->
	{if !$app.is_myself}
		<div align="center" style="text-align:center;font-size:small;">
		[
		[x:0166]<a href="?action_user_bbs_add=true&to_user_id={$form.user_id}">�񤭹���</a>
		/
		[x:0082]<a href="?action_user_bbs_list=true&user_id={$form.user_id}">����</a>
		]
		</div>
	{/if}
	<!--��ʬ�ǤϤʤ���罪λ-->
	{html_style type="line" color="gray"}
	{foreach from=$app.bbs item=item}
		<div align="left" style="text-align:left;float:left;">
			{if $config.option.avatar}
				<img src="f.php?type=avatar&user_id={$item.from_user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
			{else}
				{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
				{/if}
			{/if}
			<span>
				<span style="color:{$timecolor}">{$item.bbs_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
				{*if $app.is_myself || $item.from_user_id == $session.user.user_id*}
				{if $item.from_user_id == $session.user.user_id}
				[<a href="?action_user_bbs_edit=true&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">�Խ�</a>]
				{/if}
				{if $app.is_myself }
				[<a href="?action_user_bbs_delete_confirm=true&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">���</a>]
				{/if}
				<br />
				<a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>����<br />
				{$item.bbs_body}
				{if $item.image_id}
				<a href="?action_user_file_image_view=true&image_id={$item.image_id}&bbs_id={$item.bbs_id}&to_user_id={$form.user_id}">
				<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" alt="����">
				</a>
				{/if}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--�����Ľ�λ-->

<!--������˥塼����-->
<div align="right" style="text-align:right;font-size:small;">
	<!--���Υץ�ե�����򸫤�Τ���ʬ�ǤϤʤ���糫��-->
	{if !$app.is_myself}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{if $app.friend_status == 2}
		<!--ͧã��󥯳���-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_friend_delete=true&to_user_id={$form.user_id}">{$ft.friend.name}��������</a><br />
		<!--ͧã��󥯽�λ-->
		{/if}
		<!--�֥�å��ꥹ�ȳ���-->
		{if $app.blacklist_status == 1}
			<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blacklist_delete_confirm=true&black_list_deny_user_id={$form.user_id}">{$ft.blacklist.name}����������</a><br />
		{else}
			<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blacklist_add_confirm=true&black_list_deny_user_id={$form.user_id}">{$ft.blacklist.name}����Ͽ����</a><br />
		{/if}
		<!--�֥�å��ꥹ�Ƚ�λ-->
		<!--���󳫻�-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_report_send=true&report_fail_user_id={$form.user_id}">{$ft.report.name}����</a>
		<!--����λ-->
	{/if}
</div>
<!--������˥塼��λ-->
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
