{if $app.listview_data}{* データが存在する場合 *}
{if $app.name}[{$app.name}],{elseif $id.id}[ID:{$form.id}],{/if}
{if $form.term=='year'}年単位,{elseif $form.term=='month'}月単位,{elseif $form.term=='week'}週単位,{elseif $form.term=='day'}日単位,{elseif $form.term=='hour'}時単位,{/if}
{if $form.term=='all'}{$form.date}{else}{$form.date}{/if}
{if $form.date_end}〜{$form.date_end}{/if}

合計,{foreach from=$app.total item=item key=k name="total"}{$config.stats_score[$k].name}:{$item}{if !$smarty.foreach.total.last},{/if}{/foreach}


{if $form.id!=''}{* [term]別の集計 *}
{if $form.term=='all'}{* 累計 *}
年,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--年*}{$item.stats_date|jp_date_format:"%Y年"}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='year'}{* 年単位 *}
月,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--月*}{$item.stats_date|jp_date_format:"%Y年%m月"}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='month'}{* 月単位 *}
日,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--日*}{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='week'}{* 週単位 *}
日,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--日*}{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='day'}{* 日単位 *}
時間,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--時間*}{$item.stats_date|jp_date_format:"%H時"}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{/if}{* [term]別の集計終了 *}
{else}{* ランキング *}
ID,種別,スコア
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--ID*}{if $form.type=="access"}{$app.al[$item.id]}{$item.id}{elseif $item.name}{$item.name}{else}{$item.id}{/if}{*-->*},{*<!--種別+スコア*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*改行*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{/if}
{else}
データが存在しません。
{/if}
