//
// openWYSIWYG v1.01 Copyright (c) 2006 openWebWare.com
// This copyright notice MUST stay intact for use.
//
// An open source WYSIWYG editor for use in web based applications.
// For full source code and docs, visit http://www.openwebware.com/
//
// This library is free software; you can redistribute it and/or modify 
// it under the terms of the GNU Lesser General Public License as published 
// by the Free Software Foundation; either version 2.1 of the License, or 
// (at your option) any later version.
//
// This library is distributed in the hope that it will be useful, but 
// WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
// or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public 
// License for more details.
//
// You should have received a copy of the GNU Lesser General Public License along 
// with this library; if not, write to the Free Software Foundation, Inc., 59 
// Temple Place, Suite 330, Boston, MA 02111-1307 USA 


/**
  Global Variables: Set global variables such as images directory, 
	                  WYSIWYG Height, Width, and CSS Directory.
 */

// Images Directory
imagesDir = "img_icon/";

// Popups Directory
popupsDir = "popups/";

// WYSIWYG Width and Height
wysiwygWidth = 300;
wysiwygHeight = 500;


/**
  Toolbar Settings: Set the features and buttons available in the WYSIWYG
	                  Toolbar.
 */


// List of available font types
var Fonts = new Array();
Fonts[0] = "Arial";
Fonts[1] = "Sans Serif";
Fonts[2] = "Tahoma";
Fonts[3] = "Verdana";
Fonts[4] = "Courier New";
Fonts[5] = "Georgia";
Fonts[6] = "Times New Roman";
Fonts[7] = "Impact";
Fonts[8] = "Comic Sans MS";

// List of available block formats (not in use)
var BlockFormats = new Array();
BlockFormats[0]  = "Address";
BlockFormats[1]  = "Bulleted List";
BlockFormats[2]  = "Definition";
BlockFormats[3]  = "Definition Term";
BlockFormats[4]  = "Directory List";
BlockFormats[5]  = "Formatted";
BlockFormats[6]  = "Heading 1";
BlockFormats[7]  = "Heading 2";
BlockFormats[8]  = "Heading 3";
BlockFormats[9]  = "Heading 4";
BlockFormats[10] = "Heading 5";
BlockFormats[11] = "Heading 6";
BlockFormats[12] = "Menu List";
BlockFormats[13] = "Normal";
BlockFormats[14] = "Numbered List";

// List of available font sizes
var FontSizes = new Array();
FontSizes[0]  = "1";
FontSizes[1]  = "2";
FontSizes[2]  = "3";
FontSizes[3]  = "4";
FontSizes[4]  = "5";
FontSizes[5]  = "6";
FontSizes[6]  = "7";

// Order of available commands in toolbar one
var buttonName = new Array();
buttonName[0] = "emoji";
buttonName[1]  = "blink";
buttonName[2]  = "marquee1";
buttonName[3]  = "marquee2";
buttonName[4]  = "hr";
//buttonName[0]  = "bold";
//buttonName[1]  = "italic";
//buttonName[2]  = "underline";
//buttonName[3]  = "strikethrough";
buttonName[5]  = "seperator";
//buttonName[5]  = "subscript";
//buttonName[6]  = "superscript";
//buttonName[7]  = "seperator";
buttonName[8]  = "justifyleft";
buttonName[9]  = "justifycenter";
buttonName[10] = "justifyright";
buttonName[11] = "seperator";
buttonName[12] = "unorderedlist";
buttonName[13] = "orderedlist";
//buttonName[14] = "outdent";
//buttonName[15] = "indent";

// Order of available commands in toolbar two
var buttonName2 = new Array();
buttonName2[0]  = "forecolor";
buttonName2[1]  = "backcolor";
//buttonName2[2]  = "seperator";
//buttonName2[3]  = "cut";
//buttonName2[4]  = "copy";
//buttonName2[5]  = "paste";
//buttonName2[6]  = "seperator";
//buttonName2[7]  = "undo";
//buttonName2[8]  = "redo";
buttonName2[9]  = "seperator";
//buttonName2[10]  = "inserttable";
buttonName2[11]  = "insertimage";
buttonName2[12]  = "createlink";
buttonName2[13]  = "seperator";
buttonName2[14]  = "viewSource";
buttonName2[15]  = "seperator";
//buttonName2[16]  = "help";

