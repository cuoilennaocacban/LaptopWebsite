<%--
    Document   : index
    Created on : May 10, 2013, 9:52:20 AM
    Author     : Hieu Trung
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%request.setAttribute("Title", "Login");%>
<jsp:include page="header.jsp"/>

<div class="sp-wrap clearfix">

    <div class="clearfix">
        <div id="sp-maincol" class="clearfix">
            <div id="sp-user-top" class="clearfix">
                <div class="sp-inner clearfix">
                    <div class="module">
                        <div class="mod-wrapper clearfix">
                            <h3 class="header">Đăng nhập</h3>
                            <font color="red"><%=request.getAttribute("error")==null?"":request.getAttribute("error")%></font>
                            <form method="post" action="login">
                                <table>
                                    <tr>
                                        <td>
                                            Username:
                                        </td>
                                        <td>
                                            <input type="text" name="username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password:
                                        </td>
                                        <td>
                                            <input type="password" name="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <input type="submit" value="Đăng Nhập">
                                        </td>
                                    </tr>
                                </table>
                                
                            </form>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>

            </div>	
            <div class="clr"></div>
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