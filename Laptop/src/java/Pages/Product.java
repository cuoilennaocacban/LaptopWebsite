/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Pages;

import java.io.IOException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Hieu Trung
 */
@WebServlet(name = "Product", urlPatterns = {"/product"})
public class Product extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, ClassNotFoundException, SQLException {
        response.setContentType("text/html;charset=UTF-8");
        String code = request.getParameter("code");
        ResultSet rs = Methods.GetProduct.getProduct("SELECT * FROM SAN_PHAM where ma_san_pham='"+code+"'");
        while (rs.next())
        {
            request.setAttribute("ma_san_pham",rs.getNString(1));
            request.setAttribute("ma_nha_san_xuat",rs.getNString(2));
            request.setAttribute("ma_loai_sp",rs.getNString(3));
            request.setAttribute("ten_san_pham",rs.getNString(4));
            request.setAttribute("chi_tiet",rs.getNString(5));
            request.setAttribute("url_hinh",rs.getNString(6));
            request.setAttribute("so_thang_bao_hanh",String.valueOf(rs.getInt(7)));
            request.setAttribute("so_luong_trong_kho",String.valueOf(rs.getInt(8)));
            request.setAttribute("phan_tram_khuyen_mai",String.valueOf(rs.getInt(9)));
            request.setAttribute("ghi_chu",rs.getNString(10));
            request.setAttribute("gia",String.valueOf(rs.getInt(11)));
            
            RequestDispatcher red = request.getRequestDispatcher("Product.jsp");
            red.forward(request, response);
        }
        
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Product.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(Product.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Product.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(Product.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