// List of available actions and their respective ID and images
var ToolbarList = {
//	Name			buttonID		buttonTitle		buttonImage				buttonImageRollover
	"emoji":		['Emoji',		'絵文字',			imagesDir + 'emoji.gif',			imagesDir + 'emoji_on.gif'],
	"blink":			['Blink',			'点滅文字',		imagesDir + 'blink.gif',			imagesDir + 'blink_on.gif'],
	"marquee1":		['Marquee1',		'流れ文字',		imagesDir + 'marquee1.gif',		imagesDir + 'marquee1_on.gif'],
	"marquee2":		['Marquee2',		'往復文字',		imagesDir + 'marquee2.gif',		imagesDir + 'marquee2_on.gif'],
//	"bold":			['Bold',			'太字',			imagesDir + 'bold.gif',			imagesDir + 'bold_on.gif'],
//	"italic":			['Italic',			'斜体',			imagesDir + 'italics.gif',			imagesDir + 'italics_on.gif'],
//	"underline":		['Underline',		'下線',			imagesDir + 'underline.gif',		imagesDir + 'underline_on.gif'],
//	"strikethrough":		['Strikethrough',		'Strikethrough',		imagesDir + 'strikethrough.gif',		imagesDir + 'strikethrough_on.gif'],
	"seperator":		['',			'',			imagesDir + 'seperator.gif',		imagesDir + 'seperator.gif'],
//	"subscript":		['Subscript',		'Subscript',		imagesDir + 'subscript.gif',		imagesDir + 'subscript_on.gif'],
//	"superscript":		['Superscript',		'Superscript',		imagesDir + 'superscript.gif',		imagesDir + 'superscript_on.gif'],
	"justifyleft":		['Justifyleft',		'左寄せ',			imagesDir + 'justify_left.gif',		imagesDir + 'justify_left_on.gif'],
	"justifycenter":		['Justifycenter',		'中央揃え',		imagesDir + 'justify_center.gif',		imagesDir + 'justify_center_on.gif'],
	"justifyright":		['Justifyright',		'右寄せ',			imagesDir + 'justify_right.gif',		imagesDir + 'justify_right_on.gif'],
	"unorderedlist":		['InsertUnorderedList',	'リスト',			imagesDir + 'list_unordered.gif',		imagesDir + 'list_unordered_on.gif'],
	"orderedlist":		['InsertOrderedList',	'番号リスト',		imagesDir + 'list_ordered.gif',		imagesDir + 'list_ordered_on.gif'],
//	"outdent":		['Outdent',		'Outdent',		imagesDir + 'indent_left.gif',		imagesDir + 'indent_left_on.gif'],
//	"indent":		['Indent',		'Indent',		imagesDir + 'indent_right.gif',		imagesDir + 'indent_right_on.gif'],
//	"cut":			['Cut',			'切取り',			imagesDir + 'cut.gif',			imagesDir + 'cut_on.gif'],
//	"copy":			['Copy',			'コピー',			imagesDir + 'copy.gif',			imagesDir + 'copy_on.gif'],
//	"paste":		['Paste',		'貼付け',			imagesDir + 'paste.gif',			imagesDir + 'paste_on.gif'],
	"forecolor":		['ForeColor',		'文字色',			imagesDir + 'forecolor.gif',		imagesDir + 'forecolor_on.gif'],
	"backcolor":		['BackColor',		'背景色',			imagesDir + 'backcolor.gif',		imagesDir + 'backcolor_on.gif'],
	"undo":			['Undo',			'元に戻す',		imagesDir + 'undo.gif',			imagesDir + 'undo_on.gif'],
	"redo":			['Redo',			'やり直し',		imagesDir + 'redo.gif',			imagesDir + 'redo_on.gif'],
//	"inserttable":		['InsertTable',		'InsertTable',		imagesDir + 'insert_table.gif',		imagesDir + 'insert_table_on.gif'],
	"insertimage":		['InsertImage',		'画像挿入',		imagesDir + 'insert_picture.gif',		imagesDir + 'insert_picture_on.gif'],
	"createlink":		['CreateLink',		'ハイパーリンク',		imagesDir + 'insert_hyperlink.gif',	imagesDir + 'insert_hyperlink_on.gif'],
	"viewSource":		['ViewSource',		'ソースコード',		imagesDir + 'view_source.gif',		imagesDir + 'view_source_on.gif'],
	"viewText":		['ViewText',		'編集モード',		imagesDir + 'view_text.gif',		imagesDir + 'view_text_on.gif'],
//	"help":			['Help',			'Help',			imagesDir + 'help.gif',			imagesDir + 'help_on.gif'],
//	"selectfont":		['SelectFont',		'SelectFont',		imagesDir + 'select_font.gif',		imagesDir + 'select_font_on.gif'],
	"selectsize":		['SelectSize',		'サイズ',			imagesDir + 'select_size.gif',		imagesDir + 'select_size_on.gif'],
	"hr":			['HR',			'水平線',			imagesDir + 'hr.gif',			imagesDir + 'hr_on.gif']
};



/**
 * Function: insertAdjacentHTML(), insertAdjacentText() and insertAdjacentElement()
 * Description: Emulates insertAdjacentHTML(), insertAdjacentText() and 
	              insertAdjacentElement() three functions so they work with 
								Netscape 6/Mozilla
  Notes       : by Thor Larholm me@jscript.dk
 */
if(typeof HTMLElement!="undefined" && !HTMLElement.prototype.insertAdjacentElement){
	HTMLElement.prototype.insertAdjacentElement = function(where,parsedNode)
	{
		switch (where)
		{
			case 'beforeBegin':
				this.parentNode.insertBefore(parsedNode,this)
				break;
			case 'afterBegin':
				this.insertBefore(parsedNode,this.firstChild);
				break;
			case 'beforeEnd':
				this.appendChild(parsedNode);
				break;
			case 'afterEnd':
				if (this.nextSibling) this.parentNode.insertBefore(parsedNode,this.nextSibling);
				else this.parentNode.appendChild(parsedNode);
				break;
		}
	}
	
	HTMLElement.prototype.insertAdjacentHTML = function(where,htmlStr)
	{
		var r = this.ownerDocument.createRange();
		r.setStartBefore(this);
		var parsedHTML = r.createContextualFragment(htmlStr);
		this.insertAdjacentElement(where,parsedHTML)
	}
	
	HTMLElement.prototype.insertAdjacentText = function(where,txtStr)
	{
		var parsedText = document.createTextNode(txtStr)
		this.insertAdjacentElement(where,parsedText)
	}
};


