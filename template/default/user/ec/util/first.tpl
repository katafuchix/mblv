<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="���Ƥ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
<a name="TOP"></a>

<div align="left" style="text-align:left;font-size:small;">

<font color="red">��</font>�����Ѥ�����ɬ�����ɤ߲�������<br />
<font color="blue">��</font><a href="#mall">{$mall_name}�Ȥ�?</a><br />
<font color="blue">��</font><a href="#search">�ߤ������ʤ�õ���Ƥߤ褦!</a><br />
<font color="blue">��</font><a href="#try">��äƤߤ褦!</a><br />
<font color="blue">��</font><a href="#register">�����Ͽ!</a><br />
<font color="blue">��</font><a href="#mail">�Ҏَώ��ޤǤ�äȤ���!</a>

<br /><br />
<div align="center">
------------------
</div>

<a name="mall" id="mall"></a><br />
    <font color="green" size="3">[x:0068]</font><font color="#CC0000" size="3">{$mall_name}�Ȥ�?</font> 
    <hr>

    �Ϥ���Ƥ����Ǥ�¿����Ƴڤ���뎻���ˎގ������äѤ��Ύ������ˎߎݎ��ގ����ĤǤ���<br />
<!--�ߤ������ʤ�õ���Ƥߤ褦!-->

<a name="search" id="search"></a><br />
<font color="blue">[x:0111]</font>�ߤ������ʤ�õ���Ƥߤ褦!
<hr>

[x:0115]�������̎ߤ���õ��<br />
�ʎߎ܎����Ď��ݎ��̎��������ݎ����Ŏ�������̣�����뎼�����̎ߤ򎸎؎������Ǝ����ʤ�ʤ���ळ�Ȥ��Ǥ��ޤ���

    <div align="center"> <blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">{$mall_name}���鎼�����̎ߤ�õ��</a><blink><font color="blue">&gt;&gt;</font></blink> 
    </div>

<br />

[x:0116]��������õ��<br />
���ˤʤ�܎��Ďޤ򸡺�BOX������Ƹ����Ύގ��ݤ򲡤������ǎ����ʤ��椫���Ϣ���뾦�ʤ�õ�����Ȥ��Ǥ��ޤ���<br /><br />

<!--������-->
<div align="center">
<font color="orange"><blink>��</blink> ��®õ���Ƥߤ� <blink>��</blink></font>
<form action="index.php" method="post"><input type="hidden" name="action_user_ec_item_list" value="true">	
		<input type="text" name="keyword" size="14">

		<input type="submit" name="submit" value="����">

</form>
</div>

[x:0117]�ý�����õ��<br />
{$mall_name}�Ǥώ������ʾ��ʤ亣����ξ��ʤ򽸤᤿�ý������Ŏ�����������!!<br />
�����˾��ʤ�GET�������ʤ鎺��!!


<div align="right">
<a href="#TOP">���͎ߎ�����TOP��</a>
</div>


<!--��äƤߤ褦!-->

<a name="try" id="try"></a><br />
    <font color="#FF94E1" size="3">[x:0086]</font><font color="#CC0000" size="3">��äƤߤ褦! 
    </font> 
    <hr>

[x:0162]����������ʧ��ˡ<br />
�����Ͼ��ʤˤ�äưۤʤ�ޤ���<br />
��ˤώ�����̵���ξ��ʤ⤢��ޤ��ΤǤ���ƨ���ʤ�!!<br />
    �����ˡ�ϰʲ����椫�����򤹤뤳�Ȥ��Ǥ��ޤ���<br />

    <br />


��<a href="fp.php?code=system_ec_paycredit">���ڎ��ގ��Ď����Ď޷��</a><br />
�����ݎˎގƷ��<br />
����<a href="fp.php?code=system_ec_payconveni#seven">���̎ގݎ��ڎ̎ގ�</a><br />
����<a href="fp.php?code=system_ec_payconveni#lawson">�ێ�����</a><br />
����<a href="fp.php?code=system_ec_payconveni#famima">�̎��Ў؎��ώ���</a><br />

��<a href="fp.php?code=system_ec_paycollect">������</a><br />
��<a href="fp.php?code=system_ec_paybank">��Կ���</a><br /><br />

[x:0162]�㤤ʪ�����äơ�<br />
�������ä����ʤ򸫤Ĥ������<br />

<div align="center" style="text-align:center;font-size:small;">�֤�����������</div>
�ܥ���򲡤��ơ��㤤ʪ�����˾��ʤ�����ޤ��礦��<br /><br />
	
