{if $app.listview_data}{* �ǡ�����¸�ߤ����� *}
{if $app.name}[{$app.name}],{elseif $id.id}[ID:{$form.id}],{/if}
{if $form.term=='year'}ǯñ��,{elseif $form.term=='month'}��ñ��,{elseif $form.term=='week'}��ñ��,{elseif $form.term=='day'}��ñ��,{elseif $form.term=='hour'}��ñ��,{/if}
{if $form.term=='all'}{$form.date}{else}{$form.date}{/if}
{if $form.date_end}��{$form.date_end}{/if}

���,{foreach from=$app.total item=item key=k name="total"}{$config.stats_score[$k].name}:{$item}{if !$smarty.foreach.total.last},{/if}{/foreach}


{if $form.id!=''}{* [term]�̤ν��� *}
{if $form.term=='all'}{* �߷� *}
ǯ,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--ǯ*}{$item.stats_date|jp_date_format:"%Yǯ"}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='year'}{* ǯñ�� *}
��,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--��*}{$item.stats_date|jp_date_format:"%Yǯ%m��"}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='month'}{* ��ñ�� *}
��,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--��*}{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='week'}{* ��ñ�� *}
��,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--��*}{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{elseif $form.term=='day'}{* ��ñ�� *}
����,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--����*}{$item.stats_date|jp_date_format:"%H��"}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{/if}{* [term]�̤ν��׽�λ *}
{else}{* ��󥭥� *}
ID,����,������
{foreach from=$app.listview_data item=item}
{if $item != false}
{*<!--ID*}{if $form.type=="access"}{$app.al[$item.id]}{$item.id}{elseif $item.name}{$item.name}{else}{$item.id}{/if}{*-->*},{*<!--����+������*}{foreach from=$app.score_keys item=sk key=k}{if $item.$sk!=''}{if $k!=0},{/if}{$config.stats_score[$sk].name},{$item.$sk}
{*����*}
{/if}{/foreach}{*-->*}
{/if}
{/foreach}

{/if}
{else}
�ǡ�����¸�ߤ��ޤ���
{/if}