// Create viewTextMode global variable and set to 0
// enabling all toolbar commands while in HTML mode
viewTextMode = 0;



/**
 * Function: generate_wysiwyg()
 * Description: replace textarea with wysiwyg editor
 * Usage: generate_wysiwyg("textarea_id");
 * Arguments: textarea_id - ID of textarea to replace
 */
function generate_wysiwyg(textareaID) {
 
  	// Hide the textarea 
  	// テキストエリアを隠す
	document.getElementById(textareaID).style.display = 'none'; 
	
	// Pass the textareaID to the "n" variable.
	var n = textareaID;
	
	// Toolbars width is 2 pixels wider than the wysiwygs
	toolbarWidth = parseFloat(wysiwygWidth) + 2;
	inlineWidth = parseFloat(wysiwygWidth) - 20;
	
	// Generate WYSIWYG toolbar one
	// 1段目のツールバー生成
	var toolbar;
	toolbar =  '<div style="float:left;margin-right:10px;padding-right:10px;"><table cellpadding="0" cellspacing="0" border="0" class="toolbar1" style="width:' + toolbarWidth + 'px;"><tr><td style="width: 6px;"><img src="' +imagesDir+ 'seperator2.gif" alt="" hspace="3"></td>';
	
	// Create IDs for inserting Font Type and Size drop downs
	// 1段目のプルダウン生成
//	toolbar += '<td style="width: 90px;"><span id="FontSelect' + n + '"></span></td>';
	toolbar += '<td style="width: 60px;"><span id="FontSizes'  + n + '"></span></td>';
	
	// Output all command buttons that belong to toolbar one
	// 1段目のボタン生成
	for (var i = 0; i <= buttonName.length;) { 
		if (buttonName[i]) {
			var buttonObj			= ToolbarList[buttonName[i]];
			var buttonID			= buttonObj[0];
			var buttonTitle			= buttonObj[1];
			var buttonImage		= buttonObj[2];
			var buttonImageRollover	= buttonObj[3];
			
			if (buttonName[i] == "seperator") {
				toolbar += '<td style="width: 12px;" align="center"><img src="' +buttonImage+ '" border=0 unselectable="on" width="2" height="18" hspace="2" unselectable="on"></td>';
			}
			else {
				toolbar += '<td style="width: 22px;"><img src="' +buttonImage+ '" border=0 unselectable="on" title="' +buttonTitle+ '" id="' +buttonID+ '" class="button" onClick="formatText(this.id,\'' + n + '\');" onmouseover="if(className==\'button\'){className=\'buttonOver\'}; this.src=\'' + buttonImageRollover + '\';" onmouseout="if(className==\'buttonOver\'){className=\'button\'}; this.src=\'' + buttonImage + '\';" unselectable="on" width="20" height="20"></td>';
			}
		}
		i++;
	}
	
	toolbar += '<td>&nbsp;</td></tr></table>';  
	
	// Generate WYSIWYG toolbar two
	// 2段目のツールバー生成
	var toolbar2;
	toolbar2 = '<table cellpadding="0" cellspacing="0" border="0" class="toolbar2" style="width:' + toolbarWidth + 'px;"><tr><td style="width: 6px;"><img src="' +imagesDir+ 'seperator2.gif" alt="" hspace="3"></td>';
	
	// Output all command buttons that belong to toolbar two
	// 2段目のボタン生成
	for (var j = 0; j <= buttonName2.length;) {
		if (buttonName2[j]) {
			var buttonObj			= ToolbarList[buttonName2[j]];
			var buttonID			= buttonObj[0];
			var buttonTitle			= buttonObj[1];
			var buttonImage		= buttonObj[2];
			var buttonImageRollover	= buttonObj[3];
		  	
			if (buttonName2[j] == "seperator") {
				toolbar2 += '<td style="width: 12px;" align="center"><img src="' +buttonImage+ '" border=0 unselectable="on" width="2" height="18" hspace="2" unselectable="on"></td>';
			}
			else if (buttonName2[j] == "viewSource"){
				toolbar2 += '<td style="width: 22px;">';
				toolbar2 += '<span id="HTMLMode' + n + '"><img src="'  +buttonImage+  '" border=0 unselectable="on" title="' +buttonTitle+ '" id="' +buttonID+ '" class="button" onClick="formatText(this.id,\'' + n + '\');" onmouseover="if(className==\'button\'){className=\'buttonOver\'}; this.src=\'' +buttonImageRollover+ '\';" onmouseout="if(className==\'buttonOver\'){className=\'button\'}; this.src=\'' + buttonImage + '\';" unselectable="on"  width="20" height="20"></span>';
				toolbar2 += '<span id="textMode' + n + '"><img src="' +imagesDir+ 'view_text.gif" border=0 unselectable="on" title="viewText"          id="ViewText"       class="button" onClick="formatText(this.id,\'' + n + '\');" onmouseover="if(className==\'button\'){className=\'buttonOver\'}; this.src=\'' +imagesDir+ 'view_text_on.gif\';"    onmouseout="if(className==\'buttonOver\'){className=\'button\'}; this.src=\'' +imagesDir+ 'view_text.gif\';" unselectable="on"  width="20" height="20"></span>';
				toolbar2 += '</td>';
			}
			else {
				toolbar2 += '<td style="width: 22px;"><img src="' +buttonImage+ '" border=0 unselectable="on" title="' +buttonTitle+ '" id="' +buttonID+ '" class="button" onClick="formatText(this.id,\'' + n + '\');" onmouseover="if(className==\'button\'){className=\'buttonOver\'}; this.src=\'' +buttonImageRollover+ '\';" onmouseout="if(className==\'buttonOver\'){className=\'button\'}; this.src=\'' + buttonImage + '\';" unselectable="on" width="20" height="20"></td>';
			}
		}
		j++;
	}
	
	toolbar2 += '<td>&nbsp;</td></tr></table>';  
	
 	
	// Create iframe which will be used for rich text editing
	var iframe = '<table cellpadding="0" cellspacing="0" border="0" style="width:' + wysiwygWidth + 'px; height:' + wysiwygHeight + 'px;border:none;"><tr><td valign="top" style="padding:0;border:none">\n'
		+ '<iframe frameborder="0" id="wysiwyg' + n + '" style="width:' + inlineWidth + 'px; height:' + wysiwygHeight + 'px;border: 1px solid #666666;padding:0;margin:0px;"></iframe>\n'
		+ '</td></tr></table></div>\n';
	
	// Insert after the textArea both toolbar one and two
	document.getElementById(n).insertAdjacentHTML("afterEnd", toolbar + toolbar2 + iframe);
	
	// Insert the Font Type and Size drop downs into the toolbar
//	outputFontSelect(n);
	outputFontSizes(n); 
	
	// Hide the dynamic drop down lists for the Font Types and Sizes
//	hideFonts(n);
	hideFontSizes(n);
	
	// Hide the "Text Mode" button
	document.getElementById("textMode" + n).style.display = 'none'; 
	
	// Give the iframe the global wysiwyg height and width
	document.getElementById("wysiwyg" + n).style.height = wysiwygHeight + "px";
	document.getElementById("wysiwyg" + n).style.width = wysiwygWidth + "px";
	
	// Pass the textarea's existing text over to the content variable
	// テキストエリアのコンテンツを取得する
	var content = document.getElementById(n).value;
	content = emojiEncode(content);
	content = tagReplace(content);
	
	var doc = document.getElementById("wysiwyg" + n).contentWindow.document;
	
	// Write the textarea's content into the iframe
	doc.open();
	doc.writeln('<HTML>');
	doc.writeln('<HEAD>');
	doc.writeln('<META content="text/css" http-equiv="Content-Style-Type"/>');
	doc.writeln('</HEAD>');
	// コンテンツにBODYタグがあるかどうかチェック
	var code = new RegExp('<BODY', 'igm');
	if(!content.match(code)){
		content = '<BODY bgcolor="#ffffff">' + content + '</BODY>';
	}
	doc.writeln(content);
	doc.writeln('</HTML>');
	doc.close();
	
	// Make the iframe editable in both Mozilla and IE
	doc.body.style.padding = 0;
	doc.body.style.margin = 0;
//	doc.body.style.lineHeight = 1;
//	doc.body.style.display = block;
	doc.body.style.fontFamily = 'MS P ゴシック';
	doc.body.style.fontSize = '14px';
	doc.body.contentEditable = true;
	doc.designMode = "on";
	doc.execCommand("styleWithCSS", false, false);
	
	// Update the textarea with content in WYSIWYG when user submits form
	// サブミットボタン押下時のコンテンツ同期
	// IE7で正常に動作しないため、コンテンツ同期はHTMLに記載すること
	//$j('form').submit(function(){updateTextArea(n);alert(1);});
/*
	var browserName = navigator.appName;
	if (browserName == "Microsoft Internet Explorer") {
		for (var idx=0; idx < document.forms.length; idx++) {
			document.forms[idx].attachEvent('onsubmit', function() { updateTextArea(n); });
		}
	}
	else {
		for (var idx=0; idx < document.forms.length; idx++) {
			document.forms[idx].addEventListener('submit',function OnSumbmit() { updateTextArea(n); }, true);
		}
	}
*/
	// keyupリスナーでHTMLを監視
//	$j(document.getElementById("wysiwyg" + n).contentWindow).keyup(function(){
//alert(2);
//		this.document.body.innerHTML = tagReplace(this.document.body.innerHTML);
//	}).keyup();
};

