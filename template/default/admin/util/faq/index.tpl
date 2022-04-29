{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>管理操作マニュアルFAQ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<table>
				<tr>
					<td valign="top">
						<ul>
							<li>ユーザ管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_user_list&TB_iframe=true&height=700&width=700" title="ユーザ検索" class="thickbox">ユーザ検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_media&TB_iframe=true&height=700&width=700" title="入会経路管理" class="thickbox">入会経路管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_analytics&TB_iframe=true&height=700&width=700" title="会員数増減レポート" class="thickbox">会員数増減レポート</a></li>
								<li><a href="?action_admin_util=true&page=faq_blacklist_list&TB_iframe=true&height=700&width=700" title="ブラックリスト管理" class="thickbox">ブラックリスト管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_report_list&TB_iframe=true&height=700&width=700" title="通報管理" class="thickbox">通報管理</a></li>
							</ul>
							<li>メルマガ管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_magazine_list&TB_iframe=true&height=700&width=700" title="メルマガカレンダー" class="thickbox">メルマガカレンダー</a></li>
								<li><a href="?action_admin_util=true&page=faq_magazine_add&TB_iframe=true&height=700&width=700" title="メルマガ追加" class="thickbox">メルマガ追加</a></li>
								<li><a href="?action_admin_util=true&page=faq_segment&TB_iframe=true&height=700&width=700" title="セグメント管理" class="thickbox">セグメント管理</a></li>
							</ul>
							<li>投稿管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_blog_article_list&TB_iframe=true&height=700&width=700" title="日記検索" class="thickbox">日記検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_blog_comment_list&TB_iframe=true&height=700&width=700" title="日記コメント検索" class="thickbox">日記コメント検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_list&TB_iframe=true&height=700&width=700" title="コミュニティ検索" class="thickbox">コミュニティ検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_article_list&TB_iframe=true&height=700&width=700" title="コミュニティトピック検索" class="thickbox">コミュニティトピック検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_comment_list&TB_iframe=true&height=700&width=700" title="コミュニティコメント検索" class="thickbox">コミュニティコメント検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_comment_list&TB_iframe=true&height=700&width=700" title="ファイル検索" class="thickbox">コメント検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_message_list&TB_iframe=true&height=700&width=700" title="メッセージ検索" class="thickbox">メッセージ検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_bbs_list&TB_iframe=true&height=700&width=700" title="伝言メッセージ検索" class="thickbox">伝言メッセージ検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_file_list&TB_iframe=true&height=700&width=700" title="画像検索" class="thickbox">画像検索</a></li>
								<li><a href="?action_admin_util=true&page=faq_user_introduction_list&TB_iframe=true&height=700&width=700" title="紹介文検索" class="thickbox">紹介文検索</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>基本設定</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_config_edit&TB_iframe=true&height=700&width=700" title="基本情報管理" class="thickbox">基本情報管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_profile_edit&TB_iframe=true&height=700&width=700" title="プロフィール項目管理" class="thickbox">プロフィール項目管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_community_category_edit&TB_iframe=true&height=700&width=700" title="コミュニティカテゴリ変更" class="thickbox">コミュニティカテゴリ変更</a></li>
								<li><a href="?action_admin_util=true&page=faq_account_list&TB_iframe=true&height=700&width=700" title="管理者アカウント管理" class="thickbox">管理者アカウント管理</a></li>
							</ul>
							<li>広告管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_ad_list&TB_iframe=true&height=700&width=700" title="広告管理" class="thickbox">広告管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_admenu_edit&TB_iframe=true&height=700&width=700" title="広告メニュー管理" class="thickbox">広告メニュー管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_banner_list&TB_iframe=true&height=700&width=700" title="バナー管理" class="thickbox">バナー管理</a></li>
							</ul>
							<li>コンテンツ管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_news_list&TB_iframe=true&height=700&width=700" title="ニュース管理" class="thickbox">ニュース管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_point_list&TB_iframe=true&height=700&width=700" title="ポイント管理" class="thickbox">ポイント管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_avatar_list&TB_iframe=true&height=700&width=700" title="アバター管理" class="thickbox">アバター管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_decomail_list&TB_iframe=true&height=700&width=700" title="デコメール管理" class="thickbox">デコメール管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_game_list&TB_iframe=true&height=700&width=700" title="ゲーム管理" class="thickbox">ゲーム管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_sound_list&TB_iframe=true&height=700&width=700" title="サウンド管理" class="thickbox">サウンド管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_contents_list&TB_iframe=true&height=700&width=700" title="フリーページ管理" class="thickbox">フリーページ管理</a></li>
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>EC管理</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_review_list&TB_iframe=true&height=700&width=700" title="レビュー管理" class="thickbox">レビュー管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_userorder_list&TB_iframe=true&height=700&width=700" title="受注台帳" class="thickbox">受注台帳</a></li>
								<li><a href="?action_admin_util=true&page=faq_shop_list&TB_iframe=true&height=700&width=700" title="ショップ管理" class="thickbox">ショップ管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_itemcategory_list&TB_iframe=true&height=700&width=700" title="商品管理" class="thickbox">商品カテゴリ管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_item_list&TB_iframe=true&height=700&width=700" title="商品管理" class="thickbox">商品管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_supplier_list&TB_iframe=true&height=700&width=700" title="仕入先管理" class="thickbox">仕入先管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_postage_list&TB_iframe=true&height=700&width=700" title="送料設定管理" class="thickbox">送料設定管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_exchange_list&TB_iframe=true&height=700&width=700" title="代引き手数料設定管理" class="thickbox">代引き手数料設定管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_ec_config_edit&TB_iframe=true&height=700&width=700" title="モール基本情報管理" class="thickbox">モール基本情報管理</a></li>
							</ul>
							<li>ユーティリティ</li>
							<ul>
								<li><a href="?action_admin_util=true&page=faq_stats_list&TB_iframe=true&height=700&width=700" title="アクセス解析" class="thickbox">アクセス解析</a></li>
								<li><a href="?action_admin_util=true&page=faq_mailtemplate_list&TB_iframe=true&height=700&width=700" title="メールテンプレート管理" class="thickbox">メールテンプレート管理</a></li>
								<li><a href="?action_admin_util=true&page=faq_util&TB_iframe=true&height=700&width=700" title="管理操作マニュアル" class="thickbox">管理操作マニュアル</a></li>
								<li><a href="?action_admin_util=true&page=faq_emoji&TB_iframe=true&height=700&width=700" title="絵文字パレット" class="thickbox">絵文字パレット</a></li>
								<li><a href="?action_admin_util=true&page=faq_ngword_edit&TB_iframe=true&height=700&width=700" title="NGワード設定" class="thickbox">NGワード設定</a></li>
								<li><a href="?action_admin_util=true&page=faq_logout&TB_iframe=true&height=700&width=700" title="ログアウト" class="thickbox">ログアウト</a></li>
							</ul>
						</ul>
					</td>
				</tr>
			</table>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
