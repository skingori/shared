

_menuCloseDelay=500           // The time delay for menus to remain visible on mouse out
_menuOpenDelay=150            // The time delay before menus open on mouse over
_subOffsetTop=0              // Sub menu top offset
_subOffsetLeft=10            // Sub menu left offset



with(menuStyle=new mm_style()){
//onbgcolor="#4F8EB6";
oncolor="#000000";
offbgcolor="#ffffff";
offcolor="#515151";
separatorsize=2;
padding=6;
fontsize="65%";
fontstyle="normal";
fontfamily="Verdana, Tahoma, Arial";
headercolor="#000000";
headerbgcolor="#ffffff";
//subimage="/imagepack/tubearrow.gif";
bgimage="/imagepack/bg.gif";
separatorimage="/imagepack/tubesep.gif";
//subimagepadding="10";
//overfilter="Fade(duration=0.2);Alpha(opacity=90);Shadow(color='#777777', Direction=135, Strength=5)";
//outfilter="randomdissolve(duration=0.3)";
itemheight=24;
//imagepadding=4;
//borderwidth=1;
}

with(submenuStyle=new mm_style()){
//onbgcolor="#4F8EB6";
oncolor="#000000";
//offbgcolor="#DCE9F0";
offcolor="#515151";
separatorcolor="#000000";
//separatorsize="1";
separatorwidth="1";
padding=4;
fontsize="55%";
fontstyle="normal";
fontfamily="Verdana, Tahoma, Arial";
headercolor="#000000";
headerbgcolor="#ffffff";
subimage="/imagepack/tubearrow.gif";
//subimagepadding="5";
menubgimage="subback.gif";
overfilter="Fade(duration=0.2);Alpha(opacity=90);)";
outfilter="randomdissolve(duration=0.3)";
}

with(milonic=new menuname("Main Menu")){
style=menuStyle;
top=80;
//margin=14;
alwaysvisible=1;
menualign="center";
followscroll=1;
orientation="horizontal";
menuwidth="100%"
//aI("status=You can drag me!;image=/imagepack/menutop.gif;type=dragable;pointer=move;");
aI("text=Home;url=/imagepack/index.php;status=Back To Image Home Page;image=/imagepack/menuhome1.gif;");
aI("text=Arrows;showmenu=arrows;image=/imagepack/menuarrow1.gif;");
aI("text=Item Icons;url=/imagepack/itemicons.php;image=/imagepack/menuicon1.gif;");
aI("text=Backgrounds;url=/imagepack/backgrounds.php;image=/imagepack/menuback1.gif;");
aI("text=Separators;url=/imagepack/separators.php;image=/imagepack/menusep1.gif;");
aI("text=Mouseovers;url=/imagepack/mouseovers.php;image=/imagepack/menumover1.gif;");
aI("text=Shapes;url=/imagepack/shapes.php;image=/imagepack/menushape1.gif;");
aI("text=Animated;url=/imagepack/animated.php;image=/imagepack/menuanimate1.gif;");

}


with(milonic=new menuname("arrows")){
style=submenuStyle;
top="offset=-2";
//left="offset=-2";
aI("text=Classic;url=/imagepack/classicarrows.php;status=Classic Arrows;");
aI("text=Decorative;url=/imagepack/decorativearrows.php;status=Decorative Arrows;");
aI("text=Simple Indicators;url=/imagepack/simpleindicators.php;status=Simple Indicators;");
aI("text=Diagonal;url=/imagepack/diagonalarrows.php;status=Diagonal Arrows;");
aI("text=Downers;url=/imagepack/downarrows.php;status=Downward Facing Arrows;");
}



drawMenus();