function tagReplace(text)
{
	var RegExpCode = [
		// Pタグ、DIVタグ、&nbsp;は削除する
		['<(.*?)P>|<DIV>|</DIV>|&nbsp;', ''],
		// 画像はsrc属性のみ保持。そのほ他の属性はデコメール内には反映されない。今のところ、FF系、IE系ともにsrc属性に「"」がつく。
		['<IMG.*?src="(.*?)".*?>', '<IMG src="$1">'],
		// MARQUEEはbehavior属性のみ保持。FF系では「"」がつくが、IE系では「"」がつかないので注意。値は「alternate」のみだが、念のため「scroll」も追加。
//		// <MARQUEE>と<MARQUEE behavior="alternate">の場合があるので一回で２パターンを整形する。（NG）
//		['<MARQUEE.*?(\s?)(behavior=)?("?)([alternate|scroll]?)("?).*?>', '<MARQUEE$1$2$3$4$5>'],
		// altenateのパターンを整形
		['<MARQUEE.*?behavior="?([alternate|scroll]+)"?.*?>', '<MARQUEE behavior="$1">'],
		// scrollのパターンを整形。FF系は閲覧不可なのでサイズ変更を行えず、IE系の余分な情報はstyle属性しかつかないので限定的に消去
		['<MARQUEE.*?style=".*?".*?>', '<MARQUEE>'],
		// DIVはarign属性のみ保持。FF系では「"」がつくが、IE系では「"」がつかないので注意。
		['<DIV.*?arign="?([left|center|right])"?.*?>', '<DIV arign="$1">'],
		// HRは色のみ保持。FF系ではcolor属性に「"」がつくが、IE系ではcolor属性に「"」がつかないので注意。色情報がない場合は考慮しない。
		['<HR.*?color="?#([a-zA-Z0-9]+)"?.*?>', '<HR color="#$1">'],

		['<BR.*?>', '<BR>']

//		['<STRONG>(.*?)<.STRONG>', '<strong>$1</strong>'],
//		['<U>(.*?)</U>', '<span style="text-decoration: underline;">$1</span>'],
//		['<span style="font-weight: bold;">(.*?)</span>', '<strong>$1</strong>'],
//		['<span styl.*"font-weight: normal;">(.*?)</span>', '$1'],
//		['<FONT color="?#(.*?)"?>(.*?)</FONT>', '<span style="color: #$1">$2</span>'],
//		['<SPAN class="Apple-style-span" style="(.*?)">(.*?)</SPAN>', '<span style="$1">$2</span>'],
//		['<(.*?) style="?.*?"?(.*?)>', '<$1 $2>'],
//		['<(.*?) height="?.*?"?(.*?)>', '<$1 $2>'],
//		['<(.*?) width="?.*?"?(.*?)>', '<$1 $2>'],
	];
	RegExpCode.each(function(e){
		var code = new RegExp(e[0], 'igm');
		text = text.replace(code, e[1]);
//alert(RegExp.$3);
//alert(RegExp.lastMatch);
	});
//alert(1);
	return text;
};

