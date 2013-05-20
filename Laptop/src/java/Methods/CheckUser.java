package Methods;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Hieu Trung
 */
public class CheckUser {

    /**
     *
     * @param user
     * @param pass
     * @return
     */
    public static boolean checkUser(String user, String pass) {
        boolean isOk = false;
        try {
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            Connection conn = DriverManager.getConnection("jdbc:sqlserver://localhost:1433;databaseName=Laptop;user=sa;password=trunghiu9");

            PreparedStatement pps = conn.prepareStatement("SELECT ma_khach_hang,mat_khau FROM KHACH_HANG");
            ResultSet rs = pps.executeQuery();
            while (rs.next()) {
                if ((user.equals(rs.getString("MA_KHACH_HANG"))) && (pass.equals(rs.getString("MAT_KHAU")))) {
                    isOk = true;
                }
            }
            conn.close();
        } catch (Exception ex) {
            System.out.println(ex.toString());
        }
        return isOk;
    }

    public static boolean Loged(HttpServletRequest request, HttpServletResponse response) {
        String username = "";
        String password = "";
        try {
            for (Cookie ck : request.getCookies()) {
                if (ck.getName().equals("username")) {
                    username = ck.getValue();
                }
                if (ck.getName().equals("password")) {
                    password = ck.getValue();
                }
            }
            if (Methods.CheckUser.checkUser(username, password)) {
                return true;

            } else {
                return false;

            }
        } catch (Exception ex) {
            return false;
        }
    }
}
