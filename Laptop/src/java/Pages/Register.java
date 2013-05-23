/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Pages;

import java.io.IOException;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Hieu Trung
 */
@WebServlet(name = "Register", urlPatterns = {"/register"})
public class Register extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, ClassNotFoundException, SQLException {
        response.setContentType("text/html;charset=UTF-8");
        try
        {
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        String fullname = request.getParameter("fullName");
        String address = request.getParameter("address");
        String phone = request.getParameter("phone");

        String sql = "insert into khach_hang values ('"+username+"',N'"+fullname+"',N'"+address+"','"+phone+"',N'"+password+"',GETDATE(),'0','0')";
        if(Methods.Connecting.submit(sql))
        {
            Cookie ck = new Cookie("username", username);
            response.addCookie(ck);
            ck = new Cookie("password", password);
            response.addCookie(ck);
            RequestDispatcher red = request.getRequestDispatcher("home");
            red.forward(request, response);
        }
        else
        {
            request.setAttribute("error", "Có lỗi, vui lòng nhập lại");
            RequestDispatcher red = request.getRequestDispatcher("Register.jsp");
            red.forward(request, response);
        }
        }
        catch (Exception ex)
        {
            RequestDispatcher red = request.getRequestDispatcher("Register.jsp");
            red.forward(request, response);
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Register.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(Register.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Register.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException ex) {
            Logger.getLogger(Register.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