[x:0162]�����ξ��ʤ����
�㤤ʪ���������줿�����ǤϹ����ϴ�λ���ޤ���<br />

<div align="center" style="text-align:center;font-size:small;">����ʸ���̤˿ʤ��</div>
�ܥ���򲡤��ơ�������λ���ޤ��礦��<br /><br />


<a name="register" id="register"></a>
[x:0109]���㤤ʪ���줿���ȤΤʤ����ϡ������Ͽ�򤷤ޤ��礦��<br />
�����󤷤Ƥ���ʪ����ȡ�{$config.point_name}�����ޤä��ꡢ�������Ϥ��ά���������ޤ���<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���">̵�������Ͽ�ώ�����</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>

<br />
{$mall_name}�����Ͽ����ȡ�

����ʪ���ޤ��ޤ��ڤ����ʤ���ŵ�����äѤ�
<br /><br />
[x:0085]���ݤʽ������Ϥ�����!<br />
�������ˎێ��ގ��ݤ������Ϥ��Ƥ������Ȥǎ�����ʪ���μ�֤��ʤ��ޤ���<br /><br />
[x:0085]{$config.point_name}�����ޤ�ޤ���<br />
�������ۤ˱�����{$config.point_name}�����ޤ�!<br />
    {$config.point_name}�Ϥ���ʪ�ۤγ���ˤ����ѤǤ����ꡢ{$app.mall_name}�Ύ��ʎގ����䎺�ݎÎݎ¤ʤɤˤ����Ѳ�ǽ��<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���">̵�������Ͽ�ώ�����</a><blink><font color="blue">&gt;&gt;</font></blink>

</div><br />

[x:0046]{$config.point_name}�ä�??<br />

������ʤ鎤�ێ��ގ��ݤ򤷤Ƥ��Τޤޤ���ʪ�������{$config.point_name}�����ޤ�ޤ���<br />
<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">����ʪ�ώ����פ���</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>
<br />

[x:0161]{$config.point_name}��Ȥ�<br />
������ʪ��ȯ������{$config.point_name}�ώ�����厤����ʪ��ȯ������{$config.point_name}��Ȥ����Ȥ��Ǥ��ޤ��� <br /><br />

    <font color="#FF0000">��</font>��Ź�ǻȤ� ����ʪ��{$config.point_name}��Ȥ����ώ��㤤ʪ�����˾��ʤ����쎤���Τޤ޿ʤߎ�{$config.point_name}��Ȥ������򤷤Ƥ��������� 
    {$config.point_name}�ϡ�100{$config.point_name}�ۤ�����Ѳ�ǽ�Ǥ���<br />
    <font color="#FF0000">��</font>�����{$config.point_name}�򤿤��!! �Ύߎ��ݎĎ����̎ߎ����ݎ͎ߎ��ݤʤɳƼ���ݎ͎ߎ��ݤ�»ܤ��Ƥ��ޤ�!! 
    �����ʎ����Ўݎ��ޤ򸫤Τ���������������{$config.point_name}�򤿤�ƎȢ�<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">���ä�������ʪ</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>
<div align="right">
<a href="#TOP">���͎ߎ�����TOP��</a>
</div><br />

    <a name="mail" id="mail"></a> <font color="#8431B8" size="3">[x:0105]</font><font color="#CC0000" size="3">�Ҏَώ��ޤǤ�äȤ���! 
    </font> 
    <hr>
�����ʾ����̵���Ǥ��Ϥ�����Ҏ��َ����ˎގ���<br />
    ���͎ގݎĎ����徦�ʤʤɎ��ΤäƤ����Ȏ��׎�����!���ʾ��󤬤��äѤ�! �Ҏ��٤Ǥ����Ϥ䤯���Τ����ʤ������GET<font color="#FF9933">��</font><br />
    �ɤ�ʪ�Ȥ��Ƥ�ڤ���ޤ���
�ޤ��ϲ����Ͽ���ƎȢ�<br />
<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���">̵�������Ͽ�ώ�����</a><blink><font color="blue">&gt;&gt;</font></blink>

</div>
<div align="right">
<a href="#TOP">���͎ߎ�����TOP��</a>
</div><br />
    <font color="blue" size="3">[x:0186]</font><font color="#CC0000" size="3">�����ˡ</font> 
    <hr>
����³���ϰʲ��μ��ǿ����͎ߎ����ޤޤǎ���������������³���򤪴ꤤ�������ޤ���<br /><br /> 


����ێ��ގ��ݢ�����������ѹ����������Ϥ����餫�鎣��������³����

<div align="right">
<a href="#TOP">���͎ߎ�����TOP��</a>
</div>

</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
