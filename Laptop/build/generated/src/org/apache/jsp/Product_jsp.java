package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class Product_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
 request.setAttribute("Title", request.getAttribute("ten_san_pham"));
      out.write('\n');
      org.apache.jasper.runtime.JspRuntimeLibrary.include(request, response, "header.jsp", out, false);
      out.write("\n");
      out.write("<div class=\"sp-wrap clearfix\">\n");
      out.write("    ");
      org.apache.jasper.runtime.JspRuntimeLibrary.include(request, response, "TopBanner.jsp", out, false);
      out.write("\n");
      out.write("\n");
      out.write("    <div class=\"clearfix\">\n");
      out.write("        <div id=\"sp-maincol\" class=\"clearfix\">\n");
      out.write("            <div id=\"sp-user-top\" class=\"clearfix\"><div class=\"sp-inner clearfix\">\n");
      out.write("                    <div class=\"module\">\n");
      out.write("                        <div class=\"mod-wrapper clearfix\">\n");
      out.write("                            <h3 class=\"header\">");
      out.print(request.getAttribute("ten_san_pham"));
      out.write("</h3>\n");
      out.write("                            <div class=\"mod-content clearfix\">\n");
      out.write("                                <div class=\"mod-inner clearfix\">\n");
      out.write("                                    <div id=\"ns2-145\" class=\"nssp2 ns2-vm\">\n");
      out.write("                                        <div class=\"ns2-wrap\">\n");
      out.write("                                            <div class=\"ns2-art-wrap \">\n");
      out.write("                                                <div class=\"ns2-art-pages\">\n");
      out.write("                                                    <div class=\"ns2-page\">\n");
      out.write("                                                        <div class=\"ns2-row ns2-first ns2-odd\">\n");
      out.write("                                                            <div class=\"ns2-column flt-left col-1\">\n");
      out.write("                                                                <div style=\"padding:5px 8px\">\n");
      out.write("                                                                    <div class=\"ns2-inner\">\n");
      out.write("                                                                        <table border=\"1\">\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td rowspan=\"6\">\n");
      out.write("                                                                                    <image src=\"");
      out.print(request.getAttribute("url_hinh"));
      out.write("\">\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <h3>Bảo hành</h3><h4 class=\"productDetail\">");
      out.print(request.getAttribute("so_thang_bao_hanh"));
      out.write(" tháng</h4>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <h3>Số lượng trong kho:</h3><h4 class=\"productDetail\">");
      out.print(request.getAttribute("so_luong_trong_kho"));
      out.write("</h4>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <h3>Khuyến mãi:</h3><h4 class=\"productDetail\">");
      out.print(request.getAttribute("phan_tram_khuyen_mai"));
      out.write("</h4>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <h3>Ghi chú:</h3><h4 class=\"productDetail\">");
      out.print(request.getAttribute("ghi_chu"));
      out.write("</h4>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <h3>Giá:</h3><h4 class=\"productPrice\">");
      out.print(request.getAttribute("gia"));
      out.write(" vnđ</h4>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                        </table>\n");
      out.write("                                                                        <h3>Chi tiết: </h3>\n");
      out.write("                                                                        <table border=\"1\">\n");
      out.write("                                                                            ");

                                                                                String loaiSP = (String) request.getAttribute("ma_loai_sp");
                                                                                String[] description = request.getAttribute("chi_tiet").toString().split(";");
                                                                                String[] attr = Products.Description.getDescription(loaiSP);
                                                                                for (int i = 0; i < attr.length; i++) {
                                                                            
      out.write("\n");
      out.write("                                                                            <tr>\n");
      out.write("                                                                                <td align=\"right\">\n");
      out.write("                                                                                    <div><h4 class=\"attr\">");
      out.print(attr[i]);
      out.write(":</h4></div>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                                <td>\n");
      out.write("                                                                                    <div><h4 class=\"desc\">");
      out.print(description[i]);
      out.write("</h4></div>\n");
      out.write("                                                                                </td>\n");
      out.write("                                                                            </tr>\n");
      out.write("                                                                            ");

                                                                                }
                                                                            
      out.write("\n");
      out.write("                                                                        </table><br>\n");
      out.write("                                                                            <dv>\n");
      out.write("                                                                                ");
 boolean logedin = Methods.CheckUser.Loged(request, response);
                                                                                if(logedin)
                                                                                {
                                                                                    boolean added = request.getAttribute("added").equals("true");
                                                                                    if(added)
                                                                                    {
                                                                                    
      out.write("\n");
      out.write("                                                                                        <a href=\"addtocard\"><input type=\"submit\" value=\"Thêm vào vỏ hàng\"></input></a>\n");
      out.write("                                                                                    ");

                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        
      out.write("\n");
      out.write("                                                                                        <a href=\"removeFromCard\"><input type=\"submit\" value=\"Bỏ khỏi vỏ hàng\"></input></a>\n");
      out.write("                                                                                        ");

                                                                                    }
                                                                                }
                                                                                else
                                                                                {
                                                                                    
      out.write("\n");
      out.write("                                                                                    <a href=\"login.jsp\"><input type=\"submit\" value=\"Đăng nhập để đặt hàng\"></input></a>\n");
      out.write("                                                                                    ");

                                                                                }
                                                                                
      out.write("\n");
      out.write("                                                                            </dv>\n");
      out.write("                                                                        </br>\n");
      out.write("                                                                        <div style=\"clear:both\"></div>\n");
      out.write("                                                                    </div>\n");
      out.write("                                                                </div>\n");
      out.write("                                                            </div>\n");
      out.write("                                                            <div style=\"clear:both\"></div>\n");
      out.write("                                                        </div>\n");
      out.write("                                                    </div>\n");
      out.write("                                                </div>\n");
      out.write("\n");
      out.write("                                                <div style=\"clear:both\"></div>\n");
      out.write("                                            </div>\n");
      out.write("                                            <div style=\"clear:both\"></div>\n");
      out.write("                                        </div>\n");
      out.write("                                    </div>\n");
      out.write("\n");
      out.write("                                </div>\n");
      out.write("                            </div>\n");
      out.write("                        </div>\n");
      out.write("                    </div>\n");
      out.write("                    <div class=\"gap\"></div>\n");
      out.write("                </div></div>\t<div class=\"clr\"></div>\n");
      out.write("            <div id=\"inner_content\" class=\"clearfix\">\n");
      out.write("            </div>\n");
      out.write("            <div class=\"clr\"></div>\n");
      out.write("        </div>\n");
      out.write("        ");
      org.apache.jasper.runtime.JspRuntimeLibrary.include(request, response, "RightPanel.jsp", out, false);
      out.write("\n");
      out.write("    </div>\n");
      out.write("</div>\n");
      org.apache.jasper.runtime.JspRuntimeLibrary.include(request, response, "footer.jsp", out, false);
      out.write("\n");
      out.write("</body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
