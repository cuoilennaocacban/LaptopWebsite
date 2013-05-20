/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Pages;

import java.io.IOException;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Hieu Trung
 */
public class Login extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        if (Methods.CheckUser.checkUser(username, password)) {
            Cookie ck = new Cookie("username", username);
            response.addCookie(ck);
            ck = new Cookie("password", password);
            response.addCookie(ck);
            RequestDispatcher red = request.getRequestDispatcher("home");
            red.forward(request, response);
        } else {
            request.setAttribute("error", "Có lỗi, vui lòng đăng nhập lại");
            RequestDispatcher red = request.getRequestDispatcher("login.jsp");
            red.forward(request, response);
        }

    }

    

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }
}
