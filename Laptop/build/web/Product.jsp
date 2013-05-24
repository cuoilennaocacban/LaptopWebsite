<%-- 
    Document   : Product
    Created on : May 15, 2013, 4:41:16 PM
    Author     : Hieu Trung
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<% request.setAttribute("Title", request.getAttribute("ten_san_pham"));%>
<jsp:include page="header.jsp"/>
<div class="sp-wrap clearfix">
    <jsp:include page="TopBanner.jsp"/>

    <div class="clearfix">
        <div id="sp-maincol" class="clearfix">
            <div id="sp-user-top" class="clearfix"><div class="sp-inner clearfix">
                    <div class="module">
                        <div class="mod-wrapper clearfix">
                            <h3 class="header"><%=request.getAttribute("ten_san_pham")%></h3>
                            <div class="mod-content clearfix">
                                <div class="mod-inner clearfix">
                                    <div id="ns2-145" class="nssp2 ns2-vm">
                                        <div class="ns2-wrap">
                                            <div class="ns2-art-wrap ">
                                                <div class="ns2-art-pages">
                                                    <div class="ns2-page">
                                                        <div class="ns2-row ns2-first ns2-odd">
                                                            <div class="ns2-column flt-left col-1">
                                                                <div style="padding:5px 8px">
                                                                    <div class="ns2-inner">
                                                                        <table border="1">
                                                                            <tr>
                                                                                <td rowspan="6">
                                                                                    <image src="<%=request.getAttribute("url_hinh")%>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h3>Bảo hành</h3><h4 class="productDetail"><%=request.getAttribute("so_thang_bao_hanh")%> tháng</h4>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h3>Số lượng trong kho:</h3><h4 class="productDetail"><%=request.getAttribute("so_luong_trong_kho")%></h4>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h3>Khuyến mãi:</h3><h4 class="productDetail"><%=request.getAttribute("phan_tram_khuyen_mai")%></h4>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h3>Ghi chú:</h3><h4 class="productDetail"><%=request.getAttribute("ghi_chu")%></h4>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <h3>Giá:</h3><h4 class="productPrice"><%=request.getAttribute("gia")%> vnđ</h4>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <h3>Chi tiết: </h3>
                                                                        <table border="1">
                                                                            <%
                                                                                String loaiSP = (String) request.getAttribute("ma_loai_sp");
                                                                                String[] description = request.getAttribute("chi_tiet").toString().split(";");
                                                                                String[] attr = Products.Description.getDescription(loaiSP);
                                                                                for (int i = 0; i < attr.length; i++) {
                                                                            %>
                                                                            <tr>
                                                                                <td align="right">
                                                                                    <div><h4 class="attr"><%=attr[i]%>:</h4></div>
                                                                                </td>
                                                                                <td>
                                                                                    <div><h4 class="desc"><%=description[i]%></h4></div>
                                                                                </td>
                                                                            </tr>
                                                                            <%
                                                                                }
                                                                            %>
                                                                        </table><br>
                                                                        <dv>
                                                                            <% boolean logedin = Methods.CheckUser.Loged(request, response);
                                                                                if (logedin) {
                                                                            %>
                                                                            <a href="addtocard"><input type="submit" value="Thêm vào vỏ hàng"></input></a>
                                                                                <%} else {
                                                                                %>
                                                                            <a href="Login.jsp"><input type="submit" value="Đăng nhập để đặt hàng"></input></a>
                                                                                <%                                                                                        }
                                                                                %>
                                                                        </dv>
                                                                        </br>
                                                                        <div style="clear:both"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="clear:both"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="clear:both"></div>
                                            </div>
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
