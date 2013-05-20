<%--
    Document   : index
    Created on : May 10, 2013, 9:52:20 AM
    Author     : Hieu Trung
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%request.setAttribute("Title", "Register");%>
<jsp:include page="header.jsp"/>

<div class="sp-wrap clearfix">

    <div class="clearfix">
        <div id="sp-maincol" class="clearfix">
            <div id="sp-user-top" class="clearfix">
                <div class="sp-inner clearfix">
                    <div class="module">
                        <div class="mod-wrapper clearfix">
                            <h3 class="header">Điền đầy đủ thông tin:</h3>
                            <form type="post" action="register">
                                <table>
                                    <tr>
                                        <td>
                                            Username:
                                        </td>
                                        <td>
                                            <input type="text" name ="username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password:
                                        </td>
                                        <td>
                                            <input type="password" name ="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Họ và Tên:
                                        </td>
                                        <td>
                                            <input type="text" name ="fullName">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Địa chỉ:
                                        </td>
                                        <td>
                                            <input type="text" name ="address">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Số điện thoại:
                                        </td>
                                        <td>
                                            <input type="text" name ="phone">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value ="Đăng Ký"></td>
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