<?php
//
//	php -f /arc/scr/imacrosf.php
//	cp ~/nq/arc/imacros/spanking_* ~/iMacros/Macros/
//

//----------------------------------------------------
//
//			SET FILENAMES
//
//----------------------------------------------------
$pornBBFilename=		"";
$philiaFilename=		"/root/iMacros/Macros/Latex/philia_latex_sex.iim";
$suzyFilename=			"";

$iMacrosFilename=		"/root/iMacros/Macros/Latex/latex_sex.iim";
//$uniMacrosFilename=		"/arc/imacros/spanking_sex_unlimited.iim";

$sourceFilename=		"latex_sex.csv";

$limitedTime=           "3821";

//----------------------------------------------------
//
//			SET URLS
//
//----------------------------------------------------
$pornbb=				"http://fetish.pornbb.org/posting.php?mode=reply&t=1167930";
$forumophilia=			"http://www.forumophilia.com/posting.php?mode=reply&t=317649";
$planetsuzy_org=		"";

$vamateur=				"";
$myslavegirl=			"";
$bdsm_zone_com=			"http://bdsm-zone.com/newreply.php?do=newreply&noquote=1&p=7226634";
$pornw_org=				"http://www.porn-w.org/posting.php?mode=reply&f=2&t=7110097";
$fritchy_com=			"";
$intporn_org=			"http://www.intporn.org/threads/latex-sex-fetish-seductive-divas-in-skin-tight-latex-suites.486272/";
$extreme_board_com=		"http://www.extreme-board.com/newreply.php?do=newreply&noquote=1&p=9756606";
$porno_maniac_net=		"http://porno-maniac.org/newreply.php?p=5174316&noquote=1";
$topboard_org=			"http://www.topboard.org/showthread.php?p=6218956";
$kitty_kats_net=		"http://kitty-kats.net/newreply.php?p=7018954&noquote=1";
$pornshareproject_org=	"";
$vipergirls_to=			"http://vipergirls.to/newreply.php?p=6323266&noquote=1";
$extremal_board_com=	"http://extremal-board.com/newreply.php?do=newreply&noquote=1&p=1186055";
$eight_teens_org=		"http://9teens.org/newreply.php?p=4175633&noquote=1";
$incest_forum_com=		"";
$jdforum_org=			"http://jdforum.org/newreply.php?do=newreply&noquote=1&p=3400149";
$sexfetishforum_com=	"http://www.sexfetishforum.com/index.php?action=post;topic=772760.0;num_replies=0";
$linkindexxx_com=		"";
$final4ever=			"";
$elforro_com=			"";


$imCodeTop=
"SET !ERRORIGNORE YES\n".
"CMDLINE !DATASOURCE ".$sourceFilename."\n".
"SET !DATASOURCE_COLUMNS 6\n".
"SET !LOOP 1\n".
"SET !DATASOURCE_LINE {{!LOOP}}\n".
"SET !VAR1 0\n".
" \n";


$imCodePhilia="";
if($forumophilia)
{
	$imCodePhilia = $imCodeTop;
	$imCodePhilia.=
	"URL GOTO=".$forumophilia."\n".
	"WAIT SECONDS=4\n".
	"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:post ATTR=NAME:subject CONTENT={{!COL1}}\n".
	"WAIT SECONDS=5\n".
	"TAG POS=1 TYPE=TEXTAREA FORM=NAME:post ATTR=NAME:message CONTENT={{!COL2}}\n".
	"WAIT SECONDS=15\n".
	"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:post ATTR=NAME:post\n".
	"WAIT SECONDS={{!COL5}}\n".
	" \n";
}

//******************************************************************
//
//        LIMITED AMMOUNT OF POSTS
//
//******************************************************************

$imCode="";
$imCode.=
"SET !ERRORIGNORE YES\n".
"CMDLINE !DATASOURCE ".$sourceFilename."\n".
"SET !DATASOURCE_COLUMNS 6\n".
"SET !LOOP 1\n".
"SET !DATASOURCE_LINE {{!LOOP}}\n".
"SET !VAR1 0\n".
" \n\n";


if($pornbb)
{	
	$imCode.=
	"ADD !VAR1 1\n".
	"TAB T={{!VAR1}}\n".
	"URL GOTO=".$pornbb."\n".
	"WAIT SECONDS=4\n".
	"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:post ATTR=ID:prfsubj CONTENT={{!COL1}}\n".
	"WAIT SECONDS=5\n".
	"TAG POS=1 TYPE=TEXTAREA FORM=NAME:post ATTR=ID:ptres CONTENT={{!COL2}}\n".
	"WAIT SECONDS=15\n".
	"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:post ATTR=NAME:post\n".
	"WAIT SECONDS={{!COL4}}\n".
	" \n";
}



if($fritchy_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$fritchy_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

if($porno_maniac_net)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n" .
"TAB T={{!VAR1}}\n".
"URL GOTO=".$porno_maniac_net."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=ID:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=DIR:ltr&&TABINDEX:1&&ROLE:textbox&&ARIA-LABEL:Rich<SP>text<SP>editor,<SP>vB_Editor_001_editor,<SP>press<SP>ALT<SP>0<SP>for<SP>help.&&CLASS:cke_source<SP>cke_enable_context_menu&&TXT: CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

if($topboard_org)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$topboard_org."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

if($kitty_kats_net)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$kitty_kats_net."\n" .
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=ID:title CONTENT={{!COL1}}\n" .
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=DIR:ltr&&TABINDEX:1&&ROLE:textbox&&ARIA-LABEL:Rich<SP>text<SP>editor,<SP>vB_Editor_001_editor,<SP>press<SP>ALT<SP>0<SP>for<SP>help.&&CLASS:cke_source<SP>cke_enable_context_menu&&TXT: CONTENT={{!COL2}}\n" .
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n" .
" \n";
}