/**
 * Function: formatText()
 * Description: replace textarea with wysiwyg editor
 * Usage: formatText(id, n, selected);
 * Arguments: id - The execCommand (e.g. Bold)
                n  - The editor identifier that the command 
								     affects (the textarea's ID)
                selected - The selected value when applicable (e.g. Arial)
 */
function formatText(id, n, selected)
{
	// When user clicks toolbar button make sure it always targets its respective WYSIWYG
	document.getElementById("wysiwyg" + n).contentWindow.focus();
	
	// Check if in Text Mode and disabled button was clicked
//	if (viewTextMode == 1 && disabled_id == 1) {
	if (viewTextMode == 1 && id != "ViewText") {
		alert ("現在ソースコードモードのため、この機能は使用できません。編集モードへ移行してください。");
	}
	else {
		// MARQUEE1
		if (id == "Marquee1") {
			surroundHTML('<MARQUEE behavior="scroll">', '</MARQUEE>', n);
		}
		// MARQUEE2
		else if (id == "Marquee2") {
			surroundHTML('<MARQUEE behavior="alternate">', '</MARQUEE>', n);
		}
		// BLINK
		else if (id == "Blink") {
			surroundHTML('<BLINK>', '</BLINK>', n);
		}
		// Emoji
		else if (id == "Emoji") {
			window.open('?action_admin_emojip=true&wysiwyg=' + n + '&command=' + id + '&hoge','popup','location=0,status=0,scrollbars=0,width=400,height=400');
		}
		// FontSize
		else if (id == "FontSize") {
			document.getElementById("wysiwyg" + n).contentWindow.document.execCommand("FontSize", false, selected);
		}
		// FontName
		else if (id == "FontName") {
			document.getElementById("wysiwyg" + n).contentWindow.document.execCommand("FontName", false, selected);
		}
		// ForeColor and BackColor
		else if (id == 'ForeColor' || id == 'BackColor' || id == 'HR') {
			var w = screen.availWidth;
			var h = screen.availHeight;
			var popW = 210, popH = 165;
			var leftPos = (w-popW)/2, topPos = (h-popH)/2;
			if(id == 'HR'){
				var currentColor = "000000";
			}else{
				var currentColor = _dec_to_rgb(document.getElementById("wysiwyg" + n).contentWindow.document.queryCommandValue(id));
			}
			window.open(popupsDir + 'select_color.html?color=' + currentColor + '&command=' + id + '&wysiwyg=' + n,'popup','location=0,status=0,scrollbars=0,width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);
		}
		// InsertImage
		else if (id == "InsertImage") {
			window.open(popupsDir + 'insert_image.html?wysiwyg=' + n,'popup','location=0,status=0,scrollbars=0,resizable=0,width=400,height=100');
		}
		// InsertTable
		else if (id == "InsertTable") {
			window.open(popupsDir + 'create_table.html?wysiwyg=' + n,'popup','location=0,status=0,scrollbars=0,resizable=0,width=400,height=360');
		}
		// CreateLink
		else if (id == "CreateLink") {
			window.open(popupsDir + 'insert_hyperlink.html?wysiwyg=' + n,'popup','location=0,status=0,scrollbars=0,resizable=0,width=300,height=160');
		}
		// ViewSource
		else if (id == "ViewSource") {
			viewSource(n);
		}
		// ViewText
		else if (id == "ViewText") {
			viewText(n);
		}
		// Help
		else if (id == "Help") {
			window.open(popupsDir + 'about.html','popup','location=0,status=0,scrollbars=0,resizable=0,width=400,height=330');
		}
		// Every other command
		else {
			document.getElementById("wysiwyg" + n).contentWindow.document.execCommand(id, false, null);
		}
	}
};

/**
 * 選択テキストの存在領域を取得する
 */
function getAreaRange(obj)
{
	var browserName = navigator.appName;
	var pos = new Object();
	// IEの場合
	if (browserName == "Microsoft Internet Explorer") {
		var range = obj.selection.createRange();
		var clone = range.duplicate();
		
		clone.moveToElementText(obj);
		clone.setEndPoint( 'EndToEnd', range );
		
		pos.start = clone.text.length - range.text.length;
		pos.end = clone.text.length - range.text.length + range.text.length;
	}
	// その他ブラウザで選択されたテキストがある場合
	else if(obj.getSelection()) {
		pos.start = obj.selectionStart;
		pos.end = obj.selectionEnd;
	}
	return pos;
}

/**
 * 選択されたテキストをタグで囲む
 */
function surroundHTML(tag_start, tag_end, n)
{
//	var getDocument = document.getElementById("wysiwyg" + n).contentWindow.document;
//	var html = getDocument.body.innerHTML;
//	html = emojiDecode(html);
	
	var browserName = navigator.appName;
	var html = "";
	// IEの場合
	if (browserName == "Microsoft Internet Explorer") {
		html = document.getElementById('wysiwyg' + n).contentWindow.document.selection.createRange().text;
	}
	else{
		html = document.getElementById('wysiwyg' + n).contentWindow.getSelection();
	}
//	html = emojiDecode(html);
	insertHTML(tag_start + html + tag_end, n);
//	getDocument.body.innerHTML = emojiEncode(html);
}

/**
 * Function: insertHTML()
 * Description: insert HTML into WYSIWYG in rich text
 * Usage: insertHTML(<b>hello</b>, "textareaID")
 * Arguments: html - The HTML being inserted (e.g. <b>hello</b>)
                n  - The editor identifier that the HTML 
								     will be inserted into (the textarea's ID)
 */
function insertHTML(html, n)
{
	var browserName = navigator.appName;
	if (browserName == "Microsoft Internet Explorer") {
		document.getElementById('wysiwyg' + n).contentWindow.document.selection.createRange().pasteHTML(html);
	}
	else {
		var div = document.getElementById('wysiwyg' + n).contentWindow.document.createElement("div");
		div.innerHTML = html;
		var node = insertNodeAtSelection(div, n);
	}
	// HTMLタグ更新
	var getDocument = document.getElementById('wysiwyg' + n).contentWindow.document;
	getDocument.body.innerHTML = tagReplace(getDocument.body.innerHTML);
}


/**
 * Function: insertNodeAtSelection()
 * Description: insert HTML into WYSIWYG in rich text (mozilla)
 * Usage: insertNodeAtSelection(insertNode, n)
 * Arguments: insertNode - The HTML being inserted (must be innerHTML 
	                           inserted within a div element)
                n          - The editor identifier that the HTML will be 
								             inserted into (the textarea's ID)
 */
function insertNodeAtSelection(insertNode, n)
{
	// get current selection
	var sel = document.getElementById('wysiwyg' + n).contentWindow.getSelection();
	
	// get the first range of the selection
	// (there's almost always only one range)
	var range = sel.getRangeAt(0);
	
	// deselect everything
	sel.removeAllRanges();
	
	// remove content of current selection from document
	range.deleteContents();
	
	// get location of current selection
	var container = range.startContainer;
	var pos = range.startOffset;
	
	// make a new range for the new selection
	range=document.createRange();
	
	if (container.nodeType==3 && insertNode.nodeType==3) {
		// if we insert text in a textnode, do optimized insertion
		container.insertData(pos, insertNode.nodeValue);
		
		// put cursor after inserted text
		range.setEnd(container, pos+insertNode.length);
		range.setStart(container, pos+insertNode.length);
	} 
	else {
		var afterNode;
		if (container.nodeType==3) {
			// when inserting into a textnode
			// we create 2 new textnodes
			// and put the insertNode in between
			var textNode = container;
			container = textNode.parentNode;
			var text = textNode.nodeValue;
			// text before the split
			var textBefore = text.substr(0,pos);
			// text after the split
			var textAfter = text.substr(pos);
			var beforeNode = document.createTextNode(textBefore);
			afterNode = document.createTextNode(textAfter);
			// insert the 3 new nodes before the old one
			container.insertBefore(afterNode, textNode);
			container.insertBefore(insertNode, afterNode);
			container.insertBefore(beforeNode, insertNode);
			// remove the old node
			container.removeChild(textNode);
		} 
		else {
			// else simply insert the node
			afterNode = container.childNodes[pos];
			container.insertBefore(insertNode, afterNode);
		}
		range.setEnd(afterNode, 0);
		range.setStart(afterNode, 0);
	}
	sel.addRange(range);
};


/**
 * Function: _dec_to_rgb
 * Description: convert a decimal color value to rgb hexadecimal
 * Usage: var hex = _dec_to_rgb('65535');   // returns FFFF00
 * Arguments: value   - dec value
 */
function _dec_to_rgb(value) {
	var hex_string = "";
	for (var hexpair = 0; hexpair < 3; hexpair++) {
		var myByte = value & 0xFF;            // get low byte
		value >>= 8;                          // drop low byte
		var nybble2 = myByte & 0x0F;          // get low nybble (4 bits)
		var nybble1 = (myByte >> 4) & 0x0F;   // get high nybble
		hex_string += nybble1.toString(16);   // convert nybble to hex
		hex_string += nybble2.toString(16);   // convert nybble to hex
	}
	return hex_string.toUpperCase();
};

/**
 * Function: outputFontSelect()
 * Description: creates the Font Select drop down and inserts it into 
	              the toolbar
 * Usage: outputFontSelect(n)
 * Arguments: n   - The editor identifier that the Font Select will update
	                    when making font changes (the textarea's ID)
 */
function outputFontSelect(n)
{
	var FontSelectObj	= ToolbarList['selectfont'];
	var FontSelect		= FontSelectObj[2];
	var FontSelectOn	= FontSelectObj[3];
	
	Fonts.sort();
	var FontSelectDropDown = new Array;
	FontSelectDropDown[n] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td onMouseOver="document.getElementById(\'selectFont' + n + '\').src=\'' + FontSelectOn + '\';" onMouseOut="document.getElementById(\'selectFont' + n + '\').src=\'' + FontSelect + '\';"><img src="' + FontSelect + '" id="selectFont' + n + '" width="85" height="20" onClick="showFonts(\'' + n + '\');" unselectable="on"><br>';
	FontSelectDropDown[n] += '<span id="Fonts' + n + '" class="dropdown" style="width: 145px;">';
	
	for (var i = 0; i <= Fonts.length;) {
		if (Fonts[i]) {
			FontSelectDropDown[n] += '<button type="button" onClick="formatText(\'FontName\',\'' + n + '\',\'' + Fonts[i] + '\')\; hideFonts(\'' + n + '\');" onMouseOver="this.className=\'mouseOver\'" onMouseOut="this.className=\'mouseOut\'" class="mouseOut" style="width: 120px;"><table cellpadding="0" cellspacing="0" border="0"><tr><td align="left" style="font-family:' + Fonts[i] + '; font-size: 12px;">' + Fonts[i] + '</td></tr></table></button><br>';
		}
		i++;
	}
	FontSelectDropDown[n] += '</span></td></tr></table>';
	document.getElementById('FontSelect' + n).insertAdjacentHTML("afterBegin", FontSelectDropDown[n]);
};



/**
 * Function: outputFontSizes()
 * Description: creates the Font Sizes drop down and inserts it into 
 *	              the toolbar
 * Usage: outputFontSelect(n)
 * Arguments: n   - The editor identifier that the Font Sizes will update
 *	                    when making font changes (the textarea's ID)
 */
function outputFontSizes(n)
{
	var FontSizeObj		= ToolbarList['selectsize'];
	var FontSize		= FontSizeObj[2];
	var FontSizeOn		= FontSizeObj[3];
	
	FontSizes.sort();
	var FontSizesDropDown = new Array;
	FontSizesDropDown[n] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td onMouseOver="document.getElementById(\'selectSize' + n + '\').src=\'' + FontSizeOn + '\';" onMouseOut="document.getElementById(\'selectSize' + n + '\').src=\'' + FontSize + '\';"><img src="' + FontSize + '" id="selectSize' + n + '" width="49" height="20" onClick="showFontSizes(\'' + n + '\');" unselectable="on"><br>';
	FontSizesDropDown[n] += '<span id="Sizes' + n + '" class="dropdown" style="width: 170px;">';
	
	for (var i = 0; i <= FontSizes.length;) {
		if (FontSizes[i]) {
			FontSizesDropDown[n] += '<button type="button" onClick="formatText(\'FontSize\',\'' + n + '\',\'' + FontSizes[i] + '\')\;hideFontSizes(\'' + n + '\');" onMouseOver="this.className=\'mouseOver\'" onMouseOut="this.className=\'mouseOut\'" class="mouseOut" style="width: 145px;"><table cellpadding="0" cellspacing="0" border="0"><tr><td align="left" style="font-family: arial, verdana, helvetica;"><font size="' + FontSizes[i] + '">サイズ' + FontSizes[i] + '</font></td></tr></table></button><br>';	
		}
		i++;
	}
	FontSizesDropDown[n] += '</span></td></tr></table>';
	document.getElementById('FontSizes' + n).insertAdjacentHTML("afterBegin", FontSizesDropDown[n]);
};



/**
 * Function: hideFonts()
 * Description: Hides the list of font names in the font select drop down
 * Usage: hideFonts(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function hideFonts(n) {
	document.getElementById('Fonts' + n).style.display = 'none'; 
};



/**
 * Function: hideFontSizes()
 * Description: Hides the list of font sizes in the font sizes drop down
 * Usage: hideFontSizes(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function hideFontSizes(n) {
	document.getElementById('Sizes' + n).style.display = 'none'; 
};



/**
 * Function: showFonts()
 * Description: Shows the list of font names in the font select drop down
 * Usage: showFonts(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function showFonts(n)
{
	if (document.getElementById('Fonts' + n).style.display == 'block') {
		document.getElementById('Fonts' + n).style.display = 'none';
	}
	else {
		document.getElementById('Fonts' + n).style.display = 'block'; 
		document.getElementById('Fonts' + n).style.position = 'absolute';
	}
};



/**
 * Function: showFontSizes()
 * Description: Shows the list of font sizes in the font sizes drop down
 * Usage: showFonts(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function showFontSizes(n)
{
	if (document.getElementById('Sizes' + n).style.display == 'block') {
		document.getElementById('Sizes' + n).style.display = 'none';
	}
	else {
		document.getElementById('Sizes' + n).style.display = 'block'; 
		document.getElementById('Sizes' + n).style.position = 'absolute';
	}
};


/**
 * Function: viewSource()
 * Description:
 *	Shows the HTML source code generated by the WYSIWYG editor
 *	ソースコードを表示させる
 * Usage: showFonts(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function viewSource(n)
{
	var getDocument = document.getElementById("wysiwyg" + n).contentWindow.document;
	var browserName = navigator.appName;
	
	// View Source for IE
	if (browserName == "Microsoft Internet Explorer") {
		var bg = getDocument.body.bgColor;
		var iHTML = '<BODY bgcolor="' + bg + '">' + getDocument.body.innerHTML + '</BODY>';
		// タグ変換
		iHTML = tagReplace(iHTML);
		// 絵文字変換（デコード）
		iHTML = emojiDecode(iHTML);
		getDocument.body.innerText = iHTML;
	}
	
	// View Source for Mozilla/Netscape
	else {
		var bg = getDocument.body.bgColor;
		var html = '<BODY bgcolor="' + bg + '">' + getDocument.body.innerHTML + '</BODY>';
		// タグ変換
		html = tagReplace(html);
		// 絵文字変換（デコード）
		html = emojiDecode(html);
		html = document.createTextNode(html);
		getDocument.body.innerHTML = "";
		getDocument.body.appendChild(html);
	}
	
	// Hide the HTML Mode button and show the Text Mode button
	document.getElementById('HTMLMode' + n).style.display = 'none';
	document.getElementById('textMode' + n).style.display = 'block';
	
	// set the font values for displaying HTML source
	getDocument.body.style.fontColor = "#000000";
	getDocument.body.style.fontSize = "12px";
	getDocument.body.style.fontFamily = "Courier New"; 
	getDocument.body.bgColor = "#ffffff";
	
	viewTextMode = 1;
};


/**
 * Function: viewText()
 * Description:
 *	Shows the HTML source code generated by the WYSIWYG editor
 *	編集可能なリッチテキストを表示させる
 * Usage: showFonts(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function viewText(n)
{
	var getDocument = document.getElementById("wysiwyg" + n).contentWindow.document;
	var browserName = navigator.appName;
	
	// View Text for IE
	if (browserName == "Microsoft Internet Explorer") {
		var text = getDocument.body.innerText;
		// 絵文字変換（エンコード）
		text = emojiEncode(text);
		// タグ変換
		text = tagReplace(text);
		getDocument.body.innerHTML = text;
	}
	// View Text for Mozilla/Netscape
	else {
		var _text = getDocument.body.ownerDocument.createRange();
		_text.selectNodeContents(getDocument.body);
		var text = _text.toString();
		// 絵文字変換（エンコード）
		text = emojiEncode(text);
		// タグ変換
		text = tagReplace(text);
		getDocument.body.innerHTML = text;
	}
	
	// Hide the Text Mode button and show the HTML Mode button
	document.getElementById('textMode' + n).style.display = 'none';
	document.getElementById('HTMLMode' + n).style.display = 'block';
	
	// reset the font values
	// 表示用色をリセット
	getDocument.body.style.fontColor = "";
	getDocument.body.style.fontSize = "";
	getDocument.body.style.fontFamily = "";
	// 背景色を元に戻す
	var code = new RegExp('<BODY bgcolor="(.*?)">', 'igm');
	bgcolor = text.match(code);
	getDocument.body.bgColor = RegExp.$1;
	
	// ソースコードモード終了
	viewTextMode = 0;
};



/**
 * Function: updateTextArea()
 * Description:
 *	Updates the text area value with the HTML source of the WYSIWYG
 *	テキストエリアのフォーム値を最新バージョンに更新する
 * Usage: updateTextArea(n)
 * Arguments: n   - The editor identifier (the textarea's ID)
 */
function updateTextArea(n)
{
	// iFrameドキュメントを取得
	var getDocument = document.getElementById("wysiwyg" + n).contentWindow.document;
	// 背景色を取得
	var bgcolor = getDocument.body.bgColor;
	// 背景色を付け足す
	var html = '<BODY bgcolor="' + bgcolor + '">' + getDocument.body.innerHTML + '</BODY>';
	// 絵文字変換（デコード）
	html = emojiDecode(html);
	// テキストエリアの値を更新
	document.getElementById(n).value = html;
};