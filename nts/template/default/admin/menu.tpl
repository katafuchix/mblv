{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>管理メニュー</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<blockquote>
			<a href="?action_admin_util=true&page=faq_index">2008/02/28 管理操作マニュアルを更新しました。</a>
			</blockquote>
			<!--table class="sheet"-->
			<table>
				<tr>
					<td valign="top">
						<ul>
							<li>ユーザ管理</li>
							<ul>
								<li><a href="?action_admin_user_list=true">ユーザ検索</a></li>
								<li><a href="?action_admin_media_list=true">入会経路管理</a></li>
								<li><a href="?action_admin_analytics_day=true">会員数増減レポート</a></li>
							</ul>
							<li>メルマガ管理</li>
							<ul>
								<li><a href="?action_admin_magazine_list=true">メルマガカレンダー</a></li>
								<li><a href="?action_admin_magazine_add=true">メルマガ追加</a></li>
								<li><a href="?action_admin_segment_list=true">セグメント管理</a></li>
							</ul>
							<li>投稿管理</li>
							<ul>
								<li><a href="?action_admin_blog_article_list=true">日記記事検索</a></li>
								<li><a href="?action_admin_blog_comment_list=true">日記コメント検索</a></li>
								<li><a href="?action_admin_community_add=true">コミュニティ登録</a></li>
								<li><a href="?action_admin_community_list=true">コミュニティ検索</a></li>
								<li><a href="?action_admin_community_article_list=true">コミュニティトピック検索</a></li>
								<li><a href="?action_admin_community_comment_list=true">コミュニティコメント検索</a></li>
								<li><a href="?action_admin_comment_list=true">コメント検索</a></li>
								<li><a href="?action_admin_message_list=true">メッセージ検索</a></li>
								<li><a href="?action_admin_bbs_list=true">伝言メッセージ検索</a></li>
								<li><a href="?action_admin_blacklist_list=true">ブラックリスト管理</a></li>
								<li><a href="?action_admin_report_list=true">通報管理</a></li>
								<li><a href="?action_admin_image_list=true">画像検索</a></li>
								<li><a href="?action_admin_user_friend_introduction_list=true">紹介文検索</a></li>
								{if $config.option.movie}
								<li><a href="?action_admin_movie_list=true">動画検索</a></li>
								{/if}
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>基本設定</li>
							<ul>
								<li><a href="?action_admin_config_edit=true">基本情報管理</a></li>
								<li><a href="?action_admin_config_user_prof=true">プロフィール項目管理</a></li>
								<li><a href="?action_admin_config_community_category=true">コミュニティカテゴリ変更</a></li>
								{if $session.admin.admin_status > 0}
								<li><a href="?action_admin_account_list=true">管理者アカウント管理</a></li>
								{/if}
							</ul>
							<li>広告管理</li>
							<ul>
								{if $config.option.point}
								<li><a href="?action_admin_ad_list=true">{$ft.ad.name}管理</a></li>
								<li><a href="?action_admin_admenu_edit=true">{$ft.ad.name}メニュー管理</a></li>
								{/if}
								<li><a href="?action_admin_banner_list=true">バナー管理</a></li>
							</ul>
							<li>コンテンツ管理</li>
							<ul>
								<li><a href="?action_admin_news_list=true">ニュース管理</a></li>
								{if $config.option.point}
								<li><a href="?action_admin_point_list=true">{$ft.point.name}管理</a></li>
								{/if}
								{if $config.option.avatar}
								<li><a href="?action_admin_avatar_list=true">{$ft.avatar.name}管理</a></li>
								{/if}
								{if $config.option.decomail}
								<li><a href="?action_admin_decomail_list=true">{$ft.decomail.name}管理</a></li>
								{/if}
								{if $config.option.game}
								<li><a href="?action_admin_game_list=true">{$ft.game.name}管理</a></li>
								{/if}
								{if $config.option.sound}
								<li><a href="?action_admin_sound_list=true">{$ft.sound.name}管理</a></li>
								{/if}
								<li><a href="?action_admin_contents_list=true">{$ft.contents.name}管理</a></li>
								<li><a href="?action_admin_thema_edit=true">{$ft.thema.name}管理</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>ユーティリティ</li>
							<ul>
								<li><a href="?action_admin_stats_list=true&type=access&term=month">アクセス解析</a></li>
								<li><a href="?action_admin_mailtemplate_list=true">メールテンプレート管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_index">管理操作マニュアル</a></li>
								<li><a href="#" onClick="javascript:void(window.open('?action_admin_emoji=true','絵文字パレット','width=400,height=400,scrollbars=yes'))">絵文字パレット</a></li>
								{if $config.option.ngword}
								<li><a href="?action_admin_ngword_edit=true">NGワード設定</a></li>
								{/if}
							</ul>
							<li>ログアウト</li>
							<ul>
								<li><a href="?action_admin_logout_do=true">ログアウト</a></li>
							</ul>
						</ul>
					</td>
				</tr>
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