if($eight_teens_org)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$eight_teens_org."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=ID:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=DIR:ltr&&TABINDEX:1&&ROLE:textbox&&ARIA-LABEL:Rich<SP>text<SP>editor,<SP>vB_Editor_001_editor,<SP>press<SP>ALT<SP>0<SP>for<SP>help.&&CLASS:cke_source<SP>cke_enable_context_menu&&TXT: CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
"\n";
}


if($jdforum_org)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$jdforum_org."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
"\n";
}


if($final4ever)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$final4ever."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

//$imCode.=
//"WAIT SECONDS=".$limitedTime."\n".
//"TAB CLOSEALLOTHERS\n";

//*****************************************************************
//
//           UNLIMITED UMMOUNT OF POSTS
//
//*****************************************************************

//$imCode="";
//$imCode.=
//"SET !ERRORIGNORE YES\n".
//"CMDLINE !DATASOURCE ".$sourceFilename."\n".
//"SET !DATASOURCE_COLUMNS 6\n".
//"SET !LOOP 1\n".
//"SET !DATASOURCE_LINE {{!LOOP}}\n".
//"SET !VAR1 0\n".
//" \n";

if($vamateur)
{
$imCode.=
"URL GOTO=".$vamateur."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

if($myslavegirl)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$myslavegirl."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=ID:postmodify ATTR=NAME:subject CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=ID:postmodify ATTR=ID:message CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=ID:postmodify ATTR=*\n".
"\n";
}


if($bdsm_zone_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$bdsm_zone_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
"\n";
}

if($pornw_org)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$pornw_org."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:postform ATTR=NAME:subject CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:postform ATTR=NAME:message CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:postform ATTR=NAME:post\n".
"\n";
}


if($intporn_org)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$intporn_org."\n".
"TAG POS=1 TYPE=A ATTR=HREF:javascript:void(null);\n".
"WAIT SECONDS=5\n".
"TAG POS=1 TYPE=TEXTAREA FORM=ID:QuickReply ATTR=NAME:message CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=ID:QuickReply ATTR=*\n".
" \n";
}

if($extreme_board_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$extreme_board_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}


if($vipergirls_to)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$vipergirls_to."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=ID:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=DIR:ltr&&TABINDEX:1&&ROLE:textbox&&ARIA-LABEL:Rich<SP>text<SP>editor,<SP>vB_Editor_001_editor,<SP>press<SP>ALT<SP>0<SP>for<SP>help.&&CLASS:cke_source<SP>cke_enable_context_menu&&TXT: CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

if($extremal_board_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$extremal_board_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}


if($incest_forum_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$incest_forum_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=ID:postform ATTR=ID:subject CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=ID:postform ATTR=ID:message CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=ID:postform ATTR=NAME:post\n".
"\n";
}


if($sexfetishforum_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$sexfetishforum_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=ID:postmodify ATTR=NAME:subject CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=ID:postmodify ATTR=NAME:message CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=ID:postmodify ATTR=NAME:post\n".
"\n";
}


if($linkindexxx_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$linkindexxx_com."\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=ID:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=DIR:ltr&&TABINDEX:1&&ROLE:textbox&&ARIA-LABEL:Rich<SP>text<SP>editor,<SP>vB_Editor_001_editor,<SP>press<SP>ALT<SP>0<SP>for<SP>help.&&CLASS:cke_source<SP>cke_enable_context_menu&&TXT: CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
"\n";
}


if($elforro_com)
{
$imCode.=
"ADD !VAR1 1\n".
"TAB OPEN\n".
"TAB T={{!VAR1}}\n".
"URL GOTO=".$elforro_com."\n".
"TAG POS=1 TYPE=IMG ATTR=SRC:http://www.elforro.com/images/editor/switchmode.gif\n".
"WAIT SECONDS=5\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
" \n";
}

$imCode.=
"WAIT SECONDS={{!COL3}}\n".
"TAB CLOSEALLOTHERS\n";

//****************************************************************
//
//       PLANETSUZY
//
//****************************************************************

$imCodeSuzy="";

if($planetsuzy_org)
{
$imCodeSuzy.=
"SET !ERRORIGNORE YES\n".
"CMDLINE !DATASOURCE ".$sourceFilename."\n".
"SET !DATASOURCE_COLUMNS 6\n".
"SET !LOOP 1\n".
"SET !DATASOURCE_LINE {{!LOOP}}\n".
"URL GOTO=".$planetsuzy_org."\n".
"WAIT SECONDS=4\n".
"TAG POS=1 TYPE=INPUT:TEXT FORM=NAME:vbform ATTR=NAME:title CONTENT={{!COL1}}\n".
"WAIT SECONDS=5\n".
"TAG POS=1 TYPE=TEXTAREA FORM=NAME:vbform ATTR=ID:vB_Editor_001_textarea CONTENT={{!COL2}}\n".
"WAIT SECONDS=15\n".
"TAG POS=1 TYPE=INPUT:SUBMIT FORM=NAME:vbform ATTR=ID:vB_Editor_001_save\n".
"WAIT SECONDS={{!COL6}}\n".
" \n";
}


if($pornBBFilename && $imCodePornbb)file_put_contents($pornBBFilename, $imCodePornbb);
if($philiaFilename && $imCodePhilia)file_put_contents($philiaFilename, $imCodePhilia);
if($suzyFilename && $imCodeSuzy)file_put_contents($suzyFilename, $imCodeSuzy);

if($iMacrosFilename && $imCode)file_put_contents($iMacrosFilename, $imCode);
//if($uniMacrosFilename && $imCode)file_put_contents($uniMacrosFilename, $imCode);
