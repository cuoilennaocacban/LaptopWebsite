<%-- 
    Document   : header
    Created on : May 15, 2013, 9:01:09 AM
    Author     : Hieu Trung
--%>

<%@page import="org.apache.tomcat.util.http.Cookies"%>
<%@page contentType="text/html" pageEncoding="UTF-8" language="java"%>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><%=request.getAttribute("Title")%></title>
        <link rel="stylesheet" href="templates/css/template.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/custom.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/modules.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/typography.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/css3.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/style.css" type="text/css" />
        <link rel="stylesheet" href="templates/css/menu.css" type="text/css" />
        <style type="text/css">
            .sp-wrap {width: 960px;}
            #sp-leftcol {width: 230px}
            #sp-rightcol { width: 230px}
            #sp-maincol {width:730px}
            #inner_content {width: 730px;}
            #sp-inset1 {width: 100px}#sp-inset2 { width: 100px}
            #sp-bottom h3.header, h2.sp-slide-title, .blog h3.catItemTitle,
            .category-view h4,
            .productdetails-view h1,
            h2.itemTitle, h3.tagItemTitle, h3.userItemTitle { font-family: "Times New Roman", Times, serif }
            #sptab120 .tabs_mask, #sptab120 ul.tabs_container li span {height:30px;line-height:30px;}#sptab120 .tab-padding {padding:5px 0}
        </style>
    </head>
    <body class="bg clearfix">
        <div id="toparea" class="clearfix">
            <div class="sp-wrap clearfix">
                <div class="sp-inner"></br>
                    <div id="hornav-wrapper" class="clearfix">
                        <div class="clr"></div>
                        <div>
                            <%
                                if (Methods.CheckUser.Loged(request, response)) {
                            %>
                            <a href="basket"><input type="submit" value="Vỏ Hàng"></a>
                            <a href="account"><input type="submit" value="Tài Khoản"></a>
                            <a href="logout"><input type="submit" value="Thoát"></a></div>
                            <%
                                }
                                else {
                            %>
                        <a href="login.jsp"><input type="submit" value="Đăng Nhập"></a>
                        <a href="register.jsp"><input type="submit" value="Đăng Ký"></a></div>
                        <%
                                }
                        %>

                </div>
                <div class="clr"></div></br>
                <div id="sp-slides" class="clearfix">
                    <div class="sp-inner clearfix">
                        <img src="images/banners/main_banner.jpg" width="920" height="180">
                    </div>
                </div>
                <div class="clr"></div>
                <div id="header" class="clearfix" align="left">
                    <div id="hornav-wrapper" class="clearfix">
                        <div class="clr"></div><div id="hornav" class="clearfix"><ul class="sp-menu level-0"><li class="menu-item active first"><a href="home" class="menu-item active first" ><span class="menu"><span class="has-image" style="background-image:url(images/home.png)"><span class="menu-title">&nbsp;</span></span></span></a></li><li class="menu-item last"><a href="hang-san-xuat" class="menu-item last" ><span class="menu"><span class="menu-title">Hãng sản xuất</span></span></a></li><li class="menu-item"><a href="linh-kien" class="menu-item" ><span class="menu"><span class="menu-title">Linh kiện</span></span></a></li><li class="menu-item"><a href="san-pham-khuyen-mai" class="menu-item" ><span class="menu"><span class="menu-title">Sản phẩm khuyến mãi</span></span></a></li></ul></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
