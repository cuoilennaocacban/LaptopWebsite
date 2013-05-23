<%-- 
    Document   : RightPanel
    Created on : May 15, 2013, 9:21:40 AM
    Author     : Hieu Trung
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<div id="sp-rightcol">
    <div id="sp-right" class="clearfix"><div class="sp-inner clearfix">	<div class="module">
                <div class="mod-wrapper clearfix">
                    <h3 class="header">Hỗ trợ kỹ thật</h3>
                    <div class="mod-content clearfix">
                        <div class="mod-inner clearfix">
                            <div class="custom"  >
                                <div class="online"><span style="font-size: medium;">Mai Hiếu:</span></div>
                                <div class="online"><span style="font-size: medium;"><br></span></div>
                                <%--<div class="online"><a href="ymsgr:sendim?maitrunghieuit"> <img src="http://opi.yahoo.com/online?u=maitrunghieuit&amp;m=g&amp;t=1&amp;l=us" border="0" align="middle" /></a></div>--%>
                                <div class="online"> </div>
                                <div class="online" style="text-align: left;"><span style="font-size: medium;">Hotline:</span></div>
                                <div class="online"><span style="font-size: large; color: #ff0000;">0902996889</span></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap">
            </div>
            <div class="module">
                <div class="mod-wrapper clearfix">

                    <div class="mod-content clearfix">
                        <div class="mod-inner clearfix">
                            <div class="custom"  >
                                <%
                                    String[] online = Methods.Onlines.getOnline();
                                %>
                                <div class="online"><span style="font-size: medium; color: blue">Lượng truy cập:</span></div>
                                <div class="online"><span style="font-size: medium"> <%= online[0] %> </span></div>
                                <div class="online"> </div>
                                <div class="online"><span style="font-size: medium; color: blue">Onlines:</span></div>
                                <div class="online"><span style="font-size: medium;"><%= online[1] %></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap">
            </div>
            <div class="module">
                <div class="mod-wrapper clearfix">

                    <div class="mod-content clearfix">
                        <div class="mod-inner clearfix">
                            <div class="custom"  >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
            <div class="module">
                <div class="mod-wrapper clearfix">

                    <div class="mod-content clearfix">
                        <div class="mod-inner clearfix">
                            <div class="custom"  >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
