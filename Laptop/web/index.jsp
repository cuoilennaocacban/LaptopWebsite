<%--
    Document   : index
    Created on : May 10, 2013, 9:52:20 AM
    Author     : Hieu Trung
--%>
<%@page import="java.sql.ResultSet"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%request.setAttribute("Title", "Trang Chủ");%>
<jsp:include page="header.jsp"/>
<div class="sp-wrap clearfix">
    <jsp:include page="TopBanner.jsp"/>

    <div class="clearfix">
        <div id="sp-maincol" class="clearfix">
            <div id="sp-user-top" class="clearfix"><div class="sp-inner clearfix">
                    <div class="module">
                        <div class="mod-wrapper clearfix">
                            <h3 class="header">Sản Phẩm HOT</h3>
                            <span class="badge_hot"></span>
                            <div class="mod-content clearfix">
                                <div class="mod-inner clearfix">
                                    <div id="ns2-145" class="nssp2 ns2-vm">
                                        <div class="ns2-wrap">
                                            <div class="ns2-art-wrap ">
                                                <div class="ns2-art-pages">
                                                    <div class="ns2-page">
                                                        <div class="ns2-row ns2-first ns2-odd">
                                                            <div class="ns2-column flt-left col-1">
                                                                <table>
                                                                    <%
                                                                        ResultSet rs = Methods.Connecting.getData("select * from hot");
                                                                        for (int j = 0; j < 5; j++) {
                                                                            out.println("<tr>");
                                                                            for (int i = 0; i < 4; i++) {
                                                                                while (rs.next()) {
                                                                                    ResultSet pro = Methods.Connecting.getData("select * from san_pham where ma_san_pham='" + rs.getString(1) + "'");
                                                                                    while (pro.next()) {
                                                                    %>

                                                                    <td>
                                                                        <div style="padding:5px 8px">
                                                                            <div class="ns2-inner">
                                                                                <a href="product?product=<%=pro.getString(4)%>&code=<%=pro.getString(1)%>">
                                                                                    <img class="ns2-image" style="float:none;margin:0 0 0 0" src="<%=pro.getString(6)%>" width="128" height="128"/>
                                                                                    <h4 class="ns2-title"><%=pro.getString(4)%></h4>
                                                                                </a>
                                                                                <div style="clear:both"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <%
                                                                                    }
                                                                                }
                                                                            }
                                                                            out.println("<tr>");
                                                                        }
                                                                    %>
                                                                </table>

                                                            </div>
                                                            <div style="clear:both"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="clear:both"></div>
                                            </div>
                                            <!--End article layout-->

                                            <!--Links Layout-->
                                            <!--End Links Layout-->
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div></div>	<div class="clr"></div>
            <div id="inner_content" class="clearfix">
            </div>
            <div class="clr"></div>
        </div>
        <jsp:include page="RightPanel.jsp"/>
    </div>
</div>
<jsp:include page="footer.jsp"/>
</body>
</html>

